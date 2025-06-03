<?php

namespace App\Http\Controllers;

use App\Models\UserCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::guard('user_customer')->user();
        return view('edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = UserCustomer::find(Auth::guard('user_customer')->id());

        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'phone'    => 'nullable|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update data user
        $user->username = $request->username;
        $user->phone = $request->phone;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('my-account.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
