<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Children;
use App\Models\Grade;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class ChildrenService
{
    public function query()
    {
        return Children::query();
    }

    public function all()
    {
        return Children::all();
    }

    public function find(int $id): Children
    {
        return Children::with(['parent', 'secondParent', 'class', 'attendances', 'grades', 'payments', 'activities', 'events'])->findOrFail($id);
    }

    /**
     * Create a new child with associated data
     */
    public function create(array $data): Children
    {
        return DB::transaction(function () use ($data) {
            $child = Children::create($data);

            // Optionally create associated records
            if (isset($data['attendance'])) {
                foreach ($data['attendance'] as $attendanceData) {
                    $attendanceData['child_id'] = $child->id;
                    Attendance::create($attendanceData);
                }
            }

            if (isset($data['grades'])) {
                foreach ($data['grades'] as $gradeData) {
                    $gradeData['child_id'] = $child->id;
                    Grade::create($gradeData);
                }
            }

            if (isset($data['payments'])) {
                foreach ($data['payments'] as $paymentData) {
                    $paymentData['child_id'] = $child->id;
                    Payment::create($paymentData);
                }
            }

            return $child;
        });
    }

    /**
     * Update an existing child with associated data
     */
    public function update(int $id, array $data): Children
    {
        return DB::transaction(function () use ($id, $data) {
            $child = $this->find($id);
            $child->update($data);

            // Update associated records if provided
            if (isset($data['attendance'])) {
                foreach ($data['attendance'] as $attendanceId => $attendanceData) {
                    Attendance::where('id', $attendanceId)->where('child_id', $id)->update($attendanceData);
                }
            }

            if (isset($data['grades'])) {
                foreach ($data['grades'] as $gradeId => $gradeData) {
                    Grade::where('id', $gradeId)->where('child_id', $id)->update($gradeData);
                }
            }

            if (isset($data['payments'])) {
                foreach ($data['payments'] as $paymentId => $paymentData) {
                    Payment::where('id', $paymentId)->where('child_id', $id)->update($paymentData);
                }
            }

            return $child->fresh();
        });
    }

    /**
     * Delete a child and associated data
     */
    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            $child = $this->find($id);
            
            // Delete associated records first to maintain referential integrity
            $child->attendances()->delete();
            $child->grades()->delete();
            $child->payments()->delete();
            $child->activities()->detach(); // Many-to-many relationship
            $child->events()->detach(); // Many-to-many relationship
            
            // Finally delete the child record
            return $child->delete();
        });
    }
}
