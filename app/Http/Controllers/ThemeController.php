<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Show specified view.
     */
    public function switch(Request $request): RedirectResponse
    {
        session([
            'activeTheme' => $request->activeTheme,
        ]);

        return redirect('/');
    }
}
