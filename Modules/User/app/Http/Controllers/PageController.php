<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\Services\ProductService;
use Modules\User\Services\CategoryService;
use Modules\User\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected CategoryService $categoryService,
        protected OrderService $orderService
    ) {
    }

    public function getProduct()
    {
        $products = $this->productService->getProductsForHomepage(10);
        $sellings = $this->productService->getSellingProducts(10);
            
        return view('user::homepage', compact('products', 'sellings'));
    }
    
    public function getDetail($id_name, Request $req)
    {
        $size = $req->get('size');
        $products = $this->productService->getProductDetail($id_name);
        $quantities = $products->sizes()->withPivot('quantity')->get();
        
        return view('user::detailProduct', compact('products', 'quantities', 'size'));
    }
    
    public function search(Request $req)
    {
        $product = $this->productService->searchProducts($req->key, 12);
        return view('user::search', compact('product'));
    }
    
    public function getAllCategories(Request $req)
    {
        $products = $this->categoryService->getProductsByCategoryKey($req->key, 8);
        
        return view('user::category', compact('products'));
    }
    
    public function manageOrder()
    {
        $userId = Auth::id();
        $bill = $this->orderService->getOrdersByCustomerId($userId);
        $products = $this->orderService->formatOrderData($bill);

        return view('user::manageOrder', compact('bill', 'products'));
    }

    public function cancelOrder($id)
    {
        $this->orderService->cancelOrder($id);
        return redirect()->route('manageOrder');
    }
}

