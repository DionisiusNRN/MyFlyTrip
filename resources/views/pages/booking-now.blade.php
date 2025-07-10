@extends('layouts.main')
{{-- Extend layout utama untuk menggunakan struktur HTML dari layouts/main.blade.php --}}

@section('content')
{{-- Isi konten halaman ini akan dimasukkan ke dalam @yield('content') pada layout --}}

    @include('pages.booking-tabs')
    {{-- Menyisipkan partial view untuk navigasi tab booking (misal: booking now, history, dsb) --}}

    <div class="mx-auto px-6 py-6 max-w-3xl">
        <h1 class="text-2xl font-bold text-gray-800 border-b pb-2 mb-6">Booking Now</h1>

        {{-- Cek apakah user punya booking yang sedang berlangsung --}}
        @if($bookings->isEmpty())
            <p class="text-gray-500 italic">There are no Booking Ongoing</p>
        @else
            {{-- Jika ada data booking aktif, tampilkan daftar --}}
            <div class="space-y-4">
                @foreach($bookings as $booking)
                    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 hover:shadow-md transition">

                        {{-- Validasi: apakah data relasi flight masih tersedia --}}
                        @if ($booking->flight)
                            <div class="flex flex-col gap-2">
                                {{-- Nama maskapai dan destinasi tujuan --}}
                                <p class="text-lg font-semibold text-[#7D0A0A]">
                                    {{ $booking->flight->airline }} → {{ $booking->flight->destination }}
                                </p>

                                {{-- Jadwal keberangkatan, diformat pakai Carbon --}}
                                <p class="text-sm text-gray-700">
                                    Departure:
                                    <span class="font-medium text-gray-900">
                                        {{ \Carbon\Carbon::parse($booking->flight->departure_time)->format('d M Y, H:i') }}
                                    </span>
                                </p>

                                {{-- Asal keberangkatan --}}
                                <p class="text-sm text-gray-700">
                                    From:
                                    <span class="font-medium">
                                        {{ $booking->flight->departure }}
                                    </span>
                                </p>

                                {{-- ID Booking sebagai identifikasi unik --}}
                                <p class="text-sm text-gray-700">
                                    Booking ID:
                                    <span class="text-gray-900 font-semibold">#{{ $booking->id }}</span>
                                </p>

                                {{-- Status booking saat ini (pending, confirmed, dll) --}}
                                <p class="text-sm text-[#7D0A0A] font-bold">
                                    Status: {{ $booking->status }}
                                </p>
                            </div>
                        @else
                            {{-- Fallback jika relasi flight tidak ditemukan --}}
                            <p class="text-red-500">Flight data not available</p>
                        @endif

                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
