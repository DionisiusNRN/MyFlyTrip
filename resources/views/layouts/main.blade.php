<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul halaman akan diisi dari child template -->
    <title>@yield('title')</title>

    <!-- Vite directive untuk load file CSS bawaan Laravel Vite -->
    @vite(['resources/css/app.css'])

    <!-- Load file CSS eksternal lokal untuk icon (kemungkinan FontAwesome yang dibundling) -->
    <link rel="stylesheet" href="{{ asset('all.min.css') }}">

    <!-- Script Midtrans Snap (sandbox) untuk pembayaran -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <!-- CSS tambahan dari folder public (sepertinya fallback kalau Vite gagal?) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- JS bawaan aplikasi (jika ada interaksi custom) -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- SweetAlert2 untuk alert pop-up modern -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-[#FAF3E0] text-gray-900 flex flex-col min-h-screen">

    <!-- Header tetap di atas halaman (sticky) -->
    <header class="fixed top-0 left-0 w-full py-4 bg-[#7D0A0A] text-white shadow-md text-center font-bold text-xl z-50">
        MyFlyTrip
    </header>

    <!-- Tempat utama render konten dari halaman child -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Navigasi bawah layar, selalu tampil dan sticky -->
    <nav class="fixed bottom-0 left-0 w-full bg-[#7D0A0A] border-t border-gray-700 shadow-md">
        <div class="flex justify-between items-center px-6 py-3 w-full">

            <!-- Tombol ke halaman home -->
            <a href="{{ route('home') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                <i class="fa-solid fa-house text-lg"></i>
            </a>

            <!-- Jika user sudah login (dengan guard 'user_customer') -->
            @if(Auth::guard('user_customer')->check())

                <!-- Tombol ke halaman booking -->
                <a href="{{ route('booking-now.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-ticket-alt text-lg"></i>
                </a>

                <!-- Tombol ke halaman simpanan -->
                <a href="{{ route('saved.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-bookmark text-lg"></i>
                </a>

                <!-- Tombol ke halaman akun pribadi -->
                <a href="{{ route('my-account.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-user text-lg"></i>
                </a>

            @else
                <!-- Kalau belum login, semua tombol trigger modal login -->
                <a href="javascript:void(0)" onclick="askToLogin()" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-ticket-alt text-lg"></i>
                </a>
                <a href="javascript:void(0)" onclick="askToLogin()" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-bookmark text-lg"></i>
                </a>
                <a href="javascript:void(0)" onclick="askToLogin()" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-user text-lg"></i>
                </a>
            @endif

        </div>
    </nav>

    <!-- SweetAlert2 sudah diload ulang (boleh dihapus salah satu kalau mau optimal) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Menyimpan URL login dan register ke dalam variabel global JS
        const loginUrl = "{{ route('login.form') }}";
        const registerUrl = "{{ route('register') }}";

        // Fungsi untuk munculkan pop-up ajakan login
        function askToLogin() {
            Swal.fire({
                title: 'Login dulu yuk!',
                text: 'Kamu butuh login untuk akses fitur ini.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Nanti dulu',
            }).then((result) => {
                // Jika user klik "Login", redirect ke halaman login
                if (result.isConfirmed) {
                    window.location.href = loginUrl;
                }
            });
        }
    </script>

    <!-- Event listener saat DOM selesai dimuat -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Deteksi semua link yang punya data-auth="false"
            document.querySelectorAll('a[data-auth="false"]').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    askToLogin(); // Tampilkan modal login
                });
            });
        });
    </script>

</body>
</html>
