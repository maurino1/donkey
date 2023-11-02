<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BreaksController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/active-bookings', [BookingsController::class, 'showActiveBookings'])->name('bookings.active');
    Route::resource('/breaks', BreaksController::class);
    Route::get('/break', [BreaksController::class, 'create'])->name('break.create');
    Route::get('/break', [BreaksController::class, 'destroy'])->name('break.destroy');
    Route::delete('/active-bookings', [ProfileController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/booking', [BookingController::class, 'indexyes'])->name('booking.indexyes');
    Route::get('/booking/created', [BookingController::class, 'created'])->name('booking.created');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{booking}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::get('/booking/{booking}/update', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('/booking/{booking}/destroy', [BookingController::class, 'destroy'])->name('booking.destroy');
});


require __DIR__.'/auth.php';

