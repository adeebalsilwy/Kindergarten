<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Attendance;
use App\Models\Children;
use App\Models\Classes;
use App\Models\Event;
use App\Models\FinancialReport;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class ReportService
{
    /**
     * Generate student academic report
     */
    public function generateAcademicReport(int $childId, ?string $startDate = null, ?string $endDate = null): array
    {
        $child = Children::with(['grades', 'attendances', 'activities', 'events'])->findOrFail($childId);

        $gradeQuery = $child->grades();
        $attendanceQuery = $child->attendances();

        if ($startDate) {
            $gradeQuery->whereDate('date', '>=', $startDate);
            $attendanceQuery->whereDate('date', '>=', $startDate);
        }

        if ($endDate) {
            $gradeQuery->whereDate('date', '<=', $endDate);
            $attendanceQuery->whereDate('date', '<=', $endDate);
        }

        $grades = $gradeQuery->get();
        $attendances = $attendanceQuery->get();

        $averageGrade = $grades->avg('score') ?: 0;
        $attendanceRate = $attendances->count() > 0 ?
            round(($attendances->whereIn('status', ['present', 'late'])->count() / $attendances->count()) * 100, 2) : 0;

        return [
            'child' => $child,
            'academic_period' => [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            'grades' => [
                'average' => round($averageGrade, 2),
                'count' => $grades->count(),
                'details' => $grades->toArray(),
            ],
            'attendance' => [
                'rate' => $attendanceRate.'%',
                'total_days' => $attendances->count(),
                'present_days' => $attendances->whereIn('status', ['present', 'late'])->count(),
                'absent_days' => $attendances->where('status', 'absent')->count(),
            ],
            'participation' => [
                'activities_count' => $child->activities()->count(),
                'events_count' => $child->events()->count(),
            ],
        ];
    }

    /**
     * Generate class academic report
     */
    public function generateClassAcademicReport(int $classId, ?string $startDate = null, ?string $endDate = null): array
    {
        $class = Classes::with(['children.grades', 'children.attendances'])->findOrFail($classId);

        $children = $class->children;

        $reportData = [];
        $classAverages = [
            'grade_average' => 0,
            'attendance_average' => 0,
            'total_students' => $children->count(),
        ];

        $totalGradesSum = 0;
        $totalAttendanceSum = 0;

        foreach ($children as $child) {
            $gradeQuery = $child->grades();
            $attendanceQuery = $child->attendances();

            if ($startDate) {
                $gradeQuery->whereDate('date', '>=', $startDate);
                $attendanceQuery->whereDate('date', '>=', $startDate);
            }

            if ($endDate) {
                $gradeQuery->whereDate('date', '<=', $endDate);
                $attendanceQuery->whereDate('date', '<=', $endDate);
            }

            $grades = $gradeQuery->get();
            $attendances = $attendanceQuery->get();

            $childAverageGrade = $grades->avg('score') ?: 0;
            $childAttendanceRate = $attendances->count() > 0 ?
                ($attendances->whereIn('status', ['present', 'late'])->count() / $attendances->count()) * 100 : 0;

            $reportData[] = [
                'child' => $child,
                'average_grade' => round($childAverageGrade, 2),
                'attendance_rate' => round($childAttendanceRate, 2).'%',
                'grade_count' => $grades->count(),
                'attendance_count' => $attendances->count(),
            ];

            $totalGradesSum += $childAverageGrade;
            $totalAttendanceSum += $childAttendanceRate;
        }

        if ($children->count() > 0) {
            $classAverages['grade_average'] = round($totalGradesSum / $children->count(), 2);
            $classAverages['attendance_average'] = round($totalAttendanceSum / $children->count(), 2);
        }

        return [
            'class' => $class,
            'academic_period' => [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            'students' => $reportData,
            'class_averages' => $classAverages,
        ];
    }

    /**
     * Generate attendance report for a class
     */
    public function generateAttendanceReport(int $classId, ?string $startDate = null, ?string $endDate = null): array
    {
        $class = Classes::with('children')->findOrFail($classId);

        $children = $class->children;

        $reportData = [];
        $summary = [
            'total_students' => $children->count(),
            'total_days' => 0,
            'total_present' => 0,
            'total_late' => 0,
            'total_absent' => 0,
            'overall_attendance_rate' => 0,
        ];

        foreach ($children as $child) {
            $query = Attendance::where('child_id', $child->id);

            if ($startDate) {
                $query->whereDate('date', '>=', $startDate);
            }

            if ($endDate) {
                $query->whereDate('date', '<=', $endDate);
            }

            $attendances = $query->get();

            $presentCount = $attendances->whereIn('status', ['present', 'late'])->count();
            $totalCount = $attendances->count();
            $attendanceRate = $totalCount > 0 ? round(($presentCount / $totalCount) * 100, 2) : 0;

            $reportData[] = [
                'child' => $child,
                'total_days' => $totalCount,
                'present_days' => $attendances->whereIn('status', ['present', 'late'])->count(),
                'late_days' => $attendances->where('status', 'late')->count(),
                'absent_days' => $attendances->where('status', 'absent')->count(),
                'attendance_rate' => $attendanceRate.'%',
            ];

            $summary['total_days'] += $totalCount;
            $summary['total_present'] += $attendances->whereIn('status', ['present', 'late'])->count();
            $summary['total_late'] += $attendances->where('status', 'late')->count();
            $summary['total_absent'] += $attendances->where('status', 'absent')->count();
        }

        if ($summary['total_days'] > 0) {
            $summary['overall_attendance_rate'] = round(($summary['total_present'] / $summary['total_days']) * 100, 2);
        }

        return [
            'class' => $class,
            'reporting_period' => [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            'student_details' => $reportData,
            'summary' => $summary,
        ];
    }

    /**
     * Generate financial report
     */
    public function generateFinancialReport(?string $startDate = null, ?string $endDate = null): array
    {
        $paymentQuery = Payment::query();
        $expenseQuery = DB::table('expenses');

        if ($startDate) {
            $paymentQuery->whereDate('payment_date', '>=', $startDate);
            $expenseQuery->whereDate('expense_date', '>=', $startDate);
        }

        if ($endDate) {
            $paymentQuery->whereDate('payment_date', '<=', $endDate);
            $expenseQuery->whereDate('expense_date', '<=', $endDate);
        }

        $totalIncome = $paymentQuery->sum('amount');
        $totalExpenses = $expenseQuery->sum('amount');
        $netIncome = $totalIncome - $totalExpenses;

        $incomeByMethod = $paymentQuery
            ->selectRaw('payment_method, COUNT(*) as count, SUM(amount) as total')
            ->groupBy('payment_method')
            ->get();

        $recentPayments = $paymentQuery
            ->with(['child', 'fee'])
            ->orderBy('payment_date', 'desc')
            ->limit(10)
            ->get();

        $recentExpenses = $expenseQuery
            ->orderBy('expense_date', 'desc')
            ->limit(10)
            ->get();

        return [
            'reporting_period' => [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            'income' => [
                'total_income' => $totalIncome,
                'by_method' => $incomeByMethod,
                'recent_payments' => $recentPayments,
            ],
            'expenses' => [
                'total_expenses' => $totalExpenses,
                'recent_expenses' => $recentExpenses,
            ],
            'net_income' => $netIncome,
            'financial_summary' => [
                'income_vs_expenses' => [
                    'income' => $totalIncome,
                    'expenses' => $totalExpenses,
                ],
            ],
        ];
    }

    /**
     * Generate activity and event report
     */
    public function generateActivityEventReport(int $classId, ?string $startDate = null, ?string $endDate = null): array
    {
        $class = Classes::findOrFail($classId);

        $activityQuery = Activity::where('class_id', $classId);
        $eventQuery = Event::where('class_id', $classId);

        if ($startDate) {
            $activityQuery->whereDate('scheduled_date', '>=', $startDate);
            $eventQuery->whereDate('start_datetime', '>=', $startDate);
        }

        if ($endDate) {
            $activityQuery->whereDate('scheduled_date', '<=', $endDate);
            $eventQuery->whereDate('start_datetime', '<=', $endDate);
        }

        $activities = $activityQuery->with(['children'])->get();
        $events = $eventQuery->with(['children'])->get();

        $totalActivities = $activities->count();
        $totalEvents = $events->count();
        $totalParticipants = 0;

        foreach ($activities as $activity) {
            $totalParticipants += $activity->children->count();
        }

        foreach ($events as $event) {
            $totalParticipants += $event->children->count();
        }

        return [
            'class' => $class,
            'reporting_period' => [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            'activities' => [
                'count' => $totalActivities,
                'details' => $activities,
            ],
            'events' => [
                'count' => $totalEvents,
                'details' => $events,
            ],
            'participation' => [
                'total_participants' => $totalParticipants,
            ],
        ];
    }

    /**
     * Save financial report to database
     */
    public function saveFinancialReport(array $data): FinancialReport
    {
        $reportData = $this->generateFinancialReport(
            $data['start_date'] ?? null,
            $data['end_date'] ?? null
        );

        return FinancialReport::create([
            'name' => $data['name'] ?? 'Financial Report - '.now()->format('Y-m-d'),
            'report_type' => 'financial',
            'generated_by' => $data['generated_by'] ?? null,
            'period_start' => $data['start_date'] ?? now()->startOfMonth(),
            'period_end' => $data['end_date'] ?? now(),
            'data' => $reportData,
        ]);
    }

    /**
     * Get financial reports summary
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFinancialReportsSummary(int $limit = 10)
    {
        return FinancialReport::orderBy('period_end', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Generate class capacity utilization report
     */
    public function generateClassCapacityReport(int $classId): array
    {
        $class = Classes::findOrFail($classId);

        $utilization = $class->capacity > 0 ?
            round(($class->current_students / $class->capacity) * 100, 2) : 0;

        return [
            'class' => $class,
            'capacity' => $class->capacity,
            'current_students' => $class->current_students,
            'utilization_rate' => $utilization.'%',
            'available_spots' => $class->capacity - $class->current_students,
        ];
    }

    /**
     * Generate enrollment trend report
     */
    public function generateEnrollmentTrendReport(?string $startDate = null, ?string $endDate = null): array
    {
        $query = Children::query();

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        $enrollments = $query->select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'asc')
            ->get();

        $totalEnrollments = $enrollments->sum('count');
        $averagePerDay = $enrollments->count() > 0 ? round($totalEnrollments / $enrollments->count(), 2) : 0;

        return [
            'reporting_period' => [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            'trends' => $enrollments,
            'summary' => [
                'total_enrollments' => $totalEnrollments,
                'average_per_day' => $averagePerDay,
                'total_days' => $enrollments->count(),
            ],
        ];
    }

    /**
     * Generate teacher workload report
     */
    public function generateTeacherWorkloadReport(int $teacherId, ?string $startDate = null, ?string $endDate = null): array
    {
        $teacher = \App\Models\Teacher::findOrFail($teacherId);

        $classes = $teacher->classes;
        $activities = Activity::where('teacher_id', $teacherId);
        $events = Event::where('teacher_id', $teacherId);

        if ($startDate) {
            $activities->whereDate('scheduled_date', '>=', $startDate);
            $events->whereDate('start_datetime', '>=', $startDate);
        }

        if ($endDate) {
            $activities->whereDate('scheduled_date', '<=', $endDate);
            $events->whereDate('start_datetime', '<=', $endDate);
        }

        $activities = $activities->get();
        $events = $events->get();

        $totalStudents = 0;
        foreach ($classes as $class) {
            $totalStudents += $class->current_students;
        }

        return [
            'teacher' => $teacher,
            'reporting_period' => [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            'classes_managed' => $classes->count(),
            'total_students' => $totalStudents,
            'activities_conducted' => $activities->count(),
            'events_organized' => $events->count(),
            'classes_details' => $classes,
            'activities_details' => $activities,
            'events_details' => $events,
        ];
    }
}
