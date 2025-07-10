<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Middleware ini memeriksa apakah user sudah login atau belum.
     * Guard default yang digunakan adalah 'user_customer', sesuai sistem auth custom.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $guard - (optional) nama guard yang digunakan. Default: user_customer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $guard = 'user_customer'): Response
    {
        // Kalau user belum login, arahkan ke halaman login
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('login.form');
        }

        // Kalau user sudah login, lanjutkan ke proses berikutnya (next middleware / controller)
        return $next($request);
    }
}
