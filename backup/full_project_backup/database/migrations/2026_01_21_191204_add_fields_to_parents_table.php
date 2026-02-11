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
        Schema::table('parents', function (Blueprint $table) {
            // Extended contact information
            $table->string('email')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('occupation')->nullable();
            $table->string('workplace')->nullable();

            // Emergency contact preference
            $table->boolean('is_primary_emergency_contact')->default(true);

            // Financial information
            $table->string('bank_account_number')->nullable();
            $table->string('bank_name')->nullable();

            // Communication preferences
            $table->enum('preferred_language', ['english', 'arabic'])->default('english');
            $table->boolean('receives_sms_notifications')->default(true);
            $table->boolean('receives_email_notifications')->default(true);

            // Additional personal information
            $table->date('date_of_birth')->nullable();
            $table->string('national_id')->nullable();
            $table->string('passport_number')->nullable();

            // Status and timestamps
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            $this->downForSqlite();
        } else {
            Schema::table('parents', function (Blueprint $table) {
                $table->dropColumn([
                    'email',
                    'secondary_phone',
                    'occupation',
                    'workplace',
                    'is_primary_emergency_contact',
                    'bank_account_number',
                    'bank_name',
                    'preferred_language',
                    'receives_sms_notifications',
                    'receives_email_notifications',
                    'date_of_birth',
                    'national_id',
                    'passport_number',
                    'is_active',
                    'last_login_at',
                ]);
            });
        }
    }

    private function downForSqlite(): void
    {
        // Store the current data
        $data = \DB::select('SELECT id, name, phone, address, relation, created_at, updated_at FROM parents');

        // Drop the table and recreate it with the original structure
        Schema::dropIfExists('parents');

        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('relation')->nullable(); // Father, Mother, Guardian
            $table->timestamps();
        });

        // Insert the data back
        foreach ($data as $row) {
            \DB::insert('INSERT INTO parents (id, name, phone, address, relation, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)', [
                $row->id,
                $row->name,
                $row->phone,
                $row->address,
                $row->relation,
                $row->created_at,
                $row->updated_at,
            ]);
        }
    }
};
