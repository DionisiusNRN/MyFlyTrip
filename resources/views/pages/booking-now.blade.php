@extends('layouts.main')

@section('content')
    @include('pages.booking-tabs') {{-- Tambahkan tab navigasi --}}

    <div class="mx-auto px-6 py-6">
        <h1 class="text-2xl font-bold text-gray-800 border-b pb-2 mb-6">Booking Now</h1>

        @if($bookings->isEmpty())
            <p class="text-gray-500 italic">There are no Booking Ongoing</p>
        @else
            <div class="space-y-4">
                @foreach($bookings as $booking)
                    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 hover:shadow-md transition">
                        @if ($booking->flight)
                            <div class="flex flex-col gap-2">
                                <p class="text-lg font-semibold text-[#7D0A0A]">{{ $booking->flight->airline }} → {{ $booking->flight->destination }}</p>
                                <p class="text-sm text-gray-700">Departure: <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($booking->flight->departure_time)->format('d M Y, H:i') }}</span></p>
                                <p class="text-sm text-gray-700">From: <span class="font-medium">{{ $booking->flight->departure }}</span></p>
                                <p class="text-sm text-gray-700">Booking ID: <span class="text-gray-900 font-semibold">#{{ $booking->id }}</span></p>
                                <p class="text-sm text-[#7D0A0A] font-bold">Status: {{ $booking->status }}</p>
                            </div>
                        @else
                            <p class="text-red-500">Flight data not available</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>



@endsection
