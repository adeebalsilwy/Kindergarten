<?php

namespace App\Services;

use App\Models\Children;
use App\Repositories\Contracts\GuardianRepositoryInterface;
use Illuminate\Support\Facades\DB;

class GuardianService
{
    protected $repository;

    public function __construct(GuardianRepositoryInterface $repository)
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
            $childrenIds = $data['children_ids'] ?? [];
            unset($data['children_ids']);
            $result = $this->repository->create($data);
            if (! empty($childrenIds)) {
                Children::whereIn('id', $childrenIds)->update(['parent_id' => $result->id]);
            }
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
            $childrenIds = $data['children_ids'] ?? null;
            unset($data['children_ids']);
            $result = $this->repository->update($id, $data);
            if (is_array($childrenIds)) {
                $currentIds = Children::where('parent_id', $id)->pluck('id')->toArray();
                $toDetach = array_diff($currentIds, $childrenIds);
                $toAttach = array_diff($childrenIds, $currentIds);
                if (! empty($toDetach)) {
                    Children::whereIn('id', $toDetach)->update(['parent_id' => null]);
                }
                if (! empty($toAttach)) {
                    Children::whereIn('id', $toAttach)->update(['parent_id' => $id]);
                }
            }
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
