<?php

namespace App\Http\Controllers\Auth\StudentAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/StudentAuth/Login', [
            'canResetPassword' => Route::has('student.password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //dd($request);
        $request->authenticate();

        $request->session()->regenerate();

        //return redirect()->intended(RouteServiceProvider::HOME);
        return redirect()->intended(route('student.index'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }
}
