<?php
namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

/**
 * Controller untuk menangani detail flight, menyimpan flight favorit,
 * serta daftar flight yang disimpan oleh user.
 */
class FlightController extends Controller
{
    /**
     * Menampilkan detail sebuah penerbangan berdasarkan ID-nya.
     */
    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('pages.flight-detail', compact('flight'));
    }

    /**
     * Menampilkan semua penerbangan yang telah disimpan oleh user (favorit).
     */
    public function saved()
    {
        $user = Auth::guard('user_customer')->user();

        // Pastikan user sudah login, kalau belum bisa diberi redirect
        if (!$user) {
            return redirect()->route('login.form')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil semua flight yang disimpan user
        $savedFlights = $user->savedFlights()->get();

        return view('pages.saved', compact('savedFlights'));
    }

    /**
     * Menyimpan atau menghapus flight dari daftar favorit (toggle).
     */
    public function toggleSave($id)
    {
        $user = Auth::guard('user_customer')->user();
        $flight = Flight::findOrFail($id);

        // Cek apakah flight sudah disimpan
        if ($user->savedFlights()->where('flight_id', $id)->exists()) {
            $user->savedFlights()->detach($id);
            $status = 'unsaved';
        } else {
            $user->savedFlights()->attach($id);
            $status = 'saved';
        }

        return response()->json(['status' => $status]);
    }

    /**
     * Menghapus flight dari daftar favorit secara eksplisit.
     */
    public function unsave($id)
    {
        $user = Auth::guard('user_customer')->user();
        $user->savedFlights()->detach($id);

        return response()->json(['message' => 'Flight unsaved successfully']);
    }
}
