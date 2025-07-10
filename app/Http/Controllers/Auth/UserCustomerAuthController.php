<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCustomer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserCustomerAuthController extends Controller
{
    /**
     * Tampilkan form registrasi user customer.
     */
    public function showRegisterForm()
    {
        return view('auth.user-customers.register');
    }

    /**
     * Proses registrasi user customer.
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:user_customers,email',
            'password' => 'required|string|min:6|confirmed',
            'phone'    => 'required|string|max:15',
        ]);

        // Simpan ke database
        $user = UserCustomer::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password), // Enkripsi password
            'phone'    => $request->phone,
        ]);

        // Redirect ke login page
        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Tampilkan form login user customer.
     */
    public function showLoginForm()
    {
        return view('auth.user-customers.login');
    }

    /**
     * Proses login user customer.
     */
    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses login dengan guard khusus user_customer
        if (Auth::guard('user_customer')->attempt($credentials)) {
            // Regenerasi session untuk mencegah session fixation
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        // Kalau gagal, kembali ke form dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout user customer.
     */
    public function logout(Request $request)
    {
        Auth::guard('user_customer')->logout(); // Logout guard khusus

        // Invalidasi session dan generate token baru (keamanan)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke landing/home
    }
}
