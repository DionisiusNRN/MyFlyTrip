@extends('layouts.main')

@section('content')
    <div class="p-4 mt-20 mb-20">
        <!-- Form Pencarian -->
        <form action="{{ route('search.flights') }}" method="POST" class="mb-6 p-4 rounded-lg shadow bg-[#BF3131]">
            @csrf
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="from" class="block font-semibold">From</label>
                    <input type="text" name="from" id="from" value="{{ old('from') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="to" class="block font-semibold">To</label>
                    <input type="text" name="to" id="to" value="{{ old('to') }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label for="departure_date" class="block font-semibold">Departure Date</label>
                    <input type="date" name="departure_date" id="departure_date" value="{{ old('departure_date') }}" class="w-full p-2 border rounded">
                </div>
            </div>
            <button type="submit" class="mt-4 bg-[#7D0A0A] text-white px-4 py-2 rounded">Search Flights</button>
        </form>

        <!-- Daftar Penerbangan -->
        <h1 class="text-xl font-bold mb-4">Daftar Penerbangan</h1>
        @if($flights->isEmpty())
            <p class="text-red-500">There is no flights schedule.</p>
        @else
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
        @endif
    </div>
@endsection



