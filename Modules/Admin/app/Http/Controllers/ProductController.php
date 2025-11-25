<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Admin\Services\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {
    }

    public function index()
    {
        $products = $this->productService->getProductsPaginated(10);
        return view('admin::admin.product.index', compact('products'));
    }
    
    public function create()
    {
        $categories = $this->productService->getAllCategories();
        $sizes = $this->productService->getAllSizes();
        return view('admin::admin.product.create', compact('categories', 'sizes'));
    }
    
    public function store(ProductRequest $request)
    {
        $data = [
            'name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->product_price,
            'discount' => $request->product_discount ?? 0,
            'color' => $request->product_color ?? '',
            'description' => $request->product_description,
        ];

        $image = $request->file('product_image');
        $quantities = $request->has('quantities') ? $request->quantities : null;

        $this->productService->createProduct($data, $image, $quantities);
        
        return redirect()->route('product.index');
    }
    
    public function show($id)
    {
        $products = $this->productService->getProductWithRelations($id);
        $category = $products->category;
        $quantities = $products->sizes()->withPivot('quantity')->get();
        return view('admin::admin.product.detail', compact('products', 'category', 'quantities'));
    }
    
    public function edit($id)
    {
        $product = $this->productService->getProductWithRelations($id);
        $categories = $this->productService->getAllCategories();
        $sizes = $this->productService->getAllSizes();
        $quantities = $product->sizes()->withPivot('quantity')->get();
        return view('admin::admin.product.edit', compact('categories', 'product', 'sizes', 'quantities'));
    }
    
    public function update($id, ProductRequest $request)
    {
        $data = [
            'name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->product_price,
            'discount' => $request->product_discount ?? 0,
            'color' => $request->product_color ?? '',
            'description' => $request->product_description,
        ];

        $image = $request->file('product_image');
        $hiddenImage = $request->hidden_image;
        $quantities = $request->has('quantities') ? $request->quantities : null;

        $this->productService->updateProduct($id, $data, $image, $hiddenImage, $quantities);
        
        return redirect()->route('product.index');
    }
    
    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('product.index');
    }
}

