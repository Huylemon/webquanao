<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseRepository implements RepositoryInterface
{
    protected Model $model;

    public function __construct()
    {
        $this->model = $this->makeModel();
    }

    /**
     * Get model instance
     */
    abstract protected function makeModel(): Model;

    /**
     * Get all records
     */
    public function all(): Collection
    {
        return $this->query()->get();
    }

    /**
     * Find a record by ID
     */
    public function find(int $id): ?Model
    {
        return $this->query()->find($id);
    }

    /**
     * Find a record by ID or fail
     */
    public function findOrFail(int $id): Model
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * Create a new record
     */
    public function create(array $data): Model
    {
        return $this->model->newQuery()->create($data);
    }

    /**
     * Update a record
     */
    public function update(int $id, array $data): bool
    {
        $model = $this->findOrFail($id);
        return $model->update($data);
    }

    /**
     * Delete a record
     */
    public function delete(int $id): bool
    {
        $model = $this->findOrFail($id);
        return $model->delete();
    }

    /**
     * Get records with conditions
     */
    public function where(string $column, $value): self
    {
        $this->model = $this->query()->where($column, $value)->first() ?? $this->model;
        return $this;
    }

    /**
     * Get records with relationships
     */
    public function with(array $relations): self
    {
        $this->model = $this->query()->with($relations)->first() ?? $this->model;
        return $this;
    }

    /**
     * Get query builder instance
     */
    protected function query(): Builder
    {
        return $this->model->newQuery();
    }
}

