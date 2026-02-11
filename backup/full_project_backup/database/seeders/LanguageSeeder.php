<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'English',
                'code' => 'en',
                'is_rtl' => false,
                'is_active' => true,
            ],
            [
                'name' => 'العربية',
                'code' => 'ar',
                'is_rtl' => true,
                'is_active' => true,
            ],
        ];

        foreach ($languages as $lang) {
            Language::updateOrCreate(['code' => $lang['code']], $lang);
        }
    }
}
