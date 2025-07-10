<?php
namespace App\Http\Controllers;

use App\Models\UserCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan form edit profil untuk user yang sedang login.
     */
    public function edit()
    {
        $user = Auth::guard('user_customer')->user();
        return view('edit-profile', compact('user'));
    }

    /**
     * Memproses form update profil:
     * - Validasi input
     * - Update username, phone, dan (jika diisi) password
     */
    public function update(Request $request)
    {
        // Ambil user berdasarkan auth guard
        $user = UserCustomer::find(Auth::guard('user_customer')->id());

        // Validasi input dari form
        $request->validate([
            'username' => 'required|string|max:255',
            'phone'    => 'nullable|string|max:20',
            // Password tidak wajib, tapi jika diisi harus memenuhi aturan
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update username & phone
        $user->username = $request->username;
        $user->phone = $request->phone;

        // Jika user mengisi password, update password (hashing dengan bcrypt)
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('my-account.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
