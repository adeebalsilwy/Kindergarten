<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Children;
use App\Models\Classes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceService
{
    public function query()
    {
        return Attendance::query();
    }

    public function find(int $id): Attendance
    {
        return Attendance::with(['child', 'child.class', 'child.parent'])->findOrFail($id);
    }

    public function create(array $data): Attendance
    {
        return $this->markAttendance($data);
    }

    /**
     * Mark attendance for a child
     */
    public function markAttendance(array $data): Attendance
    {
        return Attendance::create($data);
    }

    /**
     * Bulk mark attendance for a class
     */
    public function bulkMarkAttendance(int $classId, string $date, array $attendances): array
    {
        $results = [];

        DB::transaction(function () use ($classId, $date, $attendances, &$results) {
            $childrenIds = Classes::find($classId)->children()->pluck('id')->toArray();

            foreach ($attendances as $attendanceData) {
                $childId = $attendanceData['child_id'];

                // Only process if child belongs to this class
                if (in_array($childId, $childrenIds)) {
                    $attendance = Attendance::updateOrCreate(
                        [
                            'child_id' => $childId,
                            'date' => $date,
                        ],
                        [
                            'status' => $attendanceData['status'],
                            'notes' => $attendanceData['notes'] ?? null,
                            'check_in' => $attendanceData['check_in'] ?? null,
                            'check_out' => $attendanceData['check_out'] ?? null,
                            'absence_reason' => $attendanceData['absence_reason'] ?? null,
                        ]
                    );

                    $results[] = $attendance;
                }
            }
        });

        return $results;
    }

    /**
     * Update attendance record
     */
    public function update($attendance, array $data): Attendance
    {
        if (is_int($attendance)) {
            $model = Attendance::findOrFail($attendance);
            $model->update($data);

            return $model;
        }
        $attendance->update($data);

        return $attendance;
    }

    /**
     * Delete attendance record
     */
    public function delete($attendance): bool
    {
        if (is_int($attendance)) {
            $model = Attendance::findOrFail($attendance);

            return $model->delete();
        }

        return $attendance->delete();
    }

    /**
     * Get attendance for a specific date
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAttendanceForDate(string $date, ?int $classId = null)
    {
        $query = Attendance::whereDate('date', $date);

        if ($classId) {
            $query->whereHas('child', function ($q) use ($classId) {
                $q->where('class_id', $classId);
            });
        }

        return $query->with(['child', 'child.class'])->get();
    }

    /**
     * Get attendance for a specific child
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAttendanceForChild(int $childId, ?string $startDate = null, ?string $endDate = null)
    {
        $query = Attendance::where('child_id', $childId);

        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        return $query->orderBy('date', 'desc')->get();
    }

    /**
     * Get attendance for a specific class
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAttendanceForClass(int $classId, ?string $startDate = null, ?string $endDate = null)
    {
        $query = Attendance::whereHas('child', function ($q) use ($classId) {
            $q->where('class_id', $classId);
        });

        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        return $query->with(['child', 'child.parent'])->get();
    }

    /**
     * Get attendance summary for a class
     */
    public function getAttendanceSummary(int $classId, ?string $startDate = null, ?string $endDate = null): array
    {
        $query = Attendance::whereHas('child', function ($q) use ($classId) {
            $q->where('class_id', $classId);
        });

        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        $totalRecords = $query->count();
        $presentCount = $query->whereIn('status', ['present', 'late'])->count();
        $absentCount = $query->where('status', 'absent')->count();
        $excusedCount = $query->where('status', 'excused')->count();

        $attendanceRate = $totalRecords > 0 ? round(($presentCount / $totalRecords) * 100, 2) : 0;

        return [
            'total_records' => $totalRecords,
            'present_count' => $presentCount,
            'absent_count' => $absentCount,
            'excused_count' => $excusedCount,
            'attendance_rate' => $attendanceRate.'%',
        ];
    }

    /**
     * Get daily attendance report
     */
    public function getDailyAttendanceReport(string $date, ?int $classId = null): array
    {
        $query = Attendance::whereDate('date', $date);

        if ($classId) {
            $query->whereHas('child', function ($q) use ($classId) {
                $q->where('class_id', $classId);
            });
        }

        $attendances = $query->with(['child', 'child.class', 'child.parent'])->get();

        $summary = [
            'date' => $date,
            'total' => $attendances->count(),
            'present' => $attendances->where('status', 'present')->count(),
            'late' => $attendances->where('status', 'late')->count(),
            'absent' => $attendances->where('status', 'absent')->count(),
            'excused' => $attendances->where('status', 'excused')->count(),
            'records' => $attendances,
        ];

        return $summary;
    }

    /**
     * Get attendance trends for a child
     */
    public function getAttendanceTrends(int $childId, int $days = 30): array
    {
        $startDate = Carbon::now()->subDays($days);
        $endDate = Carbon::now();

        $attendances = Attendance::where('child_id', $childId)
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        $trends = [];
        $currentDate = clone $startDate;

        while ($currentDate <= $endDate) {
            $dateString = $currentDate->format('Y-m-d');
            $attendance = $attendances->firstWhere('date', $dateString);

            $trends[] = [
                'date' => $dateString,
                'status' => $attendance ? $attendance->status : null,
                'present' => $attendance && in_array($attendance->status, ['present', 'late']),
            ];

            $currentDate->addDay();
        }

        return $trends;
    }

    /**
     * Check if attendance is marked for a specific date and class
     */
    public function isAttendanceMarkedForClass(int $classId, string $date): bool
    {
        $childrenIds = Classes::find($classId)->children()->pluck('id')->toArray();

        if (empty($childrenIds)) {
            return true; // No children in class, so attendance is "marked"
        }

        $markedChildren = Attendance::whereDate('date', $date)
            ->whereIn('child_id', $childrenIds)
            ->pluck('child_id')
            ->toArray();

        return count($markedChildren) === count($childrenIds);
    }

    /**
     * Get absent students for a specific date
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAbsentStudents(string $date, ?int $classId = null)
    {
        $query = Children::query();

        if ($classId) {
            $query->where('class_id', $classId);
        }

        $allChildrenIds = $query->pluck('id')->toArray();

        $attendedChildrenIds = Attendance::whereDate('date', $date)
            ->whereIn('child_id', $allChildrenIds)
            ->where('status', '!=', 'absent')
            ->pluck('child_id')
            ->toArray();

        $absentChildrenIds = array_diff($allChildrenIds, $attendedChildrenIds);

        return Children::whereIn('id', $absentChildrenIds)
            ->with(['class', 'parent'])
            ->get();
    }
}
