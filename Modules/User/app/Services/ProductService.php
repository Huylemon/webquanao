<?php

namespace Modules\User\Services;

use Modules\User\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as SupportCollection;

class ProductService extends BaseService
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {
    }

    /**
     * Get products with category for homepage
     */
    public function getProductsForHomepage(int $limit = 10): SupportCollection
    {
        return $this->productRepository->getProductsWithCategory($limit)
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'category_gender' => $product->category->gender ?? '',
                ];
            });
    }

    /**
     * Get selling products
     */
    public function getSellingProducts(int $limit = 10): Collection
    {
        return $this->productRepository->getSellingProducts($limit);
    }

    /**
     * Get product detail with sizes
     */
    public function getProductDetail(int $id): Model
    {
        return $this->productRepository->getProductWithSizes($id);
    }

    /**
     * Search products
     */
    public function searchProducts(string $keyword, int $perPage = 12)
    {
        return $this->productRepository->search($keyword, $perPage);
    }

    /**
     * Get products by category name
     */
    public function getProductsByCategoryName(string $categoryName, int $limit = 8): Collection
    {
        return $this->productRepository->getProductsByCategoryName($categoryName, $limit);
    }

    /**
     * Update product size quantity
     */
    public function updateProductSizeQuantity(int $productId, int $sizeId, int $quantity): bool
    {
        return $this->productRepository->updateSizeQuantity($productId, $sizeId, $quantity);
    }
}

