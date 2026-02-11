<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    /**
     * Show specified view.
     */
    public function switch(Request $request): RedirectResponse
    {
        session([
            'activeLayout' => $request->activeLayout,
        ]);

        return redirect('/');
    }
}
