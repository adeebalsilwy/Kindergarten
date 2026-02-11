<?php

namespace App\Services;

use App\Models\Children;
use App\Models\Guardian;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class CommunicationService
{
    /**
     * Send SMS notification to a guardian
     */
    public function sendSMS(Guardian $guardian, string $message, array $options = []): bool
    {
        if (! $guardian->phone || ! $this->canReceiveSMS($guardian)) {
            return false;
        }

        try {
            // In a real application, this would integrate with an SMS gateway
            Log::info('SMS sent to '.$guardian->phone.': '.$message);

            // Save notification log
            $this->logNotification($guardian, 'sms', $message, $options);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send SMS: '.$e->getMessage());

            return false;
        }
    }

    /**
     * Send email notification to a guardian
     */
    public function sendEmail(Guardian $guardian, string $subject, string $message, array $options = []): bool
    {
        if (! $guardian->email || ! $this->canReceiveEmail($guardian)) {
            return false;
        }

        try {
            // In a real application, this would send an actual email
            Log::info('Email sent to '.$guardian->email.': '.$subject);

            // Save notification log
            $this->logNotification($guardian, 'email', $message, array_merge($options, ['subject' => $subject]));

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send email: '.$e->getMessage());

            return false;
        }
    }

    /**
     * Send bulk SMS to multiple guardians
     */
    public function sendBulkSMS(array $guardianIds, string $message, array $options = []): array
    {
        $results = [];
        $successCount = 0;
        $failCount = 0;

        foreach ($guardianIds as $guardianId) {
            $guardian = Guardian::find($guardianId);
            if ($guardian) {
                $sent = $this->sendSMS($guardian, $message, $options);
                $results[$guardianId] = $sent;
                $sent ? $successCount++ : $failCount++;
            }
        }

        return [
            'results' => $results,
            'success_count' => $successCount,
            'fail_count' => $failCount,
            'total' => count($guardianIds),
        ];
    }

    /**
     * Send bulk email to multiple guardians
     */
    public function sendBulkEmail(array $guardianIds, string $subject, string $message, array $options = []): array
    {
        $results = [];
        $successCount = 0;
        $failCount = 0;

        foreach ($guardianIds as $guardianId) {
            $guardian = Guardian::find($guardianId);
            if ($guardian) {
                $sent = $this->sendEmail($guardian, $subject, $message, $options);
                $results[$guardianId] = $sent;
                $sent ? $successCount++ : $failCount++;
            }
        }

        return [
            'results' => $results,
            'success_count' => $successCount,
            'fail_count' => $failCount,
            'total' => count($guardianIds),
        ];
    }

    /**
     * Send attendance notification to guardians
     */
    public function sendAttendanceNotification(int $childId, string $status, ?string $reason = null): bool
    {
        $child = Children::with('parent')->find($childId);
        if (! $child || ! $child->parent) {
            return false;
        }

        $message = "Attendance Update: {$child->name} has been marked as {$status}";
        if ($reason) {
            $message .= " - Reason: {$reason}";
        }

        // Send both SMS and email if possible
        $smsSent = $this->sendSMS($child->parent, $message);
        $emailSent = $this->sendEmail($child->parent, 'Attendance Update', $message);

        return $smsSent || $emailSent;
    }

    /**
     * Send payment reminder to guardians
     */
    public function sendPaymentReminder(int $childId, float $amount, ?string $dueDate = null): bool
    {
        $child = Children::with('parent')->find($childId);
        if (! $child || ! $child->parent) {
            return false;
        }

        $message = 'Payment Reminder: Outstanding fees of $'.number_format($amount, 2)." for {$child->name}";
        if ($dueDate) {
            $message .= ' are due by '.$dueDate;
        }
        $message .= '. Please make payment at your earliest convenience.';

        // Send both SMS and email if possible
        $smsSent = $this->sendSMS($child->parent, $message);
        $emailSent = $this->sendEmail($child->parent, 'Payment Reminder', $message);

        return $smsSent || $emailSent;
    }

    /**
     * Send event reminder to guardians
     */
    public function sendEventReminder(int $eventId, array $childIds): bool
    {
        $children = Children::with('parent')->whereIn('id', $childIds)->get();
        $successCount = 0;

        foreach ($children as $child) {
            if ($child->parent) {
                $message = "Event Reminder: {$child->name} is registered for an upcoming event.";
                $smsSent = $this->sendSMS($child->parent, $message);
                $emailSent = $this->sendEmail($child->parent, 'Event Reminder', $message);

                if ($smsSent || $emailSent) {
                    $successCount++;
                }
            }
        }

        return $successCount > 0;
    }

    /**
     * Check if guardian can receive SMS
     */
    public function canReceiveSMS(Guardian $guardian): bool
    {
        return ! empty($guardian->phone) &&
               isset($guardian->receives_sms_notifications) &&
               $guardian->receives_sms_notifications;
    }

    /**
     * Check if guardian can receive email
     */
    public function canReceiveEmail(Guardian $guardian): bool
    {
        return ! empty($guardian->email) &&
               isset($guardian->receives_email_notifications) &&
               $guardian->receives_email_notifications;
    }

    /**
     * Log notification for auditing purposes
     */
    private function logNotification(Guardian $guardian, string $type, string $message, array $options = []): void
    {
        // In a real application, this would save to a notifications_log table
        $logData = [
            'guardian_id' => $guardian->id,
            'type' => $type,
            'message' => $message,
            'options' => $options,
            'sent_at' => now(),
        ];

        Log::info('Notification logged: '.json_encode($logData));
    }

    /**
     * Get notification preferences for a guardian
     */
    public function getNotificationPreferences(Guardian $guardian): array
    {
        return [
            'sms_enabled' => $this->canReceiveSMS($guardian),
            'email_enabled' => $this->canReceiveEmail($guardian),
            'preferred_contact_method' => $guardian->preferred_contact_method ?? 'email',
            'notification_types' => [
                'attendance' => $guardian->notify_attendance_changes ?? true,
                'payments' => $guardian->notify_payment_reminders ?? true,
                'events' => $guardian->notify_event_updates ?? true,
                'general' => $guardian->notify_general_announcements ?? true,
            ],
        ];
    }

    /**
     * Update notification preferences for a guardian
     */
    public function updateNotificationPreferences(Guardian $guardian, array $preferences): Guardian
    {
        $updateData = [];

        if (isset($preferences['sms_enabled'])) {
            $updateData['receives_sms_notifications'] = $preferences['sms_enabled'];
        }

        if (isset($preferences['email_enabled'])) {
            $updateData['receives_email_notifications'] = $preferences['email_enabled'];
        }

        if (isset($preferences['preferred_contact_method'])) {
            $updateData['preferred_contact_method'] = $preferences['preferred_contact_method'];
        }

        if (isset($preferences['notification_types'])) {
            $notificationTypes = $preferences['notification_types'];

            if (isset($notificationTypes['attendance'])) {
                $updateData['notify_attendance_changes'] = $notificationTypes['attendance'];
            }

            if (isset($notificationTypes['payments'])) {
                $updateData['notify_payment_reminders'] = $notificationTypes['payments'];
            }

            if (isset($notificationTypes['events'])) {
                $updateData['notify_event_updates'] = $notificationTypes['events'];
            }

            if (isset($notificationTypes['general'])) {
                $updateData['notify_general_announcements'] = $notificationTypes['general'];
            }
        }

        $guardian->update($updateData);

        return $guardian;
    }
}
