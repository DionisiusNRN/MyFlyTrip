@extends('layouts.main')

@section('content')
<div class="max-w-2xl mx-auto mt-27 p-9 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-2">Penerbangan Pilihanmu</h2>
    <div class="bg-blue-100 p-3 rounded mb-4">
        <p class="text-sm text-gray-700"><strong>{{ $flight->departure }}</strong> → <strong>{{ $flight->destination }}</strong></p>
        <p class="text-sm text-gray-600">1 Dewasa</p>
    </div>

    <div class="flex items-start gap-4 mb-4">
        <div class="flex flex-col items-center">
            <div class="text-sm font-semibold">{{ $flight->departure_time }}</div>
            <div class="w-px h-53 bg-gray-400 my-1"></div>
            <div class="text-sm font-semibold">{{ $flight->arrival_time }}</div>
        </div>
        <div class="flex-1">
            <p class="text-sm font-medium">Halim Perdanakusuma</p>
            <div class="border border-gray-300 rounded-lg p-3 my-2">
                <p class="text-red-600 font-semibold">{{ $flight->airline }}</p>
                <p class="text-sm text-gray-600">ID-7539 · Ekonomi · 1j 5m</p>

                <div class="mt-3 text-sm">
                    <p><strong>Tiket Sudah Termasuk</strong></p>
                    <ul class="list-disc ml-5 text-gray-700">
                        <li>Kabin: 7 kg</li>
                        <li>Bagasi: 20 kg</li>
                        <li>Gratis makanan</li>
                    </ul>

                    <p><strong>Harga Tiket</strong></p>
                    <ul class="list-disc ml-5 text-gray-700">
                        <li>${{ number_format($flight->price, 2) }}</li>
                    </ul>
                </div>
            </div>

            <p class="text-sm font-medium">Surabaya Yogyakarta</p>
        </div>
    </div>

    <div class="bg-gray-100 p-3 rounded text-sm text-gray-700">
        <p class="mb-1"><strong>Fasilitas Penerbangan</strong></p>
        <ul class="list-disc ml-5">
            <li>Cek DiBawah Ya!</li>
        </ul>
        <p class="mb-1"><strong>Benefit Gratis buat Kamu</strong></p>
        <ul class="list-disc ml-5">
            <li>Cek DiBawah Ya!</li>
        </ul>
    </div>
</div>


{{-- Batas (Fasilitas Penerbangan) --}}
<div class="pb-2">
    <div class="max-w-2xl mx-auto mt-13 p-14 bg-white shadow-md rounded-lg">
        {{-- Konten --}}
        <div>
            <h2 class="text-2xl font-semibold">Fasilitas Penerbangan</h2>
            <div class="mt-4 flex items-center gap-4">
              <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Logo_Pelita_Air_Service.png" alt="Lion Air" class="h-6">
              <div>
                <p class="text-sm font-medium">Lion Air</p>
                <p class="text-sm text-gray-500">ID-7539 &bull; Ekonomi &bull; 1j 5m</p>
              </div>
            </div>
          </div>
          
          <hr class="my-6">
          
          <div>
            <h2 class="text-sm font-semibold">Tiket Sudah Termasuk</h2>
            <div class="mt-4 space-y-2">
              <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20 13V5a2 2 0 00-2-2H6a2 2 0 00-2 2v8m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4"/>
                </svg>
                <p>Kabin: <strong>7 kg</strong> &nbsp; | &nbsp; Bagasi: <strong>20 kg</strong></p>
              </div>
              <p class="text-sm text-gray-500 ml-8">Pembelian bagasi tambahan tersedia di halaman pemesanan.<br>
                *Ketersediaan tergantung pihak maskapai.</p>
            </div>
          
            <div class="mt-4 flex items-center gap-3">
              <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                   viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
              <p><strong>Gratis makanan</strong></p>
            </div>
            <p class="text-sm text-gray-500 ml-8">Pembelian makanan tambahan tidak tersedia di halaman pemesanan.</p>
          </div>
          
          <div class="mt-6">
            <h2 class="text-sm font-semibold">Kelas</h2>
            <div class="mt-2 border-t pt-4 flex items-center gap-6">
              <p class="text-sm font-semibold">Ekonomi</p>
              <div class="flex gap-2">
                <div class="w-5 h-5 bg-gray-300 rounded-sm border-b-4 border-red-500"></div>
                <div class="w-5 h-5 bg-gray-300 rounded-sm border-b-4 border-red-500"></div>
                <div class="w-5 h-5 bg-gray-300 rounded-sm border-b-4 border-red-500"></div>
                <div class="w-5 h-5 bg-gray-300 rounded-sm border-b-4 border-red-500"></div>
              </div>
            </div>
          </div>
           <!-- Tombol Pilih -->
          <div class="mt-6 flex justify-end">
            <button class="bg-[#7D0A0A] text-white hover:bg-[#EAD196] hover:text-white px-4 py-2 mx-5 rounded ">
              Select
            </button>
          </div>
        </div>
        {{-- Konten --}}
    </div>
</div>


{{-- Batas Annauncement --}}
<div class="Annauncement max-w-2xl mx-auto pb-21 mt-2 p-9">
        {{-- Konten --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="font-semibold text-xl mb-4">Kebijakan 24 jam</h2>
          
            <div class="flex items-start gap-3 bg-blue-50 rounded-lg p-4">
              <img src="https://em-content.zobj.net/source/apple/354/loudspeaker_1f4e2.png" alt="Info Icon" class="w-6 h-6 mt-1">
              <p class="text-sm text-gray-700">
                Tiket <strong>100% Refund</strong> hanya tersedia untuk penerbangan dengan keberangkatan
                <strong class="text-black">lebih dari 24 jam</strong> dari saat pemesanan.
              </p>
          </div>
        {{-- Konten --}}
    </div>
</div>
@endsection