<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function now()
    {
        $bookings = Booking::with('flight')
            ->where('user_id', Auth::guard('user_customer')->id())
            ->where('status', 'ongoing')->get();
        return view('pages.booking-now', compact('bookings'));
    }

    public function history()
    {
        $bookings = Booking::with('flight')
            ->where('user_id', Auth::guard('user_customer')->id())
            ->where('status', 'completed')->get();
        return view('pages.booking-history', compact('bookings'));
    }

    public function selectFlight($flight_id)
    {
        $user = Auth::guard('user_customer')->user();
        if (!$user) {
            return redirect()->route('login.form')->with('error', 'Silakan login terlebih dahulu untuk memilih flight.');
        }

        // Cek booking pending untuk username ini dan flight_id
        $existingBooking = Booking::where('user_id', $user->id)
            ->where('flight_id', $flight_id)
            ->where('status', 'pending')
            ->first();

        if ($existingBooking) {
            $booking = $existingBooking;
        } else {
            $flight = Flight::findOrFail($flight_id);


            $booking = Booking::create([
                'user_id' => $user->id,
                'username' => $user->username,
                'flight_id' => $flight->id,
                'flight_number' => $flight->flight_number,
                'departure_date' => Flight::find($flight_id)->departure_time->format('Y-m-d'), // sesuaikan tipe data
                'status' => 'pending',
            ]);
        }

        return redirect()->route('payment.pay', ['id' => $booking->id]);
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
