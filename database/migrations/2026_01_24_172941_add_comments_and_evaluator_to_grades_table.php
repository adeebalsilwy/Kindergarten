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
        Schema::table('grades', function (Blueprint $table) {
            $table->text('comments')->nullable();
            $table->foreignId('evaluator_id')->nullable()->constrained('teachers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            // Drop foreign key constraint first, then the column
            $table->dropForeign(['evaluator_id']);
            $table->dropColumn(['comments', 'evaluator_id']);
        });
    }
};
