<?php

declare(strict_types=1);

namespace Src\Shared\Domain\Contracts;

interface BaseRepositoryContract
{
    public function all(array $relations = []);

    public function find(int $id, array $relations = []);

    public function findUuid(string $id, array $relations = []);

    public function delete(int $id);

    public function deleteUuid(string $id);

    public function forceDelete(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function updateUuid(string $id, array $data);
}
