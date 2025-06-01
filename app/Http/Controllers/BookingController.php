<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;


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

    public function selectFlight($flight_id)
    {
        // Dummy user_name (karena gak ada auth user_id)
        $userName = 'dummyuser';

        // Cek booking pending untuk user_name ini dan flight_id
        $existingBooking = Booking::where('user_name', $userName)
            ->where('flight_id', $flight_id)
            ->where('status', 'pending')
            ->first();

        if ($existingBooking) {
            $booking = $existingBooking;
        } else {
            $flight = Flight::findOrFail($flight_id);
            // dd($flight);

            // Buat booking baru
            $booking = Booking::create([
                'user_name' => $userName,
                'flight_id' => $flight->id,
                'flight_number' => $flight->flight_number,
                'departure_date' => Flight::find($flight_id)->departure_time->format('Y-m-d'), // sesuaikan tipe data
                'status' => 'pending',
            ]);
        }

        return redirect()->route('payment.pay', ['id' => $booking->id]);
    }


    // public function selectFlight($flight_id)
    // {
    //     $userId = auth()->id(); // sesuaikan kalau pake auth, kalau belum bisa di-set null atau dummy

    //     // Cek dulu apakah sudah ada booking ongoing untuk flight ini dan user ini (optional, biar gak duplikat)
    //     $existingBooking = Booking::where('user_id', $userId)
    //         ->where('flight_id', $flight_id)
    //         ->where('status', 'pending')
    //         ->first();

    //     if ($existingBooking) {
    //         // Kalau sudah ada, pakai booking itu
    //         $booking = $existingBooking;
    //     } else {
    //         // Kalau belum ada, buat booking baru
    //         $booking = Booking::create([
    //             'user_id' => '1',
    //             'flight_id' => $flight_id,
    //             'status' => 'pending', // status awal sebelum bayar
    //         ]);
    //     }

    //     // Redirect ke payment dengan booking_id
    //     return redirect()->route('payment.pay', ['booking_id' => $booking->id]);
    // }


    public function cancel($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $booking->delete();
        return redirect()->route('flight.index'); // atau halaman lain sesuai flow
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
