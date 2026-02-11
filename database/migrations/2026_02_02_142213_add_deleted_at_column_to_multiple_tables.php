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
        // Add deleted_at column to tables that need SoftDeletes
        $tables = [
            'users',
            'parents',
            'expenses',
            'financial_reports',
            'accounting_entries',
            'languages',
            'reports',
            'dashboard_contents',
            'grades',
            'classes',
            'teachers',
            'fees',
            'payments',
            'attendance',
            'activities',
            'events',
            'curricula',
            'guardians',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && ! Schema::hasColumn($table, 'deleted_at')) {
                Schema::table($table, function (Blueprint $table) {
                    $table->softDeletes();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove deleted_at column from tables
        $tables = [
            'users',
            'parents',
            'expenses',
            'financial_reports',
            'accounting_entries',
            'languages',
            'reports',
            'dashboard_contents',
            'grades',
            'classes',
            'teachers',
            'fees',
            'payments',
            'attendance',
            'activities',
            'events',
            'curricula',
            'guardians',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'deleted_at')) {
                Schema::table($table, function (Blueprint $table) {
                    $table->dropSoftDeletes();
                });
            }
        }
    }
};
