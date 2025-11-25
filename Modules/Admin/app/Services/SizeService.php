<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\SizeRepository;

class SizeService extends BaseService
{
    public function __construct(
        protected SizeRepository $sizeRepository
    ) {
    }

    /**
     * Get all sizes
     */
    public function getAllSizes()
    {
        return $this->sizeRepository->all();
    }

    /**
     * Get size by ID
     */
    public function getSizeById(int $id)
    {
        return $this->sizeRepository->findOrFail($id);
    }

    /**
     * Create size
     */
    public function createSize(array $data)
    {
        return $this->sizeRepository->create($data);
    }

    /**
     * Update size
     */
    public function updateSize(int $id, array $data): bool
    {
        return $this->sizeRepository->update($id, $data);
    }

    /**
     * Delete size
     */
    public function deleteSize(int $id): bool
    {
        return $this->sizeRepository->delete($id);
    }
}

