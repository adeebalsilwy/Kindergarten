<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Attendance;
use App\Models\Children;
use App\Models\Classes;
use App\Models\Event;
use App\Models\Grade;
use App\Models\Guardian;
use App\Models\Payment;
use App\Models\Teacher;
use Carbon\Carbon;

class DashboardService
{
    /**
     * Get general metrics for the dashboard
     */
    public function getGeneralMetrics(): array
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        return [
            'total_students' => Children::count(),
            'active_students' => Children::where('enrollment_status', 'active')->count(),
            'total_teachers' => Teacher::count(),
            'total_guardians' => Guardian::count(),
            'total_classes' => Classes::count(),
            'active_attendance' => Attendance::whereDate('date', Carbon::today())->count(),
            'monthly_revenue' => Payment::whereMonth('payment_date', $currentMonth)
                ->whereYear('payment_date', $currentYear)
                ->sum('amount'),
            'pending_payments' => Payment::where('status', 'pending')->sum('amount'),
            'total_revenue' => Payment::sum('amount'),
        ];
    }

    /**
     * Get attendance statistics
     */
    public function getAttendanceStats(): array
    {
        $today = Attendance::whereDate('date', Carbon::today())->get();
        $thisWeek = Attendance::whereBetween('date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();

        $todayStats = [
            'total_today' => $today->count(),
            'present' => $today->where('status', 'present')->count(),
            'absent' => $today->where('status', 'absent')->count(),
            'late' => $today->where('status', 'late')->count(),
            'excused' => $today->where('status', 'excused')->count(),
        ];

        $weekStats = [
            'total_week' => $thisWeek->count(),
            'present' => $thisWeek->where('status', 'present')->count(),
            'absent' => $thisWeek->where('status', 'absent')->count(),
            'late' => $thisWeek->where('status', 'late')->count(),
            'excused' => $thisWeek->where('status', 'excused')->count(),
        ];

        // Calculate attendance rate
        $todayStats['attendance_rate'] = $todayStats['total_today'] > 0
            ? round(($todayStats['present'] / $todayStats['total_today']) * 100, 2)
            : 0;

        return [
            'today' => $todayStats,
            'week' => $weekStats,
        ];
    }

    /**
     * Get financial statistics
     */
    public function getFinancialStats(): array
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $previousMonth = Carbon::now()->subMonth()->month;
        $previousYear = Carbon::now()->subMonth()->year;

        $currentMonthRevenue = Payment::whereMonth('payment_date', $currentMonth)
            ->whereYear('payment_date', $currentYear)
            ->sum('amount');

        $previousMonthRevenue = Payment::whereMonth('payment_date', $previousMonth)
            ->whereYear('payment_date', $previousYear)
            ->sum('amount');

        $growthRate = $previousMonthRevenue > 0
            ? round((($currentMonthRevenue - $previousMonthRevenue) / $previousMonthRevenue) * 100, 2)
            : 100;

        return [
            'current_month' => $currentMonthRevenue,
            'previous_month' => $previousMonthRevenue,
            'growth_rate' => $growthRate,
            'pending_payments' => Payment::where('status', 'pending')->sum('amount'),
            'overdue_payments' => $this->getOverduePaymentsCount(),
            'payment_methods' => $this->getPaymentMethodsDistribution(),
        ];
    }

    /**
     * Get enrollment statistics
     */
    public function getEnrollmentStats(): array
    {
        $enrollmentsThisMonth = Children::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $enrollmentsLastMonth = Children::whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();

        $growthRate = $enrollmentsLastMonth > 0
            ? round((($enrollmentsThisMonth - $enrollmentsLastMonth) / $enrollmentsLastMonth) * 100, 2)
            : 100;

        return [
            'this_month' => $enrollmentsThisMonth,
            'last_month' => $enrollmentsLastMonth,
            'growth_rate' => $growthRate,
            'by_status' => [
                'active' => Children::where('enrollment_status', 'active')->count(),
                'inactive' => Children::where('enrollment_status', 'inactive')->count(),
                'graduated' => Children::where('enrollment_status', 'graduated')->count(),
                'transferred' => Children::where('enrollment_status', 'transferred')->count(),
            ],
        ];
    }

    /**
     * Get class statistics
     */
    public function getClassStats(): array
    {
        $classes = Classes::withCount(['children as student_count'])->get();

        $utilizationRates = [];
        foreach ($classes as $class) {
            $utilizationRate = $class->capacity > 0
                ? round(($class->student_count / $class->capacity) * 100, 2)
                : 0;

            $utilizationRates[] = [
                'class_name' => $class->name,
                'student_count' => $class->student_count,
                'capacity' => $class->capacity,
                'utilization_rate' => $utilizationRate,
            ];
        }

        return [
            'total_classes' => $classes->count(),
            'total_students' => $classes->sum('student_count'),
            'average_utilization' => $classes->avg('student_count') > 0
                ? round(($classes->sum('student_count') / ($classes->sum('capacity') > 0 ? $classes->sum('capacity') : 1)) * 100, 2)
                : 0,
            'utilization_rates' => $utilizationRates,
        ];
    }

    /**
     * Get recent activities (attendance, payments, enrollments)
     */
    public function getRecentActivities(int $limit = 5): array
    {
        $recentAttendances = Attendance::with(['child', 'child.class'])
            ->latest()
            ->limit($limit)
            ->get();

        $recentPayments = Payment::with(['child', 'fee'])
            ->latest()
            ->limit($limit)
            ->get();

        $recentEnrollments = Children::with(['parent', 'class'])
            ->latest()
            ->limit($limit)
            ->get();

        $recentActivities = Activity::with(['class', 'teacher'])
            ->where('scheduled_date', '>=', Carbon::now()->subWeek())
            ->latest('scheduled_date')
            ->limit($limit)
            ->get();

        $recentEvents = Event::with(['class', 'teacher'])
            ->where('start_datetime', '>=', Carbon::now()->subWeek())
            ->latest('start_datetime')
            ->limit($limit)
            ->get();

        return [
            'attendances' => $recentAttendances,
            'payments' => $recentPayments,
            'enrollments' => $recentEnrollments,
            'activities' => $recentActivities,
            'events' => $recentEvents,
        ];
    }

    /**
     * Get academic performance statistics
     */
    public function getAcademicStats(): array
    {
        $recentGrades = Grade::where('date', '>=', Carbon::now()->subMonth())
            ->get();

        // Convert Arabic grade texts to numeric values for calculation
        $numericScores = $recentGrades->map(function ($grade) {
            $scoreMap = [
                'ممتاز' => 95,      // Excellent
                'جيد جداً' => 85,   // Very Good
                'جيد' => 75,        // Good
                'مقبول' => 65,     // Acceptable
                'ضعيف' => 45,        // Weak
            ];

            $scoreText = trim($grade->score);

            return $scoreMap[$scoreText] ?? 0;
        });

        $averageScore = $numericScores->isNotEmpty() ? $numericScores->avg() : 0;
        $highestScore = $numericScores->isNotEmpty() ? $numericScores->max() : 0;
        $lowestScore = $numericScores->isNotEmpty() ? $numericScores->min() : 0;

        // Distribution of grades based on Arabic text values
        $gradeDistribution = [
            'excellent' => $recentGrades->where('score', 'ممتاز')->count(),
            'very_good' => $recentGrades->where('score', 'جيد جداً')->count(),
            'good' => $recentGrades->where('score', 'جيد')->count(),
            'acceptable' => $recentGrades->where('score', 'مقبول')->count(),
            'weak' => $recentGrades->where('score', 'ضعيف')->count(),
        ];

        return [
            'average_score' => round($averageScore, 2),
            'highest_score' => $highestScore,
            'lowest_score' => $lowestScore,
            'grade_distribution' => $gradeDistribution,
            'total_assessments' => $recentGrades->count(),
        ];
    }

    /**
     * Get teacher workload statistics
     */
    public function getTeacherStats(): array
    {
        $teachers = Teacher::withCount(['classes as class_count'])->get();

        $avgClassesPerTeacher = $teachers->avg('class_count') ?: 0;
        $totalClasses = $teachers->sum('class_count');

        return [
            'total_teachers' => $teachers->count(),
            'total_classes' => $totalClasses,
            'average_classes_per_teacher' => round($avgClassesPerTeacher, 2),
            'teachers_with_multiple_classes' => $teachers->filter(fn ($t) => $t->class_count > 1)->count(),
        ];
    }

    /**
     * Get chart data for dashboard visualization
     */
    public function getChartData(): array
    {
        // Monthly revenue for the last 6 months
        $revenueData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $revenue = Payment::whereYear('payment_date', $month->year)
                ->whereMonth('payment_date', $month->month)
                ->sum('amount');

            $revenueData[] = [
                'month' => $month->format('M Y'),
                'revenue' => $revenue,
            ];
        }

        // Student enrollment by month for the last 6 months
        $enrollmentData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $enrollments = Children::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $enrollmentData[] = [
                'month' => $month->format('M Y'),
                'enrollments' => $enrollments,
            ];
        }

        // Attendance rate by day for the last week
        $attendanceData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dailyAttendance = Attendance::whereDate('date', $date)
                ->get();

            $total = $dailyAttendance->count();
            $present = $dailyAttendance->whereIn('status', ['present', 'late'])->count();
            $rate = $total > 0 ? round(($present / $total) * 100, 2) : 0;

            $attendanceData[] = [
                'date' => $date->format('D M j'),
                'attendance_rate' => $rate,
                'total' => $total,
                'present' => $present,
            ];
        }

        return [
            'revenue_chart' => $revenueData,
            'enrollment_chart' => $enrollmentData,
            'attendance_chart' => $attendanceData,
        ];
    }

    /**
     * Get overdue payments count
     */
    private function getOverduePaymentsCount(): int
    {
        // Assuming payments are considered overdue if they're pending and past due date
        // This would require checking against fee due dates or payment terms
        return Payment::where('status', 'pending')
            ->where('payment_date', '<', Carbon::now()->subDays(30))
            ->count();
    }

    /**
     * Get payment methods distribution
     */
    private function getPaymentMethodsDistribution(): array
    {
        return Payment::selectRaw('payment_method, COUNT(*) as count, SUM(amount) as total')
            ->groupBy('payment_method')
            ->get()
            ->toArray();
    }

    /**
     * Get attendance data (for backward compatibility)
     */
    public function getAttendanceData(): array
    {
        $today = Attendance::whereDate('date', Carbon::today())->get();

        return [
            'recent_attendance' => $today,
            'total_today' => $today->count(),
            'present' => $today->where('status', 'present')->count(),
            'absent' => $today->where('status', 'absent')->count(),
            'late' => $today->where('status', 'late')->count(),
            'excused' => $today->where('status', 'excused')->count(),
        ];
    }

    /**
     * Get financial summary (for backward compatibility)
     */
    public function getFinancialSummary(): array
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthlyPayments = Payment::whereMonth('payment_date', $currentMonth)
            ->whereYear('payment_date', $currentYear)
            ->sum('amount');

        $pendingPayments = Payment::where('status', 'pending')->sum('amount');

        return [
            'monthly_revenue' => $monthlyPayments,
            'pending_amount' => $pendingPayments,
            'total_received' => Payment::sum('amount'),
        ];
    }

    /**
     * Get upcoming events
     *
     * @return \Illuminate\Support\Collection
     */
    public function getUpcomingEvents()
    {
        return Event::where('start_datetime', '>', Carbon::now())
            ->orderBy('start_datetime', 'asc')
            ->limit(5)
            ->get();
    }

    /**
     * Get quick actions
     */
    public function getQuickActions(): array
    {
        return [
            [
                'title' => 'Add New Child',
                'route' => 'children.create',
                'icon' => 'UserPlus',
                'color' => 'primary',
            ],
            [
                'title' => 'Record Attendance',
                'route' => 'attendance.index',
                'icon' => 'Calendar',
                'color' => 'success',
            ],
            [
                'title' => 'Process Payment',
                'route' => 'payments.create',
                'icon' => 'CreditCard',
                'color' => 'warning',
            ],
            [
                'title' => 'Add New Activity',
                'route' => 'activities.create',
                'icon' => 'Activity',
                'color' => 'info',
            ],
        ];
    }
}
