<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class PageController extends Controller
{
    public function home()
    {
        $flights = Flight::all(); // Ambil semua data penerbangan
        return view('pages.home', compact('flights'));
    }

    public function booking()
    {
        return view('pages.booking-now');
    }

    public function saved()
    {
        return view('pages.saved');
    }

    public function account()
    {
        return view('pages.my-account');
    }
}
