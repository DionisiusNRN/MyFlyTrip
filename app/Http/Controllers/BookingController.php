<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar booking aktif (status: ongoing) milik user yang login.
     * Jika waktu keberangkatan flight sudah lewat, status booking otomatis diubah menjadi 'completed'.
     */
    public function now()
    {
        $userId = Auth::guard('user_customer')->id(); // Ambil ID user dari guard 'user_customer'

        // Ambil semua booking dengan status 'ongoing' untuk user
        $bookings = Booking::with('flight')
            ->where('user_id', $userId)
            ->where('status', 'ongoing')
            ->get();

        // Cek setiap booking, jika waktu keberangkatan sudah lewat maka tandai 'completed'
        foreach ($bookings as $booking) {
            if (now()->greaterThanOrEqualTo($booking->flight->departure_time)) {
                $booking->status = 'completed';
                $booking->save();
            }
        }

        // Ambil ulang daftar booking yang masih 'ongoing' (setelah update di atas)
        $bookings = Booking::with('flight')
            ->where('user_id', $userId)
            ->where('status', 'ongoing')
            ->get();

        return view('pages.booking-now', compact('bookings'));
    }

    /**
     * Menampilkan riwayat booking milik user dengan status 'completed'
     */
    public function history()
    {
        $bookings = Booking::with('flight')
            ->where('user_id', Auth::guard('user_customer')->id())
            ->where('status', 'completed')
            ->get();

        return view('pages.booking-history', compact('bookings'));
    }

    /**
     * Membuat atau mengambil booking dengan status 'pending' untuk user dan flight tertentu.
     * Jika belum ada booking 'pending', maka buat baru dan arahkan ke halaman pembayaran.
     */
    public function selectFlight($flight_id)
    {
        $user = Auth::guard('user_customer')->user();

        // Redirect jika belum login
        if (!$user) {
            return redirect()->route('login.form')->with('error', 'Silakan login terlebih dahulu untuk memilih flight.');
        }

        // Cek apakah sudah ada booking 'pending' untuk flight dan user ini
        $existingBooking = Booking::where('user_id', $user->id)
            ->where('flight_id', $flight_id)
            ->where('status', 'pending')
            ->first();

        if ($existingBooking) {
            $booking = $existingBooking; // Pakai booking yang sudah ada
        } else {
            $flight = Flight::findOrFail($flight_id); // Ambil data penerbangan

            // Buat booking baru
            $booking = Booking::create([
                'user_id' => $user->id,
                'username' => $user->username,
                'flight_id' => $flight->id,
                'flight_number' => $flight->flight_number,
                'departure_date' => $flight->departure_time->format('Y-m-d'), // Ambil tanggal dari departure_time
                'status' => 'pending', // Status awal
            ]);
        }

        // Arahkan ke proses pembayaran
        return redirect()->route('payment.pay', ['id' => $booking->id]);
    }

    /**
     * Fungsi store() ini dipakai jika booking dibuat dari form atau kebutuhan umum.
     * (Fungsionalitas ini jarang dipakai di flow kamu, tapi tetap disediakan)
     */
    public function store(Request $request)
    {
        Booking::create($request->all());

        return redirect()->route('booking-now.index')->with('success', 'Booking berhasil!');
    }
}
