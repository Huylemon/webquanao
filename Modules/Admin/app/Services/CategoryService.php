<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\CategoryRepository;

class CategoryService extends BaseService
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {
    }

    /**
     * Get all categories
     */
    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }

    /**
     * Get category by ID
     */
    public function getCategoryById(int $id)
    {
        return $this->categoryRepository->findOrFail($id);
    }

    /**
     * Create category
     */
    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    /**
     * Update category
     */
    public function updateCategory(int $id, array $data): bool
    {
        return $this->categoryRepository->update($id, $data);
    }

    /**
     * Delete category
     */
    public function deleteCategory(int $id): bool
    {
        return $this->categoryRepository->delete($id);
    }
}

