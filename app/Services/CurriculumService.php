<?php

namespace App\Services;

use App\Repositories\Contracts\CurriculumRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CurriculumService
{
    protected $repository;

    public function __construct(CurriculumRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getPaginated()
    {
        return $this->repository->paginate(10);
    }

    public function query()
    {
        return $this->repository->query();
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $result = $this->repository->create($data);
            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function find($id)
    {
        return $this->repository->findById($id);
    }

    public function update($id, array $data)
    {
        DB::beginTransaction();
        try {
            $result = $this->repository->update($id, $data);
            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $result = $this->repository->delete($id);
            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
