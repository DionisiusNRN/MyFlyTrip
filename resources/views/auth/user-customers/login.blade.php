<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

    <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="mt-1 p-2 w-full border rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
                class="mt-1 p-2 w-full border rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Error message --}}
        @if ($errors->any())
            <div class="text-red-500 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Submit button --}}
        <button type="submit"
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
            Login
        </button>
    </form>


        <p class="text-sm text-center text-gray-600 mt-4">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</body>

</html>
