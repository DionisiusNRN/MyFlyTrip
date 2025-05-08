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
    <!-- Tombol Cancel di kiri atas -->
    <a href="#" class="absolute top-4 left-4  text-gray-500 font-semibold hover:underline">
      Cancel
    </a>

    <h2 class="text-2xl font-semibold text-center mb-6">Edit Profile</h2>

    <div class="flex items-center justify-center relative mb-6">
      <div class="w-24 h-24 bg-gray-300 rounded-full relative">
        <!-- Icon pensil di kanan bawah foto -->
        <button class="absolute bottom-0 right-0 bg-[#7D0A0A] text-white text-xs px-2 py-1 rounded-full hover:bg-[#5c0707]">
          ✏️
        </button>
      </div>
    </div>

    <form class="space-y-4">
      <!-- Email (non-editable) -->
      <div class="relative">
        <input type="email" placeholder="Email" disabled class="w-full border bg-gray-100 text-gray-500 rounded-lg p-3 pr-10 cursor-not-allowed" />
      </div>

      <!-- Username (editable) -->
      <div class="relative">
        <input type="text" placeholder="Username" class="w-full border rounded-lg p-3 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 absolute right-3 top-1/2 transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
      </div>

      <!-- No. Telp (editable) -->
      <div class="relative">
        <input type="text" placeholder="No. Telp" class="w-full border rounded-lg p-3 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 absolute right-3 top-1/2 transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
      </div>

      <!-- Tombol Update -->
      <button type="submit" class="w-full bg-[#7D0A0A] text-white py-3 rounded-lg hover:bg-[#5c0707] transition">
        Update
      </button>
    </form>
  </div>

</body>
</html>
