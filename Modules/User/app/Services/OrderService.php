<?php

namespace Modules\User\Services;

use Modules\User\Repositories\OrderRepository;
use Modules\User\Repositories\OrderDetailRepository;
use Modules\User\Repositories\ProductRepository;
use Modules\User\Repositories\SizeRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class OrderService extends BaseService
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderDetailRepository $orderDetailRepository,
        protected ProductRepository $productRepository,
        protected SizeRepository $sizeRepository
    ) {
    }

    /**
     * Get orders by customer ID
     */
    public function getOrdersByCustomerId(int $customerId): Collection
    {
        return $this->orderRepository->getOrdersByCustomerId($customerId);
    }

    /**
     * Format order data for view
     */
    public function formatOrderData(Collection $orders): Collection
    {
        return $orders->map(function ($order) {
            return $order->orderDetails->map(function ($detail) use ($order) {
                return [
                    'bill_id' => $order->id,
                    'product_id' => $detail->product_id,
                    'product_name' => $detail->product->name ?? '',
                    'quantity' => $detail->quantity,
                    'size_name' => $detail->size_name,
                ];
            });
        });
    }

    /**
     * Cancel order and restore product quantities
     */
    public function cancelOrder(int $orderId): void
    {
        DB::transaction(function () use ($orderId) {
            $order = $this->orderRepository->getOrderWithDetails($orderId);
            $this->orderRepository->updateStatus($orderId, 'Hủy đơn');
            
            foreach ($order->orderDetails as $orderDetail) {
                $product = $this->productRepository->getProductWithSizes($orderDetail->product_id);
                $size = $this->sizeRepository->getSizeByName($orderDetail->size_name);
                
                if ($size) {
                    $pivot = $product->sizes()
                        ->where('sizes.id', $size->id)
                        ->first();
                    
                    if ($pivot) {
                        $this->productRepository->updateSizeQuantity(
                            $product->id,
                            $size->id,
                            $pivot->pivot->quantity + $orderDetail->quantity
                        );
                    }
                }
            }
        });
    }
}

