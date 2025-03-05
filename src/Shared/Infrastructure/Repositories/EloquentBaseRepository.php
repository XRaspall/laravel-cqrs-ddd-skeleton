<?php

declare(strict_types=1);

namespace Src\Shared\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Src\Shared\Domain\Contracts\BaseRepositoryContract;

class EloquentBaseRepository implements BaseRepositoryContract
{
    protected Model $model;

    public function __construct(
        Model $model
    ){
        $this->model = $model;
    }

    /**
     * Load relationships
     *
     * @param array|string $relations
     * @return Builder
     */
    private function with(array|string $relations = []): Builder
    {
        if (is_string($relations)){
            $relations = explode(',', $relations);
        }

        return $this->model->with($relations);
    }

    /**
     * Get all records
     *
     * @param array $relations
     * @return Collection
     */
    public function all(array $relations = []): Collection
    {
        return $this->with($relations)->get();
    }

    /**
     * Find a record by id
     *
     * @param int $id
     * @param array $relations
     * @return Model
     */
    public function find(int $id, array $relations = []): Model
    {
        return $this->with($relations)->findOrFail($id);
    }

    /**
     * Find a record by uuid
     *
     * @param string $id
     * @param array $relations
     * @return Model
     */
    public function findUuid(string $id, array $relations = []): Model
    {
        return $this->with($relations)->findOrFail($id);
    }

    /**
     * Delete a record by id
     *
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): ?bool
    {
        return $this->find($id)->delete();
    }

    /**
     * Delete a record by uuid
     *
     * @param string $id
     * @return bool|null
     */
    public function deleteUuid(string $id): ?bool
    {
        return $this->findUuid($id)->delete();
    }

    /**
     * Force delete a record by id
     *
     * @param int $id
     * @return bool|null
     */
    public function forceDelete(int $id): ?bool
    {
        return $this->model->newQuery()->where('id', $id)->forceDelete();
    }

    /**
     * Create a new record
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update a record by id
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return $this->find($id)->update($data);
    }

    /**
     * Update a record by uuid
     *
     * @param string $id
     * @param array $data
     * @return bool
     */
    public function updateUuid(string $id, array $data): bool
    {
        return $this->findUuid($id)->update($data);
    }
}
