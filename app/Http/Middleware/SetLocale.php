<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get locale from session, cookie, or default
        $locale = session('locale',
            cookie('locale') ??
            config('app.locale'));

        // Validate locale
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

        // Set the application locale
        app()->setLocale($locale);

        return $next($request);
    }
}
