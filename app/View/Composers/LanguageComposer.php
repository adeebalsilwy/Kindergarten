<?php

namespace App\View\Composers;

use App\Models\Language;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class LanguageComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Cache active languages for 60 minutes to reduce DB queries
        $activeLangs = Cache::remember('active_languages', 60, function () {
            return Language::where('is_active', true)->get();
        });

        $view->with('activeLangs', $activeLangs);
    }
}
