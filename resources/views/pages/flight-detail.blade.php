@extends('layouts.main')
{{-- Menggunakan layout utama --}}

@section('content')
<div class="max-w-2xl mx-auto mt-24 p-8 bg-white shadow-md rounded-2xl text-[15px] leading-relaxed font-sans">

    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold tracking-tight text-gray-800">Detail Flight</h2>

        {{-- Jika user login (guard user_customer), tampilkan tombol simpan --}}
        @if(Auth::guard('user_customer')->check())
            <button id="save-button" class="text-xl text-[#7D0A0A] hover:text-[#EAD196] transition">
                {{-- Icon bookmark, bisa solid kalau sudah disimpan, atau regular kalau belum --}}
                <i id="save-icon" class="{{ Auth::guard('user_customer')->user()->savedFlights->contains($flight->id) ? 'fa-solid' : 'fa-regular' }} fa-bookmark"></i>
            </button>
        @else
            {{-- Kalau belum login, tombol simpan akan munculkan modal login --}}
            <button onclick="askToLogin()" class="text-xl text-gray-600 hover:text-red-600 transition">
                <i class="fa-regular fa-bookmark"></i>
            </button>
        @endif
    </div>

    <hr class="border-gray-300 mb-6">

    <!-- Flight Info -->
    <div class="flex items-center gap-4 mb-2">
        <div>
            <p class="text-lg font-semibold text-gray-900">{{ $flight->airline }}</p>
            {{-- Info tambahan, saat ini masih hardcoded --}}
            <p class="text-sm text-gray-500">ID-7539 &bull; Ekonomi &bull; 1j 5m</p>
        </div>
    </div>

    <hr class="border-gray-200 my-6">

    <!-- Rute -->
    <div class="bg-blue-50 p-4 rounded-lg mb-6">
        <p class="text-sm font-semibold text-gray-800">
            <strong>{{ $flight->departure }}</strong> → <strong>{{ $flight->destination }}</strong>
        </p>
        <p class="text-sm text-gray-600">1 Dewasa</p>
    </div>

    <!-- Detail -->
    <div class="flex items-start gap-4 mb-4">
        <div class="flex-1">
            <div class="border border-gray-200 rounded-xl p-5 bg-gray-50">
                <div class="space-y-5 text-sm text-gray-800">

                    {{-- Info bagasi --}}
                    <div>
                        <p class="font-semibold text-gray-700">Tiket Sudah Termasuk</p>
                        <ul class="list-disc ml-5 mt-1">
                            <li>Kabin: 7 kg</li>
                            <li>Bagasi: 20 kg</li>
                        </ul>
                    </div>

                    {{-- Harga tiket --}}
                    <div>
                        <p class="font-semibold text-gray-700">Harga Tiket</p>
                        <ul class="list-disc ml-5 mt-1">
                            <li>Rp{{ number_format($flight->price, 2) }}</li>
                        </ul>
                    </div>

                    {{-- Waktu keberangkatan --}}
                    <div>
                        <p class="font-semibold text-gray-700">Departure Time</p>
                        <p class="text-base font-bold text-gray-900">{{ $flight->departure_time }}</p>
                    </div>

                    {{-- Waktu tiba --}}
                    <div>
                        <p class="font-semibold text-gray-700">Arrival Time</p>
                        <p class="text-base font-bold text-gray-900">{{ $flight->arrival_time }}</p>
                    </div>
                </div>
            </div>

            <!-- Tombol Select -->
            <div class="flex justify-end mt-8">
                {{-- Jika login, tombol akan arahkan ke route booking --}}
                @if(Auth::guard('user_customer')->check())
                    <a href="{{ route('booking.select', ['flight_id' => $flight->id]) }}">
                        <button class="bg-[#7D0A0A] text-white hover:bg-[#EAD196] hover:text-white px-5 py-2.5 mx-2 rounded-2xl transition font-medium">
                            Select
                        </button>
                    </a>
                @else
                    {{-- Kalau belum login, munculkan modal login --}}
                    <a href="javascript:void(0)" onclick="askToLogin()">
                        <button class="bg-[#7D0A0A] text-white hover:bg-[#EAD196] hover:text-white px-5 py-2.5 mx-2 rounded-2xl transition font-medium">
                            Select
                        </button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Informasi Refund -->
<div class="max-w-2xl mx-auto pb-21 p-9">
    <div class="bg-white rounded-2xl shadow-md p-5">
        <div class="flex items-start gap-3 bg-blue-50 rounded-xl p-4">
            <i class="fa-solid fa-circle-info text-blue-500 text-lg mt-0.5"></i>
            <p class="text-sm text-gray-700 leading-relaxed">
                Tiket <strong>100% Refund</strong> hanya tersedia untuk penerbangan dengan keberangkatan
                <strong class="text-gray-900">lebih dari 24 jam</strong> dari saat pemesanan.
            </p>
        </div>
    </div>
</div>

{{-- Script untuk fitur save flight --}}
@auth('user_customer')
<script>
    document.getElementById('save-button')?.addEventListener('click', function () {
        const icon = document.getElementById('save-icon');

        // Kirim request POST ke route toggle save (favorit)
        fetch("{{ route('flight.toggleSave', ['id' => $flight->id]) }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            // Update icon berdasarkan status baru
            if (data.status === 'saved') {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid');
            } else {
                icon.classList.remove('fa-solid');
                icon.classList.add('fa-regular');
            }
        })
        .catch(error => {
            console.error("Failed to save flight:", error);
        });
    });
</script>
@endauth

@endsection
