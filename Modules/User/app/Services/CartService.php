<?php

namespace Modules\User\Services;

use Modules\User\Repositories\ProductRepository;
use Modules\User\Repositories\SizeRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartService extends BaseService
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected SizeRepository $sizeRepository
    ) {
    }

    /**
     * Get all cart items
     */
    public function getCartItems(): array
    {
        return Session::get('carts') ?? [];
    }

    /**
     * Add product to cart
     */
    public function addToCart(int $productId, int $sizeId): void
    {
        $carts = $this->getCartItems();
        $size = $this->sizeRepository->findOrFail($sizeId);
        $product = $this->productRepository->getProductWithSizes($productId);
        
        $productKey = $this->generateProductKey($productId, $sizeId);
        $quantity = $product->sizes()->pluck('quantity');
        
        if (!array_key_exists($productKey, $carts)) {
            $carts[$productKey] = [
                'id' => $productId,
                'name' => $product->name,
                'option' => $product->image,
                'price' => $product->discount > 0 ? $product->discount : $product->price,
                'size_id' => $sizeId,
                'size_name' => $size->size_name,
                'quantity' => $quantity[$sizeId - 1] ?? 0,
                'qty' => 1,
                'subtotal' => ($product->discount > 0 ? $product->discount : $product->price) * 1,
            ];
        } else {
            $productCart = $carts[$productKey];
            $productCart['qty'] = $productCart['qty'] + 1;
            $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
            $carts[$productKey] = $productCart;
        }
        
        $this->saveCart($carts);
        $this->calculateTotal();
    }

    /**
     * Increase product quantity in cart
     */
    public function increaseQuantity(int $productId, int $sizeId): void
    {
        $carts = $this->getCartItems();
        $this->productRepository->findOrFail($productId);
        $productKey = $this->generateProductKey($productId, $sizeId);
        
        if (array_key_exists($productKey, $carts)) {
            $productCart = $carts[$productKey];
            $productCart['qty'] = $productCart['qty'] + 1;
            $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
            $carts[$productKey] = $productCart;
        }
        
        $this->saveCart($carts);
        $this->calculateTotal();
    }

    /**
     * Decrease product quantity in cart
     */
    public function decreaseQuantity(int $productId, int $sizeId): void
    {
        $carts = $this->getCartItems();
        $this->productRepository->findOrFail($productId);
        $productKey = $this->generateProductKey($productId, $sizeId);
        
        if (array_key_exists($productKey, $carts)) {
            $productCart = $carts[$productKey];
            if ($productCart['qty'] === 1) {
                unset($carts[$productKey]);
            } else {
                $productCart['qty'] = $productCart['qty'] - 1;
                $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
                $carts[$productKey] = $productCart;
            }
        }
        
        $this->saveCart($carts);
        $this->calculateTotal();
    }

    /**
     * Remove product from cart (all sizes)
     */
    public function removeFromCart(int $productId): void
    {
        $carts = $this->getCartItems();
        $this->productRepository->findOrFail($productId);
        $productKeyPrefix = sprintf('product_id_%s', $productId);
        
        // Remove all items with this product_id (regardless of size)
        foreach ($carts as $key => $cart) {
            if (strpos($key, $productKeyPrefix) === 0) {
                unset($carts[$key]);
            }
        }
        
        $this->saveCart($carts);
        $this->calculateTotal();
    }

    /**
     * Clear all cart items
     */
    public function clearCart(): void
    {
        Session::forget('carts');
        Session::forget('total');
    }

    /**
     * Calculate total cart amount
     */
    public function calculateTotal(): void
    {
        $carts = $this->getCartItems();
        $total = 0;
        
        foreach ($carts as $cart) {
            $total += $cart['subtotal'];
        }
        
        if (!empty($carts)) {
            Session::put('total', $total);
        } else {
            Session::forget('total');
        }
    }

    /**
     * Get cart total
     */
    public function getTotal(): float
    {
        return Session::get('total', 0);
    }

    /**
     * Check if cart is empty
     */
    public function isEmpty(): bool
    {
        return empty($this->getCartItems());
    }

    /**
     * Generate product key for cart
     */
    private function generateProductKey(int $productId, int $sizeId): string
    {
        $key = sprintf('product_id_%s', $productId);
        return $key . '_size_' . $sizeId;
    }

    /**
     * Save cart to session
     */
    private function saveCart(array $carts): void
    {
        $userId = Auth::id();
        if ($userId) {
            Session::put('user_id', $userId);
        }
        Session::put('carts', $carts);
    }
}

