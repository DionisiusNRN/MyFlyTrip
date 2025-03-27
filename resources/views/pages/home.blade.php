@extends('layouts.main')

@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold mb-4">Daftar Penerbangan</h1>
            @foreach ($flights as $flight)
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <h2 class="text-lg font-semibold">{{ $flight->airline }}</h2>
                    <p>{{ $flight->departure_airport }} → {{ $flight->arrival_airport }}</p>
                    <p>Departure: {{ $flight->departure_time }}</p>
                    <p>Price: ${{ number_format($flight->price, 2) }}</p>
                    <a href="{{ route('flight.show', $flight->id) }}" class="text-blue-500 hover:underline">
                        View Details
                    </a>
                </div>
            @endforeach

    </div>
@endsection


