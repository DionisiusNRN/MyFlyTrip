@extends('layouts.main')

@section('content')
    @include('pages.booking-tabs') {{-- Tambahkan tab navigasi --}}

    <h1 class="text-xl font-bold">Booking History</h1>
    @if($bookings->isEmpty())
        <p class="text-gray-500">Tidak ada booking yang sedang berlangsung.</p>
    @else
        @foreach($bookings as $booking)
            <div class="p-4 bg-white shadow-md rounded-lg mb-3">
                @if ($booking->flight)
                    <p class="font-semibold">{{ $booking->flight->airline }} - {{ $booking->flight->destination }}</p>
                    <p class="text-sm text-gray-500">Tanggal: {{ $booking->flight->departure_time }}</p>
                @else
                    <p class="text-red-500">Flight data not available</p>
                @endif
            </div>
        @endforeach
    @endif
@endsection
