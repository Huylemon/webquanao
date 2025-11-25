<?php

namespace Modules\User\Services;

use Modules\User\Repositories\CategoryRepository;
use Modules\User\Services\ProductService;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends BaseService
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected ProductService $productService
    ) {
    }

    /**
     * Get category by gender key
     */
    public function getCategoryByKey(string $key): ?Model
    {
        $genderMap = [
            'begai' => 'Nữ',
            'betrai' => 'Nam',
        ];
        
        $gender = $genderMap[$key] ?? 'Phụ kiện';
        return $this->categoryRepository->getCategoryByGender($gender);
    }

    /**
     * Get products by category key
     */
    public function getProductsByCategoryKey(string $key, int $limit = 8)
    {
        $genderMap = [
            'begai' => 'Nữ',
            'betrai' => 'Nam',
        ];
        
        $gender = $genderMap[$key] ?? 'Phụ kiện';
        $category = $this->categoryRepository->getCategoryByGender($gender);
        
        if ($category) {
            return $this->productService->getProductsByCategoryName($category->name, $limit);
        }
        
        return collect();
    }
}

