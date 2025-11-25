<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {
    }

    public function index(Request $req)
    {
        $carts = $this->cartService->getCartItems();
        return view('user::cart', compact('carts'));
    }
    
    public function cart(Request $request)
    {
        $productId = $request->get('product_id');
        $sizeId = $request->get('size');
        
        $this->cartService->addToCart($productId, $sizeId);
        
        return Redirect::to(url('showCart'));
    }
    
    public function up(Request $request)
    {
        $productId = $request->get('product_id');
        $sizeId = $request->get('size');
        
        $this->cartService->increaseQuantity($productId, $sizeId);

        return Redirect::to(url('showCart'));
    }

    public function down(Request $request)
    {
        $productId = $request->get('product_id');
        $sizeId = $request->get('size');
        
        $this->cartService->decreaseQuantity($productId, $sizeId);

        return Redirect::to(url('showCart'));
    }

    public function remove(Request $request)
    {
        $productId = $request->get('product_id');
        
        $this->cartService->removeFromCart($productId);

        return Redirect::to(url('showcart'));
    }

    public function destroy()
    {
        $this->cartService->clearCart();

        return Redirect::to(url('showcart'));
    }

    public function getCheckOut()
    {
        if ($this->cartService->isEmpty()) {
            return Redirect::to(url(''));
        }

        $carts = $this->cartService->getCartItems();
        return view('user::checkout', compact('carts'));
    }
}

