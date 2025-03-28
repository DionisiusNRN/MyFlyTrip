<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingHistoryController;
use App\Http\Controllers\BookingNowController;
use App\Http\Controllers\BookingController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/saved', [PageController::class, 'saved'])->name('saved.index');
Route::get('/account', [PageController::class, 'account'])->name('my-account.index');

Route::view('/login', 'login');
Route::view('/register', 'register');
Route::view('/payment', 'payment');
Route::view('/flight-detail', 'flight-detail');
Route::view('/edit-profile', 'edit-profile');

Route::get('/flight/{id}', [FlightController::class, 'show'])->name('flight.show');

// Halaman Booking dengan Tab (Now & History)
Route::get('/booking', [BookingController::class, 'now'])->name('booking-now.index');
Route::get('/booking/history', [BookingController::class, 'history'])->name('booking-history.index');

// Proses Booking
Route::get('/booking/{id}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::post('/search-flights', [PageController::class, 'searchFlights'])->name('search.flights');


