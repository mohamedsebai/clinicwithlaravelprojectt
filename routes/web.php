<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorContorller;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RateController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class , 'index'])->name('home.index');

Route::get('/majors', [MajorContorller::class , 'index'])->name('front.majors.index');


Route::get('/doctors/{major_id?}', [DoctorController::class , 'index'])->name('front.doctors.index');
Route::get('/doctors/{city_id?}', [DoctorController::class , 'filterByCity'])->name('front.doctors.filterByCity');
Route::get('/doctor/{doctor_id}', [DoctorController::class , 'show'])->name('front.doctors.show');

Route::post('/doctor/{doctor_id}', [BookingController::class , 'store'])->name('front.booking.store');


Route::post('/doctor/rating/{id}', RateController::class)->name('doctor.rating');

Route::get('/contact', [MessageController::class , 'index'])->name('contact.index');
Route::post('/contact', [MessageController::class , 'store'])->name('contact.store');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
require __DIR__.'/doctor.php';
