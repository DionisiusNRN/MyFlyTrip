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

    public function toggleSave($id)
    {
        $flight = Flight::findOrFail($id);

        // Toggle status save
        $flight->save = ($flight->save === 'saved') ? 'unsaved' : 'saved';
        $flight->save();

        return response()->json(['status' => $flight->save]);
    }

    public function unsave($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->save = 'unsaved';
        $flight->save();

        return response()->json(['message' => 'Flight unsaved successfully']);
    }


}
