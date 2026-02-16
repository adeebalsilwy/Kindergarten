<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $this->authorize('view_settings');

        $settings = Setting::all()->groupBy('group');

        // Ensure default groups exist if empty
        if ($settings->isEmpty()) {
            $this->seedDefaults();
            $settings = Setting::all()->groupBy('group');
        }

        return view('pages.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->authorize('edit_settings');

        $validated = $request->validate([
            'school_name' => 'nullable|string|max:255',
            'school_email' => 'nullable|email|max:255',
            'school_phone' => 'nullable|string|max:20',
            'school_address' => 'nullable|string|max:500',
            'academic_year' => 'nullable|string|max:20',
            'semester' => 'nullable|string|max:20',
            'currency' => 'nullable|string|max:10',
            'tax_rate' => 'nullable|numeric|min:0',
        ]);

        foreach ($validated as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                $setting->update(['value' => $value]);
            }
        }

        return redirect()->route('settings.index')->with('success', __('global.settings_updated_successfully'));
    }

    protected function seedDefaults()
    {
        $defaults = [
            ['key' => 'school_name', 'value' => 'Kindergarten Management System', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_email', 'value' => 'info@kindergarten.com', 'group' => 'general', 'type' => 'email'],
            ['key' => 'school_phone', 'value' => '+123456789', 'group' => 'general', 'type' => 'text'],
            ['key' => 'school_address', 'value' => 'Main Street, City', 'group' => 'general', 'type' => 'text'],

            ['key' => 'academic_year', 'value' => '2023-2024', 'group' => 'academic', 'type' => 'text'],
            ['key' => 'semester', 'value' => 'First Semester', 'group' => 'academic', 'type' => 'text'],

            ['key' => 'currency', 'value' => 'USD', 'group' => 'finance', 'type' => 'text'],
            ['key' => 'tax_rate', 'value' => '0', 'group' => 'finance', 'type' => 'number'],
        ];

        foreach ($defaults as $default) {
            Setting::create($default);
        }
    }
}
