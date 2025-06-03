<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\UserCustomerAuthController;
use App\Http\Controllers\ProfileController;

// Boleh diakses publik
Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('/search-flights', [PageController::class, 'searchFlights'])->name('search.flights');

// Auth routes (register & login)
Route::get('/register', [UserCustomerAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserCustomerAuthController::class, 'register'])->name('register.submit');

Route::get('/login', [UserCustomerAuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserCustomerAuthController::class, 'login'])->name('login.submit');

Route::get('/account', [PageController::class, 'account'])->name('my-account.index');
Route::get('/flight/{id}', [FlightController::class, 'show'])->name('flight.show');

// Fitu yang memerlukan syarat login dahulu
Route::middleware(['auth:user_customer'])->group(function () {
    Route::post('/logout', [UserCustomerAuthController::class, 'logout'])->name('logout');

    Route::get('/saved', [FlightController::class, 'saved'])->name('saved.index');
    Route::post('/flights/{id}/unsave', [FlightController::class, 'unsave'])->name('flights.unsave');
    Route::post('/flight/save/{id}', [FlightController::class, 'toggleSave'])->name('flight.toggleSave');

    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');

    // Booking
    Route::get('/booking/select/{flight_id}', [BookingController::class, 'selectFlight'])->name('booking.select');
    Route::get('/booking', [BookingController::class, 'now'])->name('booking-now.index');
    Route::get('/booking/history', [BookingController::class, 'history'])->name('booking-history.index');
    Route::get('/booking/{id}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Payment
    Route::get('/payment/{id}', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::post('/payment/cancel/{booking_id}', [PaymentController::class, 'cancel'])->name('payment.cancel');
    Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
});

// Midtrans callback (boleh di luar middleware karena Midtrans bukan user)
Route::match(['GET', 'POST'], '/midtrans/callback', [PaymentController::class, 'callback'])->name('midtrans.callback');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
