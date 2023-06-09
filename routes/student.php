<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Student\ModeController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\RegistrationController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Auth\StudentAuth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\StudentAuth\PasswordResetLinkController;
use App\Http\Controllers\Auth\StudentAuth\NewPasswordController;
use App\Http\Controllers\Auth\StudentAuth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\StudentAuth\VerifyEmailController;
use App\Http\Controllers\Auth\StudentAuth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\StudentAuth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\StudentAuth\RegisteredUserController;

Route::prefix('student')->group(static function () {

    Route::middleware('guest:student')->group(function () {
        Route::get('/', function () {
            return Inertia::render('Student/Welcome', [
                'canLogin' => Route::has('student.login'),
                'canRegister' => Route::has('student.register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]);
        })->name('homepage');
    });


    // Guest routes
    Route::middleware('guest:student')->group(static function () {
        // Auth routes
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('student.register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('student.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('student.password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('student.password.email');
        // Reset password
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('student.password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('student.password.update');
    });

    // Verify email routes
    Route::middleware(['auth:student'])->group(static function () {
        Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('student.verification.notice');
        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('student.verification.verify');
        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('student.verification.send');
    });

    // Authenticated routes
    Route::middleware(['auth:student', 'verified'])->group(static function () {
        // Confirm password routes
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('student.password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('student.logout');
        // General routes
        Route::get('/dashboard', [HomeController::class, 'index'])->name('student.index');
        //Route::get('profile', [HomeController::class, 'profile'])->middleware('password.confirm.student')->name('student.profile');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('student.profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('student.profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('student.profile.destroy');

        Route::get('/modes', [ModeController::class, 'chooseMode'])
            ->name('student.mode.choose');

        Route::get('/modes/{mode}', [ModeController::class, 'showMode'])
            ->name('student.mode.show');

        Route::get('/modes/{mode}/{university}', [RegistrationController::class, 'showForm'])
            ->name('student.registration.showForm');

        Route::post('/modes/{mode}/{university}/part1', [RegistrationController::class, 'submitPart1'])
            ->name('student.registration.submit1');
        Route::patch('/modes/{mode}/{university}/part2', [RegistrationController::class, 'submitPart2'])
            ->name('student.registration.submit2');
        Route::patch('/modes/{mode}/{university}/part3', [RegistrationController::class, 'submitPart3'])
            ->name('student.registration.submit3');
        Route::patch('/modes/{mode}/{university}/part4', [RegistrationController::class, 'submitPart4'])
            ->name('student.registration.submit4');
        Route::post('/modes/{mode}/{university}/part5/passportphoto', [RegistrationController::class, 'uploadPassportPhoto'])
            ->name('student.registration.pphoto');
        Route::post('/modes/{mode}/{university}/part5/signature', [RegistrationController::class, 'uploadSignature'])
            ->name('student.registration.sphoto');
        Route::post('/modes/{mode}/{university}/part5', [RegistrationController::class, 'submitPart5'])
            ->name('student.registration.submit5');
        Route::patch('/modes/{mode}/{university}/part6', [RegistrationController::class, 'submitPart6'])
            ->name('student.registration.submit6');
    });
});
