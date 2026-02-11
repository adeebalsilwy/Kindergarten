<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function all(array $columns = ['*'], array $relations = []): Collection;

    public function findById(int $id, array $columns = ['*'], array $relations = [], array $appends = []): ?Model;

    public function create(array $payload): ?Model;

    public function update(int $id, array $payload): bool;

    public function delete(int $id): bool;

    public function paginate(int $perPage = 10, array $columns = ['*'], array $relations = []);
}
