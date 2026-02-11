<?php

namespace App\Repositories\Eloquent;

use App\Models\CommandLog;
use App\Repositories\Contracts\CommandLogRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CommandLogRepository implements CommandLogRepositoryInterface
{
    protected $model;

    public function __construct(CommandLog $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function paginate($perPage): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);

        return $model->delete();
    }

    public function query()
    {
        return $this->model->newQuery();
    }
}
