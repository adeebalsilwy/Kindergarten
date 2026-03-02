<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface TeacherRepositoryInterface
{
    public function all(): Collection;
    public function paginate($perPage): LengthAwarePaginator;
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function query();
    public function findByIdWithRelations($id);
}