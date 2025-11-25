<?php

namespace Modules\User\Services;

use Modules\User\Repositories\OrderRepository;
use Modules\User\Repositories\OrderDetailRepository;
use Modules\User\Repositories\ProductRepository;
use Modules\User\Repositories\SizeRepository;
use Modules\User\Repositories\CustomerRepository;
use Illuminate\Support\Facades\DB;

class PaymentService extends BaseService
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderDetailRepository $orderDetailRepository,
        protected ProductRepository $productRepository,
        protected SizeRepository $sizeRepository,
        protected CustomerRepository $customerRepository,
        protected CartService $cartService
    ) {
    }

    /**
     * Process payment and create order
     */
    public function processPayment(array $customerData, float $totalAmount): int
    {
        return DB::transaction(function () use ($customerData, $totalAmount) {
            $carts = $this->cartService->getCartItems();
            
            // Create or get customer
            $customer = $this->customerRepository->findOrCreateByEmailAndPhone(
                [
                    'email' => $customerData['customer_email'],
                    'phone' => $customerData['customer_phone'],
                ],
                [
                    'name' => $customerData['customer_name'],
                    'address' => $customerData['customer_address'],
                ]
            );

            // Create order
            $order = $this->orderRepository->create([
                'customer_id' => $customer->id,
                'customer_name' => $customerData['customer_name'],
                'phone' => $customerData['customer_phone'],
                'address' => $customerData['customer_address'],
                'email' => $customerData['customer_email'],
                'total_amount' => $totalAmount,
                'quantity' => array_sum(array_column($carts, 'qty')),
                'code' => 'ORD' . time(),
                'status' => 'pending',
            ]);

            // Create order details and update product quantities
            if (count($carts) > 0) {
                foreach ($carts as $key => $item) {
                    $product = $this->productRepository->getProductWithSizes($item['id']);
                    $price = $product->discount > 0 ? $product->discount : $product->price;
                    
                    $this->orderDetailRepository->createOrderDetail([
                        'order_id' => $order->id,
                        'product_id' => $item['id'],
                        'size_name' => $item['size_name'],
                        'quantity' => $item['qty'],
                        'price' => $price,
                    ]);

                    $size = $this->sizeRepository->findOrFail($item['size_id']);
                    $pivot = $product->sizes()
                        ->where('sizes.id', $size->id)
                        ->first();
                    
                    if ($pivot) {
                        $this->productRepository->updateSizeQuantity(
                            $product->id,
                            $size->id,
                            $pivot->pivot->quantity - $item['qty']
                        );
                    }
                }
            }

            // Clear cart
            $this->cartService->clearCart();

            return $order->id;
        });
    }
}

