<?php

namespace Modules\User\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new Product();
    }

    /**
     * Get products with category
     */
    public function getProductsWithCategory(int $limit = 10): Collection
    {
        return $this->query()
            ->with('category')
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    /**
     * Get product by ID with sizes
     */
    public function getProductWithSizes(int $id): Model
    {
        return $this->query()
            ->with('sizes')
            ->findOrFail($id);
    }

    /**
     * Search products by name or price
     */
    public function search(string $keyword, int $perPage = 12)
    {
        return $this->query()
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('price', $keyword)
            ->paginate($perPage);
    }

    /**
     * Get products by category name
     */
    public function getProductsByCategoryName(string $categoryName, int $limit = 8): Collection
    {
        return $this->query()
            ->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', 'like', '%' . $categoryName . '%');
            })
            ->select('id', 'name', 'image', 'price', 'discount')
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    /**
     * Get selling products
     */
    public function getSellingProducts(int $limit = 10): Collection
    {
        return $this->query()
            ->select('id', 'name', 'image', 'price', 'discount')
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    /**
     * Update product size quantity
     */
    public function updateSizeQuantity(int $productId, int $sizeId, int $quantity): bool
    {
        $product = $this->getProductWithSizes($productId);
        return $product->sizes()->updateExistingPivot($sizeId, ['quantity' => $quantity]);
    }
}

