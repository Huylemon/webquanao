<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\ProductRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {
    }

    /**
     * Get products with category paginated
     */
    public function getProductsPaginated(int $perPage = 10)
    {
        return $this->productRepository->getProductsWithCategoryPaginated($perPage);
    }

    /**
     * Get all categories
     */
    public function getAllCategories()
    {
        return $this->productRepository->getAllCategories();
    }

    /**
     * Get all sizes
     */
    public function getAllSizes()
    {
        return $this->productRepository->getAllSizes();
    }

    /**
     * Get product by ID with relations
     */
    public function getProductWithRelations(int $id)
    {
        return $this->productRepository->getProductWithRelations($id);
    }

    /**
     * Create product
     */
    public function createProduct(array $data, ?UploadedFile $image, ?array $sizesWithQuantity): Model
    {
        if ($image) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $data['image'] = $new_name;
        }

        $product = $this->productRepository->create($data);

        if ($sizesWithQuantity) {
            $this->productRepository->attachSizes($product->id, $sizesWithQuantity);
        }

        return $product;
    }

    /**
     * Update product
     */
    public function updateProduct(int $id, array $data, ?UploadedFile $image, ?string $hiddenImage, ?array $sizesWithQuantity): bool
    {
        $image_name = $hiddenImage;

        if ($image) {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }

        $data['image'] = $image_name;

        $updated = $this->productRepository->update($id, $data);

        if ($sizesWithQuantity) {
            $this->productRepository->syncSizes($id, $sizesWithQuantity);
        }

        return $updated;
    }

    /**
     * Delete product
     */
    public function deleteProduct(int $id): bool
    {
        $this->productRepository->detachAllSizes($id);
        return $this->productRepository->delete($id);
    }
}

