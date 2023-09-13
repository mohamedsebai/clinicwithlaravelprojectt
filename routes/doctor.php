<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocProfile\DocProfileController;


use App\Http\Controllers\DocProfile\Auth\AuthenticatedSessionController;




Route::middleware('guest:IsDoctorMiddleware')->group(function () {
    Route::get('doctorProfile/login', [AuthenticatedSessionController::class, 'create'])
    ->name('doctor.login');

    Route::post('doctorProfile/login', [AuthenticatedSessionController::class, 'store'])->name('doctor.login.store');
});



Route::middleware('IsDoctorMiddleware')->group(function () {

    Route::get('doctorProfile/booking', [DocProfileController::class , 'index'])
    ->name('front.doctorProfile.index');

    Route::post('doctorProfile/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('doctor.logout');
});



