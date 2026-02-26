<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateGradeColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all grades with scores but no grade
        $grades = DB::table('grades')->get();
        
        foreach ($grades as $grade) {
            $score = (float)$grade->score;
            
            // Calculate grade based on score
            if ($score >= 90) {
                $calculatedGrade = 'A';
            } elseif ($score >= 80) {
                $calculatedGrade = 'B';
            } elseif ($score >= 70) {
                $calculatedGrade = 'C';
            } elseif ($score >= 60) {
                $calculatedGrade = 'D';
            } else {
                $calculatedGrade = 'F';
            }
            
            // Update the grade in the database
            DB::table('grades')
                ->where('id', $grade->id)
                ->update(['grade' => $calculatedGrade]);
        }
        
        echo "Updated " . count($grades) . " grade records.\n";
    }
}