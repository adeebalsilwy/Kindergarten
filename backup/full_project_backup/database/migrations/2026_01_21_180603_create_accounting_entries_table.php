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
        Schema::create('accounting_entries', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable(); // Description of the transaction
            $table->decimal('debit', 15, 2)->default(0); // Debit amount
            $table->decimal('credit', 15, 2)->default(0); // Credit amount
            $table->date('entry_date'); // Date of the entry
            $table->string('reference')->nullable(); // Reference number
            $table->enum('account_type', [
                'revenue',      // Revenue accounts
                'expense',      // Expense accounts
                'asset',        // Asset accounts
                'liability',    // Liability accounts
                'equity',       // Equity accounts
                'salary',        // Salary payments
            ])->default('expense'); // Default to expense
            $table->timestamps(); // created_at and updated_at

            // Indexes for performance
            $table->index('entry_date');
            $table->index('reference');
            $table->index('account_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounting_entries');
    }
};
