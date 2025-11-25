<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Modules\Admin\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin::admin.category.index', compact('categories'));
    }
    
    public function create()
    {
        return view('admin::admin.category.create');
    }
    
    public function store(CategoryRequest $request)
    {
        $this->categoryService->createCategory($request->validated());
        return redirect()->route('category.index');
    }
    
    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('admin::admin.category.edit', compact('category'));
    }
    
    public function update($id, CategoryRequest $request)
    {
        $this->categoryService->updateCategory($id, $request->validated());
        return redirect()->route('category.index');
    }
    
    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('category.index');
    }
}

