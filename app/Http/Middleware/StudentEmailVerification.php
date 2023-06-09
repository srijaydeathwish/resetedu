<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class StudentEmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user('student') || ! $request->user('student')->hasVerifiedEmail()) {
            return $request->expectsJson()
                        ? abort(403, 'Your email address is not verified.')
                        : Redirect::route('student.verification.notice');
        }

        return $next($request);
    }

}
