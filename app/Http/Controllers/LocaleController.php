<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    /**
     * Switch the application locale
     */
    public function switch(string $locale): RedirectResponse
    {
        // Validate the locale
        try {
            $supportedLocales = \App\Models\Language::where('is_active', true)->pluck('code')->toArray();
        } catch (\Exception $e) {
            $supportedLocales = ['en', 'ar'];
        }

        if (empty($supportedLocales)) {
            $supportedLocales = ['en', 'ar'];
        }

        if (! in_array($locale, $supportedLocales)) {
            $locale = config('app.locale');
        }

        // Store the locale in session
        session(['locale' => $locale]);

        // Also store in cookie for persistence
        cookie()->queue(cookie('locale', $locale, 60 * 24 * 365)); // 1 year

        // Update app locale
        app()->setLocale($locale);

        // Redirect back to the previous page or dashboard
        return redirect()->back()->with('success', __('global.language_switched_successfully'))->cookie(cookie('locale', $locale, 60 * 24 * 365));
    }
}
