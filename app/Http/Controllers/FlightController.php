<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

// savedFlights() error nggak jelas
class FlightController extends Controller
{
    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('pages.flight-detail', compact('flight'));
    }

    public function saved()
    {
        $user = Auth::guard('user_customer')->user();
        $savedFlights = $user->savedFlights()->get();

        return view('pages.saved', compact('savedFlights'));
    }

    public function toggleSave($id)
    {
        $user = Auth::guard('user_customer')->user();
        $flight = Flight::findOrFail($id);

        if ($user->savedFlights()->where('flight_id', $id)->exists()) {
            $user->savedFlights()->detach($id);
            $status = 'unsaved';
        } else {
            $user->savedFlights()->attach($id);
            $status = 'saved';
        }

        return response()->json(['status' => $status]);
    }

    public function unsave($id)
    {
        $user = Auth::guard('user_customer')->user();
        $user->savedFlights()->detach($id);

        return response()->json(['message' => 'Flight unsaved successfully']);
    }
}
