<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Children;
use App\Models\Payment;
use App\Models\Teacher;
use Carbon\Carbon;

class DashboardContentService
{
    public function getGeneralMetrics(): array
    {
        return [
            'total_students' => Children::count(),
            'total_teachers' => Teacher::count(),
            'active_attendance' => Attendance::whereDate('date', Carbon::today())->count(),
            'total_classes' => \App\Models\Classes::count(),
        ];
    }

    public function getAttendanceData(): array
    {
        $today = Attendance::whereDate('date', Carbon::today())->get();

        return [
            'total_today' => $today->count(),
            'present' => $today->where('status', 'present')->count(),
            'absent' => $today->where('status', 'absent')->count(),
            'late' => $today->where('status', 'late')->count(),
            'excused' => $today->where('status', 'excused')->count(),
        ];
    }

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

    public function getRecentActivities(int $limit = 5): \Illuminate\Support\Collection
    {
        return Attendance::with(['child'])
            ->latest()
            ->limit($limit)
            ->get();
    }
}
