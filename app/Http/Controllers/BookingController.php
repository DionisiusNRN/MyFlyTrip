<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;


class BookingController extends Controller
{
    public function now()
    {
        $bookings = Booking::with('flight')->where('status', 'ongoing')->get();
        return view('pages.booking-now', compact('bookings'));
    }

    public function history()
    {
        $bookings = Booking::with('flight')->where('status', 'completed')->get();
        return view('pages.booking-history', compact('bookings'));
    }



    public function create($id)
    {
        return view('pages.booking-create', compact('id'));
    }

    public function store(Request $request)
    {
        Booking::create($request->all());
        return redirect()->route('booking-now.index')->with('success', 'Booking berhasil!');
    }
}
