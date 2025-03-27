<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;


class BookingHistoryController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('status', 'completed')->get();
        return view('pages.booking-history', compact('bookings'));
    }
}
