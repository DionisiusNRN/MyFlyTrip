<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

/**
 * Controller untuk halaman umum (home, search, dan profil user).
 */
class PageController extends Controller
{
    /**
     * Menampilkan halaman home dengan daftar penerbangan yang akan datang.
     * Hanya menampilkan penerbangan yang masih bisa dibooking (minimal 6 jam dari sekarang).
     */
    public function home()
    {
        $flights = Flight::where('departure_time', '>', now()->addHours(6)) // Tambahkan toleransi buffer 6 jam
                        ->orderBy('departure_time', 'asc')
                        ->paginate(10); // Pagination untuk navigasi

        return view('pages.home', compact('flights'));
    }

    /**
     * Menangani pencarian penerbangan berdasarkan:
     * - kota asal (from)
     * - kota tujuan (to)
     * - tanggal keberangkatan
     *
     * Hanya menampilkan hasil yang keberangkatannya masih lebih dari 6 jam dari sekarang.
     */
    public function searchFlights(Request $request)
    {
        $query = Flight::query();

        // Filter berdasarkan kota asal (opsional)
        if ($request->filled('from')) {
            $query->where('departure', 'like', '%' . $request->from . '%');
        }

        // Filter berdasarkan kota tujuan (opsional)
        if ($request->filled('to')) {
            $query->where('destination', 'like', '%' . $request->to . '%');
        }

        // Filter berdasarkan tanggal keberangkatan (opsional)
        if ($request->filled('departure_date')) {
            $query->whereDate('departure_time', $request->departure_date);
        }

        // Pastikan flight minimal 6 jam dari sekarang
        $query->where('departure_time', '>', now()->addHours(6));

        // Urutkan berdasarkan waktu keberangkatan & tampilkan dengan pagination
        $flights = $query->orderBy('departure_time', 'asc')->paginate(10);

        return view('pages.home', compact('flights'));
    }

    /**
     * Menampilkan halaman akun pengguna.
     */
    public function account()
    {
        return view('pages.my-account');
    }
}
