<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('pages.flight-detail', compact('flight'));
    }
}
