<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ModeController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\RegistrationController;


Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::get('/modes', [ModeController::class, 'chooseMode'])
    ->name('mode.choose');

Route::get('/modes/{mode}', [ModeController::class, 'showMode'])
    ->name('mode.show');

Route::get('/modes/{mode}/{university}', [RegistrationController::class, 'showForm'])
    ->name('registration.show');

Route::prefix('/registration')->group(function () {
    Route::post('/modes/{mode}/{university}/part1', [RegistrationController::class, 'submitPart1'])
        ->name('registration.submit1');

    Route::post('/modes/{mode}/{university}/part2', [RegistrationController::class, 'submitPart2'])
        ->name('registration.submit2');

    Route::post('/modes/{mode}/{university}/part3', [RegistrationController::class, 'submitPart3'])
        ->name('registration.submit3');

    Route::post('/modes/{mode}/{university}/part4', [RegistrationController::class, 'submitPart4'])
        ->name('registration.submit4');

    Route::post('/modes/{mode}/{university}/part5', [RegistrationController::class, 'submitPart5'])
        ->name('registration.submit5');

    Route::post('/modes/{mode}/{university}/part6', [RegistrationController::class, 'submitPart6'])
        ->name('registration.submit6');
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
