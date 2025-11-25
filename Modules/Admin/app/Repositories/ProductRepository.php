<?php

namespace Modules\Admin\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new Product();
    }

    /**
     * Get products with category paginated
     */
    public function getProductsWithCategoryPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return $this->query()
            ->with('category')
            ->select('id', 'name', 'price', 'discount', 'category_id')
            ->paginate($perPage);
    }

    /**
     * Get product by ID with category and sizes
     */
    public function getProductWithRelations(int $id): Model
    {
        return $this->query()
            ->with(['category', 'sizes'])
            ->findOrFail($id);
    }

    /**
     * Get all categories
     */
    public function getAllCategories(): Collection
    {
        return \App\Models\Category::all();
    }

    /**
     * Get all sizes
     */
    public function getAllSizes(): Collection
    {
        return \App\Models\Size::all();
    }

    /**
     * Attach sizes to product
     */
    public function attachSizes(int $productId, array $sizesWithQuantity): void
    {
        $product = $this->findOrFail($productId);
        foreach ($sizesWithQuantity as $sizeId => $quantity) {
            $product->sizes()->attach($sizeId, ['quantity' => $quantity]);
        }
    }

    /**
     * Sync sizes for product
     */
    public function syncSizes(int $productId, array $sizesWithQuantity): void
    {
        $product = $this->findOrFail($productId);
        $syncData = [];
        foreach ($sizesWithQuantity as $sizeId => $quantity) {
            $syncData[$sizeId] = ['quantity' => $quantity];
        }
        $product->sizes()->sync($syncData);
    }

    /**
     * Detach all sizes from product
     */
    public function detachAllSizes(int $productId): void
    {
        $product = $this->findOrFail($productId);
        $product->sizes()->detach();
    }
}

