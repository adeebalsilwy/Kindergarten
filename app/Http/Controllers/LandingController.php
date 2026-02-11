<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // Get statistics for landing page
        $statistics = [
            'total_users' => User::count(),
            'active_users' => User::where('is_active', true)->count(),
            'recent_registrations' => User::where('created_at', '>=', now()->subDays(30))->count(),
        ];

        // Check if user is authenticated
        $isLoggedIn = Auth::check();
        $user = Auth::user();

        return view('pages.landing', compact('statistics', 'isLoggedIn', 'user'))
            ->with('activeTheme', 'rubick')
            ->with('activeLayout', 'landing');
    }
}
