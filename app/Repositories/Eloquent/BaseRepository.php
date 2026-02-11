<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function findById(int $id, array $columns = ['*'], array $relations = [], array $appends = []): ?Model
    {
        return $this->model->select($columns)->with($relations)->find($id);
    }

    public function create(array $payload): ?Model
    {
        return $this->model->create($payload);
    }

    public function update(int $id, array $payload): bool
    {
        $model = $this->findById($id);

        return $model ? $model->update($payload) : false;
    }

    public function delete(int $id): bool
    {
        $model = $this->findById($id);

        return $model ? $model->delete() : false;
    }

    public function paginate(int $perPage = 10, array $columns = ['*'], array $relations = [])
    {
        return $this->model->with($relations)->paginate($perPage, $columns);
    }

    public function query()
    {
        return $this->model->newQuery();
    }
}
