<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingNowController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('status', 'ongoing')->get();
        return view('pages.booking-now', compact('bookings'));
    }
}
