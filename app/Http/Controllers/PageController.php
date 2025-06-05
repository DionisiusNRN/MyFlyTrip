<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class PageController extends Controller
{
    public function home()
    {
        // $flights = Flight::all(); // Ambil semua data penerbangan
        $flights = Flight::where('departure_time', '>', now()->addHours(6))->get();
        return view('pages.home', compact('flights'));
    }

    public function searchFlights(Request $request)
    {
        $query = Flight::query();

        if ($request->filled('from')) {
            $query->where('departure', 'like', '%' . $request->from . '%'); // Ganti 'departure_airport' jadi 'departure'
        }

        if ($request->filled('to')) {
            $query->where('destination', 'like', '%' . $request->to . '%'); // Ganti 'arrival_airport' jadi 'destination'
        }

        if ($request->filled('departure_date')) {
            $query->whereDate('departure_time', $request->departure_date);
        }

        $query->where('departure_time', '>', now()->addHours(6));

        $flights = $query->get();

        return view('pages.home', compact('flights'));
    }

    public function booking()
    {
        return view('pages.booking-now');
    }

    public function account()
    {
        return view('pages.my-account');
    }
}
