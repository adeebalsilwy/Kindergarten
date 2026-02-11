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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->date('expense_date');
            $table->string('vendor')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('reference_number')->nullable();
            $table->enum('status', ['pending', 'approved', 'paid', 'rejected'])->default('pending');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
            $table->index('status');
            $table->index('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
