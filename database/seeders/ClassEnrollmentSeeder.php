<?php

namespace Database\Seeders;

use App\Models\ClassEnrollment;
use App\Models\Classes;
use App\Models\Children;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassEnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding class enrollment data...');

        // Get all existing classes and children
        $classes = Classes::all();
        $children = Children::all();
        $users = User::all();

        if ($classes->isEmpty() || $children->isEmpty()) {
            $this->command->warn('No classes or children found. Please seed them first.');
            return;
        }

        // Create enrollments ensuring no duplicate class-child combinations
        $enrolledPairs = [];
        $enrollmentCount = 0;
        
        foreach ($children as $child) {
            // Each child gets enrolled in 1-2 random classes
            $numClasses = rand(1, min(2, $classes->count()));
            $selectedClasses = $classes->random($numClasses);
            
            foreach ($selectedClasses as $class) {
                // Create a unique identifier for this child-class pair
                $pairKey = $child->id . '_' . $class->id;
                
                // Only create enrollment if this pair hasn't been enrolled yet
                if (!in_array($pairKey, $enrolledPairs)) {
                    // Determine enrollment status
                    $statusOptions = ['active', 'inactive', 'completed', 'transferred'];
                    $status = $statusOptions[array_rand($statusOptions)];
                    
                    // Calculate enrollment date (could be in the past)
                    $enrollmentDate = $child->enrollment_date ?? Carbon::now()->subDays(rand(0, 365));
                    
                    // Set withdrawal date if status is inactive/completed/transferred
                    $withdrawalDate = null;
                    if (in_array($status, ['inactive', 'completed', 'transferred'])) {
                        $withdrawalDate = $enrollmentDate->copy()->addDays(rand(30, 365));
                    }
                    
                    // Define reasons for enrollment status changes
                    $reasons = [
                        'active' => 'التسجيل النشط في الفصل',
                        'inactive' => 'إيقاف مؤقت للدراسة',
                        'completed' => 'إتمام متطلبات الفصل',
                        'transferred' => 'نقل إلى فصل آخر'
                    ];

                    try {
                        ClassEnrollment::create([
                            'class_id' => $class->id,
                            'child_id' => $child->id,
                            'enrollment_date' => $enrollmentDate,
                            'withdrawal_date' => $withdrawalDate,
                            'status' => $status,
                            'reason' => $reasons[$status],
                            'created_by' => $users->random()->id ?? null,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                        
                        // Mark this pair as enrolled
                        $enrolledPairs[] = $pairKey;
                        $enrollmentCount++;
                        
                    } catch (\Exception $e) {
                        // Skip if there's a duplicate entry
                        $this->command->warn("Skipping duplicate enrollment for child {$child->id} in class {$class->id}: " . $e->getMessage());
                    }
                }
            }
        }

        $this->command->info("Created {$enrollmentCount} class enrollment records.");
    }
}