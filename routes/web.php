<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/saved', [PageController::class, 'saved'])->name('saved.index');
Route::get('/account', [PageController::class, 'account'])->name('my-account.index');

Route::view('/login', 'login');
Route::view('/register', 'register');
Route::view('/edit-profile', 'edit-profile');

Route::get('/flight/{id}', [FlightController::class, 'show'])->name('flight.show');

Route::match(['GET', 'POST'], '/midtrans/callback', [PaymentController::class, 'callback'])->name('midtrans.callback');

Route::get('/payment/{id}', [PaymentController::class, 'pay'])->name('payment.pay');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::post('/payment/cancel/{booking_id}', [PaymentController::class, 'cancel'])->name('payment.cancel');

Route::get('/booking/select/{flight_id}', [BookingController::class, 'selectFlight'])->name('booking.select');

// Halaman Booking dengan Tab (Now & History)
Route::get('/booking', [BookingController::class, 'now'])->name('booking-now.index');
Route::get('/booking/history', [BookingController::class, 'history'])->name('booking-history.index');

// Proses Booking
Route::get('/booking/{id}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

Route::post('/search-flights', [PageController::class, 'searchFlights'])->name('search.flights');


