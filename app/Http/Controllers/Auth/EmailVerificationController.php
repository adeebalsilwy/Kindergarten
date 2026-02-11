<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmailVerificationController extends Controller
{
    public function notice(Request $request): View
    {
        return view('pages.auth.verify-email');
    }

    public function verify(Request $request, $id, $hash): RedirectResponse
    {
        if (! hash_equals((string) $hash, sha1($request->user()->getEmailForVerification()))) {
            return redirect()->route('verification.notice')->with('error', __('auth.invalid_verification_link'));
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard-overview-1'))->with('success', __('auth.email_already_verified'));
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard-overview-1'))->with('success', __('auth.email_verified_success'));
    }

    public function send(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard-overview-1'));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', __('auth.verification_link_sent'));
    }
}
