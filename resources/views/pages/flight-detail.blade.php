@extends('layouts.main')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Flight Detail</h1>
    <div class="bg-white p-4 rounded-lg shadow">
        <p><strong>Airline:</strong> {{ $flight->airline }}</p>
        <p><strong>From:</strong> {{ $flight->departure_airport }}</p>
        <p><strong>To:</strong> {{ $flight->arrival_airport }}</p>
        <p><strong>Departure:</strong> {{ $flight->departure_time }}</p>
        <p><strong>Arrival:</strong> {{ $flight->arrival_time }}</p>
        <p><strong>Price:</strong> ${{ number_format($flight->price, 2) }}</p>
    </div>
</div>
@endsection
