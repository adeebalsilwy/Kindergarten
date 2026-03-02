<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RolePermissionSeeder::class,
            DashboardContentSeeder::class,
            YemeniNurserySeeder::class,  // Added comprehensive Yemeni nursery seeder
            MaterialsSeeder::class,  // Added materials seeder
            ClassEnrollmentSeeder::class,  // Added class enrollment seeder
            ComprehensiveDataSeeder::class,
            UpdateGradeColumnSeeder::class,
        ]);
    }
}