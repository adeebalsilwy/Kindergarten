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
     * Update a child's information
     */
    public function update($child, array $data): Children
    {
        if (is_int($child)) {
            $model = Children::findOrFail($child);
            $model->update($data);

            return $model;
        }
        $child->update($data);

        return $child;
    }

    public function updateById(int $id, array $data): bool
    {
        $child = Children::findOrFail($id);

        return $child->update($data);
    }

    /**
     * Delete a child (soft delete)
     */
    public function delete($child): bool
    {
        if (is_int($child)) {
            $model = Children::findOrFail($child);

            return $model->delete();
        }

        return $child->delete();
    }

    public function deleteById(int $id): bool
    {
        $child = Children::findOrFail($id);

        return $child->delete();
    }

    /**
     * Restore a soft deleted child
     */
    public function restore(int $id): Children
    {
        $child = Children::withTrashed()->findOrFail($id);
        $child->restore();

        return $child;
    }

    /**
     * Get all children with optional filters
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(array $filters = [])
    {
        $query = Children::query();

        if (isset($filters['class_id'])) {
            $query->where('class_id', $filters['class_id']);
        }

        if (isset($filters['parent_id'])) {
            $query->where('parent_id', $filters['parent_id']);
        }

        if (isset($filters['status'])) {
            $query->where('enrollment_status', $filters['status']);
        }

        if (isset($filters['active'])) {
            $query->where('enrollment_status', 'active');
        }

        return $query->with(['parent', 'class', 'attendances', 'grades', 'payments'])->get();
    }

    /**
     * Get a child by ID with relationships
     */
    public function getById(int $id): Children
    {
        return Children::with(['parent', 'class', 'attendances', 'grades', 'payments', 'activities', 'events'])->findOrFail($id);
    }

    /**
     * Get children enrolled in a specific class
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByClass(int $classId)
    {
        return Children::where('class_id', $classId)
            ->with(['parent', 'attendances', 'grades', 'payments'])
            ->get();
    }

    /**
     * Calculate fees balance for a child
     */
    public function calculateBalance(Children $child): float
    {
        return $child->fees_required - $child->fees_paid;
    }

    /**
     * Check if a child has perfect attendance
     */
    public function hasPerfectAttendance(Children $child, ?string $startDate = null, ?string $endDate = null): bool
    {
        $query = Attendance::where('child_id', $child->id);

        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        // Count total days and absent days
        $totalDays = $query->count();
        $absentDays = $query->where('status', 'absent')->count();

        return $totalDays > 0 && $absentDays === 0;
    }

    /**
     * Get attendance percentage for a child
     */
    public function getAttendancePercentage(Children $child, ?string $startDate = null, ?string $endDate = null): float
    {
        $query = Attendance::where('child_id', $child->id);

        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        $totalDays = $query->count();

        if ($totalDays === 0) {
            return 0;
        }

        $presentDays = $query->whereIn('status', ['present', 'late'])->count();

        return round(($presentDays / $totalDays) * 100, 2);
    }

    /**
     * Get average grade for a child
     */
    public function getAverageGrade(Children $child): float
    {
        return $child->grades()->avg('score') ?? 0;
    }

    /**
     * Check if a child has any medical conditions
     */
    public function hasMedicalConditions(Children $child): bool
    {
        return ! empty($child->medical_conditions);
    }

    /**
     * Check if a child has any allergies
     */
    public function hasAllergies(Children $child): bool
    {
        return ! empty($child->allergies);
    }
}
