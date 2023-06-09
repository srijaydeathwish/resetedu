<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('admin.login'); // Replace 'admin.login' with the actual route for admin login
            } elseif ($request->is('student/*')) {
                return route('student.login'); // Replace 'student.login' with the actual route for student login
            }
        }
    }
}
