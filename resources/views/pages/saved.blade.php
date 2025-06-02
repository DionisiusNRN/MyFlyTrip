@extends('layouts.main')

@section('content')
<div class='mt-20 px-4'>
    @forelse ($savedFlights as $flight)
    <!-- Kotak Kartu -->
    <div id="flight-{{ $flight->id }}" class="relative w-full bg-white shadow-md rounded-2xl p-5 space-y-4 transition">

        <!-- Tombol Saved (untuk Unsave) -->
        <button onclick="unsaveFlight({{ $flight->id }})"
            class="absolute top-2 right-1 w-8 h-8 flex items-center justify-center rounded-full text-[#7D0A0A] hover:text-[#EAD196]">
            <i class="fa-solid fa-bookmark"></i>
        </button>

        <!-- Isi Kotak -->
        <div class="space-y-3 ml-3 mr-3 mt-3">
            <!-- Nama Maskapai -->
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $flight->departure }} → {{ $flight->destination }}</h2>
                    <p class="text-sm text-gray-600">Sekali Jalan • {{ $flight->departure }} → {{ $flight->destination }}</p>
                </div>
                <span class="text-sm bg-[#7D0A0A] text-white px-3 py-1 rounded-full">
                    {{ \Carbon\Carbon::parse($flight->departure_time)->format('j M Y') }}
                </span>
            </div>

            <!-- Info Penerbangan -->
            <div class="border-t border-black pt-3 space-y-1">
                <p class="text-gray-700"><span class="font-medium">Berangkat:</span> {{ \Carbon\Carbon::parse($flight->departure_time)->format('H:i') }} WIB</p>
                <p class="text-gray-700"><span class="font-medium">Tiba:</span> {{ \Carbon\Carbon::parse($flight->arrival_time)->format('H:i') }} WITA</p>
                <p class="text-gray-700"><span class="font-medium">Durasi:</span> {{ $flight->departure_time->diff($flight->arrival_time)->format('%h jam %i menit') }}</p>
            </div>

            <!-- Harga dan Button -->
            <div class="flex justify-between items-center pt-4 border-t border-black">
                <p class="text-lg font-semibold text-[#7D0A0A]">Rp {{ number_format($flight->price) }} <span class="text-sm text-gray-600">(1 org)</span></p>
                <a href="{{ route('flight.show', $flight->id) }}" class="text-white text-sm font-medium rounded-md bg-[#7D0A0A] hover:bg-[#a00d0d] p-2">View Details</a>
            </div>
        </div>
    </div>
    <div class="h-10"></div>
    @empty
        <p class="text-center text-gray-600">Belum ada penerbangan yang disimpan.</p>
    @endforelse
</div>

<script>
    function unsaveFlight(flightId) {
        fetch(`/flights/${flightId}/unsave`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(res => {
            if (res.ok) {
                document.getElementById(`flight-${flightId}`).remove();
            }
        });
    }
</script>

@endsection
