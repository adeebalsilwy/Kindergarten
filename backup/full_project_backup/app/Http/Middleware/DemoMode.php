<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class DemoMode
{
    public function handle(Request $request, Closure $next)
    {
        $demoEnabled = (bool) (config('app.demo') ?? env('APP_DEMO', true));

        if ($demoEnabled) {
            $candidates = [
                ['role' => 'Administrator', 'email' => 'admin@kindercare.com', 'password' => 'password'],
                ['role' => 'Principal', 'email' => 'principal@kindercare.com', 'password' => 'password'],
                ['role' => 'Accountant', 'email' => 'accountant@kindercare.com', 'password' => 'password'],
                ['role' => 'Administrator', 'email' => 'admin@kindergarten.ye', 'password' => 'admin123'],
                ['role' => 'Principal', 'email' => 'principal@kindergarten.ye', 'password' => 'principal123'],
                ['role' => 'Accountant', 'email' => 'accountant@kindergarten.ye', 'password' => 'accountant123'],
                ['role' => 'Staff', 'email' => 'staff@kindergarten.ye', 'password' => 'staff123'],
                ['role' => 'Staff', 'email' => 'staff@kindercare.com', 'password' => 'password'],
                ['role' => 'Parent', 'email' => 'parent@kindercare.com', 'password' => 'password'],
            ];
            $demoAccounts = collect($candidates)
                ->filter(fn ($a) => User::where('email', $a['email'])->exists())
                ->values()
                ->all();
            $request->attributes->set('demoMode', true);
            $request->attributes->set('demoAccounts', $demoAccounts);
            view()->share('demoMode', true);
            view()->share('demoAccounts', $demoAccounts);
        }

        return $next($request);
    }
}
