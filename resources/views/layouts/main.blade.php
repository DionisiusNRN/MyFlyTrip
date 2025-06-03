<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('all.min.css') }}">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#FAF3E0] text-gray-900 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="fixed top-0 left-0 w-full py-4 bg-[#7D0A0A] text-white shadow-md text-center font-bold text-xl z-50">
        MyFlyTrip
    </header>


    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>


    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 w-full bg-[#7D0A0A]  border-t border-gray-700 shadow-md">
        <div class="flex justify-between items-center px-6 py-3 w-full">
            <a href="{{ route('home') }}" class="flex flex-col items-center  text-white hover:text-[#EAD196] w-full text-center">
                <i class="fa-solid fa-house text-lg"></i>
            </a>
            @if(Auth::guard('user_customer')->check())
                <a href="{{ route('booking-now.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-ticket-alt text-lg"></i>
                </a>
                <a href="{{ route('saved.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-bookmark text-lg"></i>
                </a>
                <a href="{{ route('my-account.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                    <i class="fas fa-user text-lg"></i>
                </a>
            @else
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Variabel URL disimpan sekali di global scope
    const loginUrl = "{{ route('login.form') }}";
    const registerUrl = "{{ route('register') }}";

    function askToLogin() {
        Swal.fire({
            title: 'Login dulu yuk!',
            text: 'Kamu butuh login untuk akses fitur ini.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Login',
            cancelButtonText: 'Nanti dulu',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = loginUrl;
            }
        });
    }
</script>


    <!-- Script JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('a[data-auth="false"]').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    askToLogin(); // panggil modal atau alert login
                });
            });
        });
    </script>
</body>
</html>
