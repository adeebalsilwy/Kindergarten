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
        Schema::table('children', function (Blueprint $table) {
            // Emergency contact information
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_relation')->nullable();

            // Medical information
            $table->text('medical_conditions')->nullable();
            $table->text('allergies')->nullable();
            $table->text('medications')->nullable();
            $table->string('blood_type')->nullable();

            // Enrollment information
            $table->date('enrollment_date')->nullable();
            $table->date('expected_graduation_date')->nullable();
            $table->enum('enrollment_status', ['active', 'inactive', 'graduated', 'transferred'])->default('active');

            // Additional personal information
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->text('special_needs')->nullable();

            // Family information
            $table->foreignId('second_parent_id')->nullable()->constrained('guardians')->onDelete('set null');

            // Class assignment (using foreign key instead of string)
            $table->foreignId('class_id')->nullable()->constrained('classes')->onDelete('set null');
            $table->dropColumn('class_grade'); // Remove the old string field

            // Additional timestamps
            $table->timestamp('last_attended_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // For SQLite, we need to recreate the table without the new columns
        // because SQLite has limited ALTER TABLE support
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            $this->downForSqlite();
        } else {
            Schema::table('children', function (Blueprint $table) {
                // For other databases, try to drop foreign keys by name
                try {
                    $table->dropForeign(['children_second_parent_id_foreign']);
                } catch (\Exception $e) {
                    // Foreign key might not exist or have different name
                    try {
                        $table->dropForeign(['children_second_parent_id_foreign']);
                    } catch (\Exception $e2) {
                        // Try alternative name
                    }
                }
                try {
                    $table->dropForeign(['children_class_id_foreign']);
                } catch (\Exception $e) {
                    // Foreign key might not exist or have different name
                }

                $table->dropColumn([
                    'emergency_contact_name',
                    'emergency_contact_phone',
                    'emergency_contact_relation',
                    'medical_conditions',
                    'allergies',
                    'medications',
                    'blood_type',
                    'enrollment_date',
                    'expected_graduation_date',
                    'enrollment_status',
                    'nationality',
                    'religion',
                    'special_needs',
                    'second_parent_id',
                    'class_id',
                    'last_attended_at',
                ]);
                $table->string('class_grade')->nullable(); // Restore the old field
            });
        }
    }

    private function downForSqlite(): void
    {
        // Store the current data
        $data = \DB::select('SELECT id, name, dob, gender, class_grade, parent_id, photo_path, fees_required, fees_paid, created_at, updated_at FROM children');

        // Drop the table and recreate it with the original structure
        Schema::dropIfExists('children');

        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('class_grade')->nullable();

            // Foreign key to parents table
            $table->foreignId('parent_id')->nullable()->constrained('parents')->onDelete('set null');

            $table->string('photo_path')->nullable();

            // Financials
            $table->decimal('fees_required', 10, 2)->default(0);
            $table->decimal('fees_paid', 10, 2)->default(0);

            $table->timestamps();
        });

        // Insert the data back
        foreach ($data as $row) {
            \DB::insert('INSERT INTO children (id, name, dob, gender, class_grade, parent_id, photo_path, fees_required, fees_paid, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                $row->id,
                $row->name,
                $row->dob,
                $row->gender,
                $row->class_grade,
                $row->parent_id,
                $row->photo_path,
                $row->fees_required,
                $row->fees_paid,
                $row->created_at,
                $row->updated_at,
            ]);
        }
    }
};
