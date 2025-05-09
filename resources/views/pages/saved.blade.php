@extends('layouts.main')

@section('content')
<div class='mt-20 px-4'>

    <!-- Kotak Kartu -->
    <div class="relative w-full bg-white shadow-md rounded-2xl p-5 space-y-4 transition">
    
        <!-- Tombol Hapus -->
        <button class="absolute top-2 right-1 w-8 h-8 flex items-center justify-center rounded-full bg-[#EAD196] text-[#7D0A0A] hover:bg-[#7D0A0A] hover:text-[#EAD196]">
            <i class="fa-solid fa-xmark"></i>
        </button>


        <!-- Isi Kotak -->
        <div class="space-y-3 ml-3 mr-3 mt-3">
            <!-- Nama Maskapai -->
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

            <!-- Harga dan Button -->
            <div class="flex justify-between items-center pt-4 border-t border-black">
              <p class="text-lg font-semibold text-[#7D0A0A]">Rp 1.153.700 <span class="text-sm text-gray-600">(1 org)</span></p>
              <button class="text-white text-sm font-medium rounded-md bg-[#7D0A0A] hover:bg-[#a00d0d] p-2">View Details</button>
            </div>
        </div>
    </div>

      <!-- jarak antara kotak kartu dan footer -->
      <div class="h-10"></div>

</div>
@endsection
