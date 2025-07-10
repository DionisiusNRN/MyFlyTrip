@extends('layouts.main')
{{-- Menggunakan layout utama yang sudah ditentukan --}}

@section('content')
<div class="mt-20 px-4 max-w-3xl mx-auto pb-10">

    {{-- Looping semua data flight yang disimpan user --}}
    @forelse ($savedFlights as $flight)

    <!-- ======================== -->
    <!-- KARTU FLIGHT YANG DISIMPAN -->
    <!-- ======================== -->

    <div id="flight-{{ $flight->id }}" class="relative w-full bg-white shadow-md rounded-2xl p-5 space-y-4 transition break-words">

        <!-- Tombol bookmark (klik untuk unsave) -->
        <button onclick="unsaveFlight({{ $flight->id }})"
            class="text-xl absolute top-5 right-5 w-8 h-8 flex items-center justify-center rounded-full text-[#7D0A0A] hover:text-[#EAD196] focus:outline-none"
            aria-label="Unsave Flight">
            <i class="fa-solid fa-bookmark"></i>
        </button>

        <!-- Konten utama kartu -->
        <div class="space-y-3 mt-3">

            <!-- Nama Maskapai & Rute -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                <div class="min-w-0">
                    {{-- Rute utama --}}
                    <h2 class="text-xl font-semibold text-gray-800 truncate">
                        {{ $flight->departure }} → {{ $flight->destination }}
                    </h2>
                    {{-- Info rute tambahan --}}
                    <p class="text-sm text-gray-600 truncate">
                        Sekali Jalan • {{ $flight->departure }} → {{ $flight->destination }}
                    </p>
                    {{-- Tanggal keberangkatan --}}
                    <div class="mt-2">
                        <span class="text-sm bg-[#7D0A0A] text-white px-3 py-1 rounded-full whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($flight->departure_time)->format('j M Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Detail Info Waktu Penerbangan -->
            <div class="border-t border-gray-300 pt-3 space-y-1 text-gray-700 text-sm">
                <p><span class="font-medium">Berangkat:</span> {{ \Carbon\Carbon::parse($flight->departure_time)->format('H:i') }} WIB</p>
                <p><span class="font-medium">Tiba:</span> {{ \Carbon\Carbon::parse($flight->arrival_time)->format('H:i') }} WIB</p>
                <p><span class="font-medium">Durasi:</span> {{ $flight->departure_time->diff($flight->arrival_time)->format('%h jam %i menit') }}</p>
            </div>

            <!-- Harga dan Tombol Detail -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-3 pt-4 border-t border-gray-300">
                <p class="text-lg font-semibold text-[#7D0A0A] whitespace-nowrap">
                    Rp {{ number_format($flight->price) }} <span class="text-sm text-gray-600">(1 org)</span>
                </p>
                <a href="{{ route('flight.show', $flight->id) }}"
                   class="text-white text-sm font-medium rounded-md bg-[#7D0A0A] hover:bg-[#a00d0d] px-5 py-2 w-full sm:w-auto text-center transition">
                   View Details
                </a>
            </div>
        </div>
    </div>

    {{-- Spasi antar flight --}}
    <div class="h-6"></div>

    @empty
        {{-- Kalau tidak ada data flight yang disimpan --}}
        <p class="text-center text-gray-600">Belum ada penerbangan yang disimpan.</p>
    @endforelse
</div>

<!-- ======================== -->
<!-- SCRIPT: Hapus Bookmark -->
<!-- ======================== -->
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
                // Hapus elemen kartu dari DOM saat berhasil unsave
                document.getElementById(`flight-${flightId}`).remove();
            }
        });
    }
</script>

@endsection
