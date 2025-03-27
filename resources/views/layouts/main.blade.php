<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="py-4 bg-white shadow-md text-center font-bold text-xl">
        MyFlyTrip
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-300 shadow-md">
        <div class="flex justify-around py-3">
            <a href="{{ route('home') }}" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
                <i class="fas fa-home text-xl"></i>
                <span class="text-xs">Home</span>
            </a>
            <a href="{{ route('booking-now.index') }}" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
                <i class="fas fa-ticket-alt text-xl"></i>
                <span class="text-xs">Booking</span>
            </a>
            <a href="{{ route('saved.index') }}" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
                <i class="fas fa-heart text-xl"></i>
                <span class="text-xs">Saved</span>
            </a>
            <a href="{{ route('my-account.index') }}" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
                <i class="fas fa-user text-xl"></i>
                <span class="text-xs">My Account</span>
            </a>
        </div>
    </nav>


</body>
</html>
