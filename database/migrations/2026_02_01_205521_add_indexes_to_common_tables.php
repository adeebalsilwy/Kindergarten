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
        // Add indexes to Attendance table if they don't exist
        if (! Schema::hasIndex('attendances', 'idx_attendance_child_date')) {
            Schema::table('attendances', function (Blueprint $table) {
                $table->index(['child_id', 'date'], 'idx_attendance_child_date');
            });
        }
        if (! Schema::hasIndex('attendances', 'idx_attendance_date')) {
            Schema::table('attendances', function (Blueprint $table) {
                $table->index('date', 'idx_attendance_date');
            });
        }
        if (! Schema::hasIndex('attendances', 'idx_attendance_status')) {
            Schema::table('attendances', function (Blueprint $table) {
                $table->index('status', 'idx_attendance_status');
            });
        }

        // Add indexes to Children table if they don't exist
        if (! Schema::hasIndex('children', 'idx_children_parent')) {
            Schema::table('children', function (Blueprint $table) {
                $table->index('parent_id', 'idx_children_parent');
            });
        }
        if (! Schema::hasIndex('children', 'idx_children_class')) {
            Schema::table('children', function (Blueprint $table) {
                $table->index('class_id', 'idx_children_class');
            });
        }
        if (! Schema::hasIndex('children', 'idx_children_name')) {
            Schema::table('children', function (Blueprint $table) {
                $table->index('name', 'idx_children_name');
            });
        }

        // Add indexes to Classes table if they don't exist
        if (! Schema::hasIndex('classes', 'idx_classes_teacher')) {
            Schema::table('classes', function (Blueprint $table) {
                $table->index('teacher_id', 'idx_classes_teacher');
            });
        }
        if (! Schema::hasIndex('classes', 'idx_classes_name')) {
            Schema::table('classes', function (Blueprint $table) {
                $table->index('name', 'idx_classes_name');
            });
        }
        if (! Schema::hasIndex('classes', 'idx_classes_code')) {
            Schema::table('classes', function (Blueprint $table) {
                $table->index('code', 'idx_classes_code');
            });
        }

        // Add indexes to Teachers table if they don't exist
        if (! Schema::hasIndex('teachers', 'idx_teachers_name')) {
            Schema::table('teachers', function (Blueprint $table) {
                $table->index('name', 'idx_teachers_name');
            });
        }
        if (! Schema::hasIndex('teachers', 'idx_teachers_email')) {
            Schema::table('teachers', function (Blueprint $table) {
                $table->index('email', 'idx_teachers_email');
            });
        }

        // Add indexes to Guardians table if they don't exist
        if (Schema::hasTable('guardians')) {
            if (! Schema::hasIndex('guardians', 'idx_guardians_name')) {
                Schema::table('guardians', function (Blueprint $table) {
                    $table->index('name', 'idx_guardians_name');
                });
            }
            if (! Schema::hasIndex('guardians', 'idx_guardians_email')) {
                Schema::table('guardians', function (Blueprint $table) {
                    $table->index('email', 'idx_guardians_email');
                });
            }
        }

        // Add indexes to Parents table if they don't exist
        if (Schema::hasTable('parents')) {
            if (! Schema::hasIndex('parents', 'idx_parents_name')) {
                Schema::table('parents', function (Blueprint $table) {
                    $table->index('name', 'idx_parents_name');
                });
            }
            // Parents table might not have email, check first
            if (Schema::hasColumn('parents', 'email') && ! Schema::hasIndex('parents', 'idx_parents_email')) {
                Schema::table('parents', function (Blueprint $table) {
                    $table->index('email', 'idx_parents_email');
                });
            }
        }

        // Add indexes to Grades table if they don't exist
        if (! Schema::hasIndex('grades', 'idx_grades_child')) {
            Schema::table('grades', function (Blueprint $table) {
                $table->index('child_id', 'idx_grades_child');
            });
        }
        if (! Schema::hasIndex('grades', 'idx_grades_child_subject')) {
            Schema::table('grades', function (Blueprint $table) {
                $table->index(['child_id', 'subject'], 'idx_grades_child_subject');
            });
        }

        // Add indexes to Payments table if they don't exist
        if (! Schema::hasIndex('payments', 'idx_payments_child')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->index('child_id', 'idx_payments_child');
            });
        }
        if (! Schema::hasIndex('payments', 'idx_payments_fee')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->index('fee_id', 'idx_payments_fee');
            });
        }
        if (! Schema::hasIndex('payments', 'idx_payments_date')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->index('payment_date', 'idx_payments_date');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove indexes from Attendance table
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropIndex('idx_attendance_child_date');
            $table->dropIndex('idx_attendance_date');
            $table->dropIndex('idx_attendance_status');
        });

        // Remove indexes from Children table
        Schema::table('children', function (Blueprint $table) {
            $table->dropIndex('idx_children_parent');
            $table->dropIndex('idx_children_class');
            $table->dropIndex('idx_children_name');
        });

        // Remove indexes from Classes table
        Schema::table('classes', function (Blueprint $table) {
            $table->dropIndex('idx_classes_teacher');
            $table->dropIndex('idx_classes_name');
            $table->dropIndex('idx_classes_code');
        });

        // Remove indexes from Teachers table
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropIndex('idx_teachers_name');
            $table->dropIndex('idx_teachers_email');
        });

        // Remove indexes from Guardians table
        Schema::table('guardians', function (Blueprint $table) {
            $table->dropIndex('idx_guardians_name');
            $table->dropIndex('idx_guardians_email');
        });

        // Remove indexes from Grades table
        Schema::table('grades', function (Blueprint $table) {
            $table->dropIndex('idx_grades_child');
            $table->dropIndex('idx_grades_child_subject');
        });

        // Remove indexes from Payments table
        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex('idx_payments_child');
            $table->dropIndex('idx_payments_fee');
            $table->dropIndex('idx_payments_date');
        });
    }
};
