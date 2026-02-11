<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add indexes to pivot tables
        if (! Schema::hasIndex('activity_child', 'idx_activity_child_activity')) {
            Schema::table('activity_child', function (Blueprint $table) {
                $table->index('activity_id', 'idx_activity_child_activity');
            });
        }

        if (! Schema::hasIndex('activity_child', 'idx_activity_child_child')) {
            Schema::table('activity_child', function (Blueprint $table) {
                $table->index('child_id', 'idx_activity_child_child');
            });
        }

        if (! Schema::hasIndex('event_child', 'idx_event_child_event')) {
            Schema::table('event_child', function (Blueprint $table) {
                $table->index('event_id', 'idx_event_child_event');
            });
        }

        if (! Schema::hasIndex('event_child', 'idx_event_child_child')) {
            Schema::table('event_child', function (Blueprint $table) {
                $table->index('child_id', 'idx_event_child_child');
            });
        }

        // Add indexes to Activities table
        if (! Schema::hasIndex('activities', 'idx_activities_class')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->index('class_id', 'idx_activities_class');
            });
        }

        if (! Schema::hasIndex('activities', 'idx_activities_teacher')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->index('teacher_id', 'idx_activities_teacher');
            });
        }

        if (! Schema::hasIndex('activities', 'idx_activities_scheduled_date')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->index('scheduled_date', 'idx_activities_scheduled_date');
            });
        }

        // Add indexes to Events table
        if (! Schema::hasIndex('events', 'idx_events_class')) {
            Schema::table('events', function (Blueprint $table) {
                $table->index('class_id', 'idx_events_class');
            });
        }

        if (! Schema::hasIndex('events', 'idx_events_start_datetime')) {
            Schema::table('events', function (Blueprint $table) {
                $table->index('start_datetime', 'idx_events_start_datetime');
            });
        }

        // Add indexes to Curricula table
        if (! Schema::hasIndex('curricula', 'idx_curricula_created_by')) {
            Schema::table('curricula', function (Blueprint $table) {
                $table->index('created_by', 'idx_curricula_created_by');
            });
        }

        // Add indexes to Expenses table
        if (! Schema::hasIndex('expenses', 'idx_expenses_expense_date')) {
            Schema::table('expenses', function (Blueprint $table) {
                $table->index('expense_date', 'idx_expenses_expense_date');
            });
        }

        if (! Schema::hasIndex('expenses', 'idx_expenses_category')) {
            Schema::table('expenses', function (Blueprint $table) {
                $table->index('category', 'idx_expenses_category');
            });
        }

        // Add indexes to Fees table
        if (! Schema::hasIndex('fees', 'idx_fees_type')) {
            Schema::table('fees', function (Blueprint $table) {
                $table->index('category', 'idx_fees_type');
            });
        }

        // Add composite indexes for common query patterns
        if (! Schema::hasIndex('children', 'idx_children_status_class')) {
            Schema::table('children', function (Blueprint $table) {
                $table->index(['enrollment_status', 'class_id'], 'idx_children_status_class');
            });
        }

        if (! Schema::hasIndex('attendances', 'idx_attendance_date_status')) {
            Schema::table('attendances', function (Blueprint $table) {
                $table->index(['date', 'status'], 'idx_attendance_date_status');
            });
        }

        if (! Schema::hasIndex('payments', 'idx_payments_date_amount')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->index(['payment_date', 'amount'], 'idx_payments_date_amount');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove indexes from pivot tables
        Schema::table('activity_child', function (Blueprint $table) {
            $table->dropIndex('idx_activity_child_activity');
            $table->dropIndex('idx_activity_child_child');
        });

        Schema::table('event_child', function (Blueprint $table) {
            $table->dropIndex('idx_event_child_event');
            $table->dropIndex('idx_event_child_child');
        });

        // Remove indexes from Activities table
        Schema::table('activities', function (Blueprint $table) {
            $table->dropIndex('idx_activities_class');
            $table->dropIndex('idx_activities_teacher');
            $table->dropIndex('idx_activities_scheduled_date');
        });

        // Remove indexes from Events table
        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex('idx_events_class');
            $table->dropIndex('idx_events_start_datetime');
        });

        // Remove indexes from Curricula table
        Schema::table('curricula', function (Blueprint $table) {
            $table->dropIndex('idx_curricula_created_by');
        });

        // Remove indexes from Expenses table
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropIndex('idx_expenses_expense_date');
            $table->dropIndex('idx_expenses_category');
        });

        // Remove indexes from Fees table
        Schema::table('fees', function (Blueprint $table) {
            $table->dropIndex('idx_fees_type');
        });

        // Remove composite indexes
        Schema::table('children', function (Blueprint $table) {
            $table->dropIndex('idx_children_status_class');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->dropIndex('idx_attendance_date_status');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex('idx_payments_date_amount');
        });
    }
};
