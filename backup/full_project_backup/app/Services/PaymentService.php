<?php

namespace App\Services;

use App\Repositories\Contracts\PaymentRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PaymentService
{
    protected $repository;

    public function __construct(PaymentRepositoryInterface $repository)
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

            // Update child's fees_paid
            if (isset($data['child_id']) && isset($data['amount'])) {
                $child = \App\Models\Children::find($data['child_id']);
                if ($child) {
                    $child->increment('fees_paid', $data['amount']);
                }
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
            $payment = $this->repository->findById($id);
            if ($payment) {
                $child = \App\Models\Children::find($payment->child_id);
                if ($child) {
                    $child->decrement('fees_paid', $payment->amount);
                }
            }

            $result = $this->repository->delete($id);
            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
