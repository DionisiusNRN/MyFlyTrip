<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCustomer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserCustomerAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.user-customers.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:user_customers,email',
            'password' => 'required|string|min:6|confirmed',
            'phone'    => 'required|string|max:15',
        ]);

        $user = UserCustomer::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'phone'    => $request->phone,
        ]);

        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function showLoginForm()
    {
        return view('auth.user-customers.login'); // Ganti dengan nama file blade login kamu
    }


    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses login
        if (Auth::guard('user_customer')->attempt($credentials)) {
            return redirect()->route('home');
        }

        // Kalau gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('user_customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Balik ke home / landing page
    }

}
