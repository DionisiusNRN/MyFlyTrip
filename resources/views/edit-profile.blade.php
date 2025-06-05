<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FAF3E0] min-h-screen flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-lg p-6 w-full max-w-sm relative">
    <h2 class="text-2xl font-semibold text-center mb-6">Edit Profile</h2>

    <form class="space-y-4" action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="email" name="email" value="{{ $user->email }}" disabled
            class="w-full border bg-gray-100 text-gray-500 rounded-lg p-3 pr-10 cursor-not-allowed" />

        <input type="text" name="username" value="{{ $user->username }}"
            class="w-full border rounded-lg p-3 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400" />

        <input type="text" name="phone" value="{{ $user->phone }}"
            class="w-full border rounded-lg p-3 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400" />

        <input type="password" name="password" placeholder="New Password"
            class="w-full border rounded-lg p-3 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400" />

        <div class="flex space-x-4">
            <a href="{{ route('my-account.index') }}"
              class="w-1/2 bg-gray-400 text-white text-center py-3 rounded-xl font-semibold hover:opacity-90 transition">
                Cancel
            </a>

            <button type="submit"
                class="w-1/2 bg-[#7D0A0A] text-white py-3 rounded-xl font-semibold hover:bg-[#5c0707] transition">
                Update
            </button>
        </div>
    </form>
  </div>
</body>
</html>
