<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\OrderRepository;
use Modules\Admin\Repositories\ProductRepository;
use Modules\Admin\Repositories\SizeRepository;
use Modules\Admin\Repositories\CustomerRepository;
use Illuminate\Support\Facades\DB;

class OrderService extends BaseService
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected ProductRepository $productRepository,
        protected SizeRepository $sizeRepository,
        protected CustomerRepository $customerRepository
    ) {
    }

    /**
     * Get orders with customer paginated
     */
    public function getOrdersPaginated(int $perPage = 10)
    {
        return $this->orderRepository->getOrdersWithCustomerPaginated($perPage);
    }

    /**
     * Get order with details
     */
    public function getOrderWithDetails(int $id)
    {
        return $this->orderRepository->getOrderWithDetails($id);
    }

    /**
     * Format order details for view
     */
    public function formatOrderDetails($order): array
    {
        return $order->orderDetails->map(function ($detail) {
            return [
                'product_id' => $detail->product_id,
                'product_name' => $detail->product->name ?? '',
                'quantity' => $detail->quantity,
                'size_name' => $detail->size_name,
                'price' => $detail->price ?? 0,
            ];
        })->toArray();
    }

    /**
     * Format customer data for view
     */
    public function formatCustomerData($order): array
    {
        return [
            'customer_name' => $order->customer->name ?? $order->customer_name ?? 'N/A',
            'customer_phone' => $order->phone ?? 'N/A',
            'customer_address' => $order->address ?? 'N/A',
            'customer_email' => $order->customer->email ?? $order->email ?? 'N/A',
        ];
    }

    /**
     * Update order
     */
    public function updateOrder(int $id, array $data): void
    {
        DB::transaction(function () use ($id, $data) {
            $order = $this->orderRepository->getOrderWithDetailsForUpdate($id);

            // Create or get customer
            $customer = $this->customerRepository->findOrCreateByEmailAndPhone(
                [
                    'email' => $data['customer_email'],
                    'phone' => $data['customer_phone'],
                ],
                [
                    'name' => $data['customer_name'],
                    'address' => $data['customer_address'],
                ]
            );

            // Update order
            $order->status = $data['bill_status'];
            $order->address = $data['customer_address'];
            $order->phone = $data['customer_phone'];
            $order->email = $data['customer_email'];
            $order->customer_name = $data['customer_name'];
            $order->customer_id = $customer->id;
            $order->save();

            // If order is cancelled, restore product quantities
            if ($data['bill_status'] === 'Hủy đơn') {
                foreach ($order->orderDetails as $orderDetail) {
                    $product = $this->productRepository->getProductWithRelations($orderDetail->product_id);
                    $size = $this->sizeRepository->getSizeByName($orderDetail->size_name);

                    if ($size) {
                        $pivot = $product->sizes()
                            ->where('sizes.id', $size->id)
                            ->first();

                        if ($pivot) {
                            $product->sizes()->updateExistingPivot($size->id, [
                                'quantity' => $pivot->pivot->quantity + $orderDetail->quantity
                            ]);
                        }
                    }
                }
            }
        });
    }
}

