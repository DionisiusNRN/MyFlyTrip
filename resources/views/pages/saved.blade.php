@extends('layouts.main')

@section('content')

<div class='mt-20 px-4'>

    <!-- Button Saved -->
    <button
    class="relative w-full text-left bg-[#EEEEEE] shadow-md rounded-2xl p-5 space-y-4 hover:shadow-lg hover:bg-gray-400 transition">
    
    <!-- Button Hapus -->
    <button class="absolute top-2 right-1 text-gray-500 hover:text-[#7D0A0A]">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd" />
      </svg>
    </button>

    <!-- Header -->
    <div class="flex justify-between items-center">
      <div>
        <h2 class="text-xl font-semibold text-gray-800">Jakarta → Denpasar</h2>
        <p class="text-sm text-gray-600">Sekali Jalan • CGK → DPS</p>
      </div>
      <span class="text-sm bg-[#7D0A0A] text-white px-3 py-1 rounded-full">4 Mei 2025</span>
    </div>

    <!-- Info Penerbangan -->
    <div class="border-t border-black pt-3 space-y-1">
      <p class="text-gray-700"><span class="font-medium">Berangkat:</span> 10:30 WIB</p>
      <p class="text-gray-700"><span class="font-medium">Tiba:</span> 13:20 WITA</p>
      <p class="text-gray-700"><span class="font-medium">Durasi:</span> 1j 50m</p>
    </div>

    <!-- Harga -->
    <div class="flex justify-between items-center pt-4 border-t border-black">
      <p class="text-lg font-semibold text-[#7D0A0A]">Rp 1.153.700 <span class="text-sm text-gray-600">(1 org)</span></p>
    </div>
  </button>

</div>

@endsection
