@extends('layouts.main')

@section('content')

<div class="mt-20">

<div class="bg-[#7D0A0A] rounded-b-2xl pb-3 pt-7 -mt-5">
  <!-- Profil Card -->
  <div class="bg-[#EEEEEE] mx-4 mt-[-1rem] rounded-xl p-4 shadow-lg">
    <div class="flex items-center justify-between mb-4">
      <!-- Gambar Profil -->
      <div class="flex items-center">
        <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center text-2xl font-bold text-gray-500">
          NA
        </div>
        <div class="ml-4">
          <div class="text-lg font-bold text-black">Nama Anda</div>
          <div class="text-sm text-black">Masuk dengan Google</div>
        </div>
      </div>

      <!-- Ikon Pensil sebagai <a> -->
      <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow hover:bg-gray-200 cursor-pointer transition duration-200">
        ✏️
      </a>
    </div>

    <!-- Tombol "Lihat Profil Saya" jadi <a> -->
    <a href="#" class="w-full block text-center bg-[#7D0A0A] text-white font-semibold py-2 px-4 rounded-md shadow hover:bg-[#a00d0d] transition duration-200">
      Lihat Profil Saya
    </a>
    </div>
  </div>
</div>

<!-- jarak profil dan menu tambahan -->
<div class="mt-5"></div>

<!-- Menu Tambahan -->
<div class="bg-[#EEEEEE] rounded-xl p-4 shadow-lg mx-2 mt-4 mb-8 pb-4">
  <div class="space-y-3">

    <!-- MyFlyTrip Info -->
    <a href="#" class="w-full text-left border-b border-gray-400 pb-3 flex flex-col hover:bg-gray-300 p-2 rounded-md transition">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <i class="fas fa-user-tag text-[#7D0A0A] mr-3 text-sm md:text-base"></i>
          <span class="text-black text-sm md:text-base">MyFlyTrip Info</span>
        </div>
        <i class="fas fa-chevron-right text-gray-500 text-sm"></i>
      </div>
      <div class="text-xs text-gray-500 mt-1 ml-7">Informasi perjalanan Anda</div>
    </a>

    <!-- Pusat Bantuan -->
    <a href="#" class="w-full text-left border-b border-gray-400 pb-3 flex flex-col hover:bg-gray-300 p-2 rounded-md transition">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <i class="fas fa-question-circle text-[#7D0A0A] mr-3 text-sm md:text-base"></i>
          <span class="text-black text-sm md:text-base">Pusat Bantuan</span>
        </div>
        <i class="fas fa-chevron-right text-gray-500 text-sm"></i>
      </div>
      <div class="text-xs text-gray-500 mt-1 ml-7">Temukan jawaban untuk pertanyaan Anda</div>
    </a>

    <!-- Hubungi Kami -->
    <a href="#" class="w-full text-left border-b border-gray-400 pb-3 flex flex-col hover:bg-gray-300 p-2 rounded-md transition">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <i class="fas fa-headset text-[#7D0A0A] mr-3 text-sm md:text-base"></i>
          <span class="text-black text-sm md:text-base">Hubungi Kami</span>
        </div>
        <i class="fas fa-chevron-right text-gray-500 text-sm"></i>
      </div>
      <div class="text-xs text-gray-500 mt-1 ml-7">Dapatkan bantuan dari Customer Service</div>
    </a>

    <!-- Pengaturan -->
    <a href="#" class="w-full text-left border-b border-gray-400 pb-3 flex flex-col hover:bg-gray-300 p-2 rounded-md transition">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <i class="fas fa-cog text-[#7D0A0A] mr-3 text-sm md:text-base"></i>
          <span class="text-black text-sm md:text-base">Pengaturan</span>
        </div>
        <i class="fas fa-chevron-right text-gray-500 text-sm"></i>
      </div>
      <div class="text-xs text-gray-500 mt-1 ml-7">Lihat dan atur preferensi akun Anda</div>
    </a>

    <!-- Logout -->
<button href="#" class="w-full text-left pb-3 flex flex-col hover:bg-gray-300 p-2 rounded-md transition">
  <div class="flex items-center justify-between">
    <div class="flex items-center">
      <i class="fas fa-sign-out-alt text-[#7D0A0A] mr-3 text-sm md:text-base"></i>
      <span class="text-black text-sm md:text-base">Logout</span>
    </div>
    <i class="fas fa-chevron-right text-gray-500 text-sm"></i>
  </div>
  <div class="text-xs text-gray-500 mt-1 ml-7">Keluar dari akun Anda</div>
</button>


  </div>
</div>

<!-- jarak menu tambahan & footer -->
<div class="h-10"></div>

</div>

@endsection
