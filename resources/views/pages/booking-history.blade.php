@extends('layouts.main')
{{-- Extend dari layout utama, artinya halaman ini akan menggunakan struktur HTML dari layouts/main.blade.php --}}

@section('content')
{{-- Section 'content' akan masuk ke @yield('content') di layout utama --}}

    @include('pages.booking-tabs')
    {{-- Menyisipkan file partial booking-tabs, biasanya untuk navigasi tab (misal: aktif, riwayat, dll) --}}

    <div class="px-6 py-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 border-b pb-2 mb-6">Booking History</h1>

        {{-- Jika data booking kosong --}}
        @if($bookings->isEmpty())
            <p class="text-gray-500 italic">There are no History</p>
        @else
            {{-- Jika ada data booking, looping dan tampilkan --}}
            <div class="space-y-4">
                @foreach($bookings as $booking)
                    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 hover:shadow-md transition">

                        {{-- Cek apakah relasi flight tersedia --}}
                        @if ($booking->flight)
                            <div class="flex flex-col gap-2">
                                {{-- Nama maskapai dan tujuan --}}
                                <p class="text-lg font-semibold text-[#7D0A0A]">
                                    {{ $booking->flight->airline }} → {{ $booking->flight->destination }}
                                </p>

                                {{-- Waktu keberangkatan yang sudah diformat --}}
                                <p class="text-sm text-gray-700">
                                    Departure:
                                    <span class="font-medium text-gray-900">
                                        {{ \Carbon\Carbon::parse($booking->flight->departure_time)->format('d M Y, H:i') }}
                                    </span>
                                </p>

                                {{-- Lokasi keberangkatan --}}
                                <p class="text-sm text-gray-700">
                                    From:
                                    <span class="font-medium">
                                        {{ $booking->flight->departure }}
                                    </span>
                                </p>

                                {{-- ID booking --}}
                                <p class="text-sm text-gray-700">
                                    Booking ID:
                                    <span class="text-gray-900 font-semibold">#{{ $booking->id }}</span>
                                </p>

                                {{-- Status booking (misalnya: success, pending, cancelled) --}}
                                <p class="text-sm text-[#7D0A0A] font-bold">
                                    Status: {{ $booking->status }}
                                </p>
                            </div>
                        @else
                            {{-- Jika relasi flight tidak ditemukan --}}
                            <p class="text-red-500">Flight data not available</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
