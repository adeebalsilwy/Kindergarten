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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->unsignedBigInteger('fee_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->enum('payment_method', ['cash', 'bank_transfer', 'credit_card', 'check', 'online']);
            $table->string('reference_number')->nullable();
            $table->enum('status', ['completed', 'pending', 'failed', 'refunded'])->default('completed');
            $table->string('receipt_number')->nullable();
            $table->timestamps();
            $table->index('child_id');
            $table->index('fee_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
