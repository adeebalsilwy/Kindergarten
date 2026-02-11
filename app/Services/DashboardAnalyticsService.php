<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Attendance;
use App\Models\Children;
use App\Models\Classes;
use App\Models\Event;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardAnalyticsService
{
    /**
     * Get overall dashboard statistics
     */
    public function getDashboardStats(): array
    {
        return [
            'total_students' => $this->getTotalStudents(),
            'total_classes' => $this->getTotalClasses(),
            'total_teachers' => $this->getTotalTeachers(),
            'total_guardians' => $this->getTotalGuardians(),
            'today_attendance_rate' => $this->getTodayAttendanceRate(),
            'monthly_revenue' => $this->getMonthlyRevenue(),
            'outstanding_fees' => $this->getOutstandingFees(),
            'upcoming_events' => $this->getUpcomingEventsCount(),
        ];
    }

    /**
     * Get attendance analytics for a given period
     */
    public function getAttendanceAnalytics(?string $startDate = null, ?string $endDate = null): array
    {
        $startDate = $startDate ?? Carbon::now()->startOfMonth();
        $endDate = $endDate ?? Carbon::now()->endOfMonth();

        $attendances = Attendance::whereBetween('date', [$startDate, $endDate])
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        $total = $attendances->sum('count');
        $present = $attendances->whereIn('status', ['present', 'late'])->sum('count');
        $absent = $attendances->where('status', 'absent')->sum('count');
        $excused = $attendances->where('status', 'excused')->sum('count');

        return [
            'period' => [
                'start' => $startDate,
                'end' => $endDate,
            ],
            'statistics' => [
                'total' => $total,
                'present' => $present,
                'absent' => $absent,
                'excused' => $excused,
                'attendance_rate' => $total > 0 ? round(($present / $total) * 100, 2) : 0,
            ],
            'daily_trends' => $this->getDailyAttendanceTrends($startDate, $endDate),
            'class_performance' => $this->getClassAttendancePerformance($startDate, $endDate),
        ];
    }

    /**
     * Get financial analytics
     */
    public function getFinancialAnalytics(?string $startDate = null, ?string $endDate = null): array
    {
        $startDate = $startDate ?? Carbon::now()->startOfMonth();
        $endDate = $endDate ?? Carbon::now()->endOfMonth();

        $payments = Payment::whereBetween('payment_date', [$startDate, $endDate]);
        $totalCollected = $payments->sum('amount');
        $paymentCount = $payments->count();
        $averagePayment = $paymentCount > 0 ? $totalCollected / $paymentCount : 0;

        $paymentMethods = $payments->groupBy('payment_method')
            ->selectRaw('payment_method, COUNT(*) as count, SUM(amount) as total')
            ->get();

        return [
            'period' => [
                'start' => $startDate,
                'end' => $endDate,
            ],
            'revenue' => [
                'total_collected' => $totalCollected,
                'payment_count' => $paymentCount,
                'average_payment' => round($averagePayment, 2),
            ],
            'payment_methods' => $paymentMethods,
            'outstanding_fees' => $this->getOutstandingFeesByClass(),
            'monthly_trends' => $this->getMonthlyRevenueTrends(),
        ];
    }

    /**
     * Get student performance analytics
     */
    public function getStudentPerformanceAnalytics(?string $startDate = null, ?string $endDate = null): array
    {
        $startDate = $startDate ?? Carbon::now()->startOfMonth();
        $endDate = $endDate ?? Carbon::now()->endOfMonth();

        $children = Children::with(['grades', 'attendances'])->get();

        $performanceData = [];
        $totalStudents = $children->count();
        $excellentStudents = 0;
        $goodStudents = 0;
        $needsImprovement = 0;

        foreach ($children as $child) {
            $grades = $child->grades()
                ->whereBetween('date', [$startDate, $endDate])
                ->get();

            $attendances = $child->attendances()
                ->whereBetween('date', [$startDate, $endDate])
                ->get();

            $averageGrade = $grades->avg('score') ?? 0;
            $attendanceRate = $attendances->count() > 0 ?
                round(($attendances->whereIn('status', ['present', 'late'])->count() / $attendances->count()) * 100, 2) : 0;

            if ($averageGrade >= 85 && $attendanceRate >= 90) {
                $excellentStudents++;
            } elseif ($averageGrade >= 70 && $attendanceRate >= 80) {
                $goodStudents++;
            } else {
                $needsImprovement++;
            }

            $performanceData[] = [
                'child_id' => $child->id,
                'child_name' => $child->name,
                'average_grade' => round($averageGrade, 2),
                'attendance_rate' => $attendanceRate,
                'performance_level' => $this->getPerformanceLevel($averageGrade, $attendanceRate),
            ];
        }

        return [
            'period' => [
                'start' => $startDate,
                'end' => $endDate,
            ],
            'overall_statistics' => [
                'total_students' => $totalStudents,
                'excellent' => $excellentStudents,
                'good' => $goodStudents,
                'needs_improvement' => $needsImprovement,
                'excellent_percentage' => $totalStudents > 0 ? round(($excellentStudents / $totalStudents) * 100, 2) : 0,
                'good_percentage' => $totalStudents > 0 ? round(($goodStudents / $totalStudents) * 100, 2) : 0,
                'improvement_percentage' => $totalStudents > 0 ? round(($needsImprovement / $totalStudents) * 100, 2) : 0,
            ],
            'student_details' => $performanceData,
        ];
    }

    /**
     * Get class capacity utilization
     */
    public function getClassCapacityUtilization(): array
    {
        $classes = Classes::with('children')->get();

        $utilizationData = [];
        $totalCapacity = 0;
        $totalEnrolled = 0;

        foreach ($classes as $class) {
            $enrolled = $class->children()->count();
            $capacity = $class->capacity ?? 0;
            $utilization = $capacity > 0 ? round(($enrolled / $capacity) * 100, 2) : 0;

            $utilizationData[] = [
                'class_id' => $class->id,
                'class_name' => $class->name,
                'capacity' => $capacity,
                'enrolled' => $enrolled,
                'available_spots' => max(0, $capacity - $enrolled),
                'utilization_rate' => $utilization,
                'status' => $this->getClassCapacityStatus($utilization),
            ];

            $totalCapacity += $capacity;
            $totalEnrolled += $enrolled;
        }

        $overallUtilization = $totalCapacity > 0 ? round(($totalEnrolled / $totalCapacity) * 100, 2) : 0;

        return [
            'overall_utilization' => $overallUtilization,
            'total_capacity' => $totalCapacity,
            'total_enrolled' => $totalEnrolled,
            'classes' => $utilizationData,
        ];
    }

    /**
     * Get activity and event participation analytics
     */
    public function getActivityParticipationAnalytics(?string $startDate = null, ?string $endDate = null): array
    {
        $startDate = $startDate ?? Carbon::now()->startOfMonth();
        $endDate = $endDate ?? Carbon::now()->endOfMonth();

        $activities = Activity::whereBetween('scheduled_date', [$startDate, $endDate])->get();
        $events = Event::whereBetween('start_datetime', [$startDate, $endDate])->get();

        $activityParticipation = [];
        $eventParticipation = [];

        foreach ($activities as $activity) {
            $registeredCount = $activity->children()->count();
            $activityParticipation[] = [
                'activity_id' => $activity->id,
                'title' => $activity->title,
                'date' => $activity->scheduled_date,
                'registered_count' => $registeredCount,
                'class_id' => $activity->class_id,
            ];
        }

        foreach ($events as $event) {
            $registeredCount = $event->children()->count();
            $eventParticipation[] = [
                'event_id' => $event->id,
                'title' => $event->title,
                'date' => $event->start_datetime,
                'registered_count' => $registeredCount,
                'class_id' => $event->class_id,
            ];
        }

        return [
            'period' => [
                'start' => $startDate,
                'end' => $endDate,
            ],
            'activities' => [
                'total' => count($activities),
                'participation_data' => $activityParticipation,
            ],
            'events' => [
                'total' => count($events),
                'participation_data' => $eventParticipation,
            ],
        ];
    }

    // Private helper methods

    private function getTotalStudents(): int
    {
        return Children::where('enrollment_status', 'active')->count();
    }

    private function getTotalClasses(): int
    {
        return Classes::where('is_active', true)->count();
    }

    private function getTotalTeachers(): int
    {
        // Assuming there's a teachers table
        return DB::table('teachers')->where('is_active', true)->count();
    }

    private function getTotalGuardians(): int
    {
        return DB::table('guardians')->count();
    }

    private function getTodayAttendanceRate(): float
    {
        $today = Carbon::today();
        $total = Attendance::whereDate('date', $today)->count();
        $present = Attendance::whereDate('date', $today)
            ->whereIn('status', ['present', 'late'])
            ->count();

        return $total > 0 ? round(($present / $total) * 100, 2) : 0;
    }

    private function getMonthlyRevenue(): float
    {
        $startOfMonth = Carbon::now()->startOfMonth();

        return Payment::where('payment_date', '>=', $startOfMonth)->sum('amount');
    }

    private function getOutstandingFees(): float
    {
        return Children::sum(DB::raw('fees_required - fees_paid'));
    }

    private function getUpcomingEventsCount(): int
    {
        return Event::where('start_datetime', '>', now())->count();
    }

    private function getDailyAttendanceTrends($startDate, $endDate): array
    {
        $trends = [];
        $currentDate = clone Carbon::parse($startDate);

        while ($currentDate <= Carbon::parse($endDate)) {
            $dateString = $currentDate->format('Y-m-d');
            $total = Attendance::whereDate('date', $dateString)->count();
            $present = Attendance::whereDate('date', $dateString)
                ->whereIn('status', ['present', 'late'])
                ->count();

            $trends[] = [
                'date' => $dateString,
                'attendance_rate' => $total > 0 ? round(($present / $total) * 100, 2) : 0,
                'total_students' => $total,
                'present_students' => $present,
            ];

            $currentDate->addDay();
        }

        return $trends;
    }

    private function getClassAttendancePerformance($startDate, $endDate): array
    {
        $classes = Classes::with('children.attendances')->get();
        $performance = [];

        foreach ($classes as $class) {
            $totalAttendances = 0;
            $presentAttendances = 0;

            foreach ($class->children as $child) {
                $attendances = $child->attendances()
                    ->whereBetween('date', [$startDate, $endDate])
                    ->get();

                $totalAttendances += $attendances->count();
                $presentAttendances += $attendances->whereIn('status', ['present', 'late'])->count();
            }

            $performance[] = [
                'class_id' => $class->id,
                'class_name' => $class->name,
                'attendance_rate' => $totalAttendances > 0 ?
                    round(($presentAttendances / $totalAttendances) * 100, 2) : 0,
                'total_attendances' => $totalAttendances,
                'present_attendances' => $presentAttendances,
            ];
        }

        return $performance;
    }

    private function getOutstandingFeesByClass(): array
    {
        $classes = Classes::with('children')->get();
        $outstanding = [];

        foreach ($classes as $class) {
            $classOutstanding = 0;
            foreach ($class->children as $child) {
                $classOutstanding += max(0, $child->fees_required - $child->fees_paid);
            }

            $outstanding[] = [
                'class_id' => $class->id,
                'class_name' => $class->name,
                'outstanding_fees' => $classOutstanding,
            ];
        }

        return $outstanding;
    }

    private function getMonthlyRevenueTrends(): array
    {
        $trends = [];
        $startDate = Carbon::now()->subMonths(5)->startOfMonth();

        for ($i = 0; $i < 6; $i++) {
            $monthStart = $startDate->copy()->addMonths($i);
            $monthEnd = $monthStart->copy()->endOfMonth();

            $revenue = Payment::whereBetween('payment_date', [$monthStart, $monthEnd])->sum('amount');

            $trends[] = [
                'month' => $monthStart->format('F Y'),
                'revenue' => $revenue,
            ];
        }

        return $trends;
    }

    private function getPerformanceLevel(float $grade, float $attendance): string
    {
        if ($grade >= 85 && $attendance >= 90) {
            return 'excellent';
        } elseif ($grade >= 70 && $attendance >= 80) {
            return 'good';
        } else {
            return 'needs_improvement';
        }
    }

    private function getClassCapacityStatus(float $utilization): string
    {
        if ($utilization >= 90) {
            return 'full';
        } elseif ($utilization >= 70) {
            return 'high';
        } elseif ($utilization >= 30) {
            return 'moderate';
        } else {
            return 'low';
        }
    }
}
