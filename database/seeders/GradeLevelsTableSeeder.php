<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeLevel;

class GradeLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradeLevels = [
            [
                'name' => 'Toddler',
                'code' => 'TDL',
                'description' => 'Toddler age group (1-2 years)',
                'min_age' => 1,
                'max_age' => 2,
                'order' => 1,
            ],
            [
                'name' => 'Preschool',
                'code' => 'PRS',
                'description' => 'Preschool age group (3-4 years)',
                'min_age' => 3,
                'max_age' => 4,
                'order' => 2,
            ],
            [
                'name' => 'Pre-K',
                'code' => 'PRK',
                'description' => 'Pre-kindergarten age group (4-5 years)',
                'min_age' => 4,
                'max_age' => 5,
                'order' => 3,
            ],
            [
                'name' => 'Kindergarten',
                'code' => 'KG',
                'description' => 'Kindergarten age group (5-6 years)',
                'min_age' => 5,
                'max_age' => 6,
                'order' => 4,
            ],
            [
                'name' => 'Grade 1',
                'code' => 'G1',
                'description' => 'First grade age group (6-7 years)',
                'min_age' => 6,
                'max_age' => 7,
                'order' => 5,
            ],
            [
                'name' => 'Grade 2',
                'code' => 'G2',
                'description' => 'Second grade age group (7-8 years)',
                'min_age' => 7,
                'max_age' => 8,
                'order' => 6,
            ],
            [
                'name' => 'Grade 3',
                'code' => 'G3',
                'description' => 'Third grade age group (8-9 years)',
                'min_age' => 8,
                'max_age' => 9,
                'order' => 7,
            ],
        ];

        foreach ($gradeLevels as $gradeLevel) {
            GradeLevel::create($gradeLevel);
        }
    }
}