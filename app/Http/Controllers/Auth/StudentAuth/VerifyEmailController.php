<?php

namespace App\Http\Controllers\Auth\StudentAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        //dd($request->user()->markEmailAsVerified());
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('student.index', ['verified' => true]);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->route('student.index', ['verified' => true]);
    }
}
