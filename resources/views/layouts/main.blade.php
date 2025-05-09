<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            <a href="{{ route('booking-now.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                <i class="fas fa-ticket-alt text-lg"></i>
            </a>
            <a href="{{ route('saved.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                <i class="fas fa-bookmark text-lg"></i>
            </a>
            <a href="{{ route('my-account.index') }}" class="flex flex-col items-center text-white hover:text-[#EAD196] w-full text-center">
                <i class="fas fa-user text-lg"></i>
            </a>
        </div>
    </nav>
</body>
</html>
