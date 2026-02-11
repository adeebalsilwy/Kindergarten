<?php

namespace App\Services;

use App\Models\Children;
use App\Models\Fee;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class FeePaymentService
{
    /**
     * Process a payment for a child's fee
     */
    public function processPayment(array $data): Payment
    {
        $this->validatePaymentData($data);

        return DB::transaction(function () use ($data) {
            $payment = Payment::create($data);

            // Update child's fees paid amount
            $child = Children::find($data['child_id']);
            if ($child) {
                $child->increment('fees_paid', $data['amount']);
            }

            return $payment;
        });
    }

    /**
     * Validate payment data
     *
     * @throws \InvalidArgumentException
     */
    private function validatePaymentData(array $data): void
    {
        if (! isset($data['child_id']) || ! Children::find($data['child_id'])) {
            throw new \InvalidArgumentException('Invalid child ID provided');
        }

        if (! isset($data['amount']) || $data['amount'] <= 0) {
            throw new \InvalidArgumentException('Amount must be greater than zero');
        }

        if (isset($data['fee_id']) && ! Fee::find($data['fee_id'])) {
            throw new \InvalidArgumentException('Invalid fee ID provided');
        }
    }

    /**
     * Bulk process payments
     */
    public function bulkProcessPayments(array $payments): array
    {
        $results = [];

        DB::transaction(function () use ($payments, &$results) {
            foreach ($payments as $paymentData) {
                $this->validatePaymentData($paymentData);

                $payment = Payment::create($paymentData);

                // Update child's fees paid amount
                $child = Children::find($paymentData['child_id']);
                if ($child) {
                    $child->increment('fees_paid', $paymentData['amount']);
                }

                $results[] = $payment;
            }
        });

        return $results;
    }

    /**
     * Update a payment
     */
    public function updatePayment(Payment $payment, array $data): Payment
    {
        $oldAmount = $payment->amount;

        $payment->update($data);

        // Adjust child's fees paid amount
        if (isset($data['amount']) && $data['amount'] != $oldAmount) {
            $child = $payment->child;
            if ($child) {
                $difference = $data['amount'] - $oldAmount;
                $child->increment('fees_paid', $difference);
            }
        }

        return $payment;
    }

    /**
     * Delete a payment
     */
    public function deletePayment(Payment $payment): bool
    {
        $result = $payment->delete();

        // Adjust child's fees paid amount
        $child = $payment->child;
        if ($child) {
            $child->decrement('fees_paid', $payment->amount);
        }

        return $result;
    }

    /**
     * Get payments for a specific child
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPaymentsForChild(int $childId, array $filters = [])
    {
        $query = Payment::where('child_id', $childId);

        if (isset($filters['start_date'])) {
            $query->whereDate('payment_date', '>=', $filters['start_date']);
        }

        if (isset($filters['end_date'])) {
            $query->whereDate('payment_date', '<=', $filters['end_date']);
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['payment_method'])) {
            $query->where('payment_method', $filters['payment_method']);
        }

        return $query->with(['fee'])->orderBy('payment_date', 'desc')->get();
    }

    /**
     * Get payments for a specific fee type
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPaymentsForFee(int $feeId, array $filters = [])
    {
        $query = Payment::where('fee_id', $feeId);

        if (isset($filters['start_date'])) {
            $query->whereDate('payment_date', '>=', $filters['start_date']);
        }

        if (isset($filters['end_date'])) {
            $query->whereDate('payment_date', '<=', $filters['end_date']);
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->with(['child', 'child.parent'])->orderBy('payment_date', 'desc')->get();
    }

    /**
     * Calculate outstanding fees for a child
     */
    public function calculateOutstandingFees(int $childId): float
    {
        $child = Children::find($childId);
        if (! $child) {
            return 0;
        }

        return max(0, $child->fees_required - $child->fees_paid);
    }

    /**
     * Get fee balance for all children in a class
     */
    public function getFeeBalancesForClass(int $classId): array
    {
        $children = Children::where('class_id', $classId)->get();

        $balances = [];
        foreach ($children as $child) {
            $balances[] = [
                'child_id' => $child->id,
                'child_name' => $child->name,
                'fees_required' => $child->fees_required,
                'fees_paid' => $child->fees_paid,
                'balance' => $this->calculateOutstandingFees($child->id),
            ];
        }

        return $balances;
    }

    /**
     * Get payment summary for a date range
     */
    public function getPaymentSummary(?string $startDate = null, ?string $endDate = null): array
    {
        $query = Payment::query();

        if ($startDate) {
            $query->whereDate('payment_date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('payment_date', '<=', $endDate);
        }

        $totalPayments = $query->sum('amount');
        $paymentCount = $query->count();
        $averagePayment = $paymentCount > 0 ? $totalPayments / $paymentCount : 0;

        return [
            'total_payments' => $totalPayments,
            'payment_count' => $paymentCount,
            'average_payment' => round($averagePayment, 2),
            'payment_methods' => $query->groupBy('payment_method')
                ->selectRaw('payment_method, COUNT(*) as count, SUM(amount) as total')
                ->get()
                ->toArray(),
        ];
    }

    /**
     * Get overdue payments
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOverduePayments(int $daysPastDue = 30)
    {
        // Get fees that are past due
        $dueFees = Fee::where('due_date', '<', now())
            ->where('is_active', true)
            ->get();

        $overduePayments = collect();

        foreach ($dueFees as $fee) {
            // Find children who have this fee but haven't paid it
            $unpaidChildren = Children::whereHas('payments', function ($query) use ($fee) {
                $query->where('fee_id', $fee->id);
            })->whereColumn('fees_paid', '<', 'fees_required')
                ->with(['payments', 'parent']);

            $overduePayments = $overduePayments->merge($unpaidChildren);
        }

        return $overduePayments;
    }

    /**
     * Generate fee statement for a child
     */
    public function generateFeeStatement(int $childId): array
    {
        $child = Children::with(['payments.fee', 'parent'])->findOrFail($childId);

        $fees = $child->fees_required;
        $paid = $child->fees_paid;
        $balance = $fees - $paid;

        $paymentHistory = $child->payments()
            ->with('fee')
            ->orderBy('payment_date', 'desc')
            ->get();

        return [
            'child' => $child,
            'fees_required' => $fees,
            'fees_paid' => $paid,
            'balance' => $balance,
            'payment_history' => $paymentHistory,
            'payment_percentage' => $fees > 0 ? round(($paid / $fees) * 100, 2) : 0,
        ];
    }

    /**
     * Send payment reminder to guardians
     */
    public function sendPaymentReminder(int $childId, string $message): bool
    {
        $child = Children::with('parent')->find($childId);
        if (! $child || ! $child->parent) {
            return false;
        }

        // In a real application, this would send an email/SMS notification
        // For now, we'll just return true to indicate success
        return true;
    }
}
