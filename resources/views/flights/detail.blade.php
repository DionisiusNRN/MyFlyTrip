@extends('layouts.main')

@section('content')
<div class="p-4">
    <h1 class="text-xl font-bold">Detail Penerbangan</h1>
    <div class="bg-white p-4 shadow-md rounded-lg mt-4">
        <p><strong>Maskapai:</strong> {{ $flight->airline }}</p>
        <p><strong>Keberangkatan:</strong> {{ $flight->departure }}</p>
        <p><strong>Tujuan:</strong> {{ $flight->destination }}</p>
        <p><strong>Harga:</strong> Rp{{ number_format($flight->price, 0, ',', '.') }}</p>
    </div>
</div>
@endsection
