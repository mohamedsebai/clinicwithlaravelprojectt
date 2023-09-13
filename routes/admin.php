<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\admin\RateController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['as'=>'admin.'], function(){

    Route::middleware('guest:isAdmin')->group(function () {

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);


    });

    Route::middleware('isAdmin')->group(function () {

        Route::get('/', HomeController::class)->name('panel.home');


        Route::resource('/doctors', DoctorController::class)->except('show');
        Route::get('doctor/change-password/{doctor}', [DoctorController::class, 'changePassword'])->name('doctor.change-password');
        Route::post('doctor/change-password/{doctor}', [DoctorController::class, 'updatePassword'])->name('doctor.update-password');

        Route::resource('/bookings', BookingController::class)->except(['indes', 'show']); // there is no show page and we need custom index route
        Route::get('bookings/all/{doctor_id?}', [BookingController::class, 'index'])->name('bookings.index');

        Route::get('bookings/updateStatus/{booking}/{status}', [BookingController::class, 'updateStatus'])->name('bookings.update.status');


        Route::get('/rates', RateController::class)->name('rates');


        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');


        Route::resource('/admins', AdminController::class)->except(['show', 'edit', 'update']);

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    });

});




Route::middleware('isAdmin')->group(function () {

    Route::resource('/majors', MajorController::class)->except('show');
    Route::resource('/cities', CityController::class)->except('show');


    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/messages/destroy/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
});
