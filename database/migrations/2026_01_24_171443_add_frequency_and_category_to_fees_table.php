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
        Schema::table('fees', function (Blueprint $table) {
            $table->string('frequency')->nullable(); // e.g., 'once', 'monthly', 'yearly'
            $table->string('category')->nullable(); // e.g., 'registration', 'tuition', 'materials'
            $table->date('due_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fees', function (Blueprint $table) {
            $table->dropColumn(['frequency', 'category', 'due_date']);
        });
    }
};
