<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Auth\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AdminAuth\NewPasswordController;
use App\Http\Controllers\Auth\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\AdminAuth\VerifyEmailController;
use App\Http\Controllers\Auth\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseSessionController;
use App\Http\Controllers\Admin\StudentController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(static function () {

    Route::middleware('guest:admin')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Welcome', [
            'canLogin' => Route::has('admin.login'),
            'canRegister' => Route::has('admin.register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    })->name('homepage');
    });

    // Guest routes
    Route::middleware('guest:admin')->group(static function () {
        // Auth routes
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');
        // Reset password
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    // Verify email routes
    Route::middleware(['auth:admin'])->group(static function () {
        Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
    });

    // Authenticated routes
    Route::middleware(['auth:admin', 'verified'])->group(static function () {
        // Confirm password routes
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        // General routes
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.index');
        Route::get('profile', [HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');

        Route::get('courses', [CourseController::class, 'index'])->name('admin.courses');
        Route::post('courses', [CourseController::class, 'store']);
        Route::patch('courses/{course}', [CourseController::class, 'update'])->name('admin.courses.edit');

        Route::get('students', [StudentController::class, 'index'])->name('admin.students');

        Route::get('session', [CourseSessionController::class, 'index'])->name('admin.session');
        Route::post('session', [CourseSessionController::class, 'store']);
        Route::patch('session/{courseSession}', [CourseSessionController::class, 'update'])->name('admin.session.edit');
    });
});
