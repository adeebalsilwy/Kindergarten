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
        Schema::table('financial_reports', function (Blueprint $table) {
            $table->string('name');
            $table->string('report_type')->default('general');
            $table->foreignId('generated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->date('period_start');
            $table->date('period_end');
            $table->json('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financial_reports', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'report_type',
                'generated_by',
                'period_start',
                'period_end',
                'data',
            ]);
        });
    }
};