@extends('layouts.main')

@section('content')
    <div class="p-4 mt-20 mb-20 pb-20">
        <!-- Form Pencarian -->
        <form action="{{ route('search.flights') }}" method="POST" class="mb-10 px-6 py-8 rounded-2xl shadow-lg bg-[#7D0A0A] space-y-5">
            @csrf
            <div class="space-y-4 text-[#EAD196]">
                <div>
                    <label for="from" class="block text-sm font-semibold mb-1">From</label>
                    <input
                        type="text"
                        name="from"
                        id="from"
                        value="{{ old('from') }}"
                        placeholder="City or Airport"
                        class="w-full px-4 py-3 rounded-full bg-white/90 text-gray-700 text-sm focus:ring-2 focus:ring-[#EAD196] focus:outline-none"
                    >
                </div>

                <div>
                    <label for="to" class="block text-sm font-semibold mb-1">To</label>
                    <input
                        type="text"
                        name="to"
                        id="to"
                        value="{{ old('to') }}"
                        placeholder="City or Airport"
                        class="w-full px-4 py-3 rounded-full bg-white/90 text-gray-700 text-sm focus:ring-2 focus:ring-[#EAD196] focus:outline-none"
                    >
                </div>

                <div>
                    <label for="departure_date" class="block text-sm font-semibold mb-1">Departure Date</label>
                    <input
                        type="date"
                        name="departure_date"
                        id="departure_date"
                        value="{{ old('departure_date') }}"
                        class="w-full px-4 py-3 rounded-full bg-white/90 text-gray-700 text-sm focus:ring-2 focus:ring-[#EAD196] focus:outline-none"
                    >
                </div>
            </div>

            <div class="pt-3">
                <button
                    type="submit"
                    class="w-full bg-[#EAD196] text-[#7D0A0A] font-semibold tracking-wide hover:bg-[#f5e7c0] hover:text-red-800 transition-all py-3 rounded-full shadow-sm"
                >
                    Search Flights
                </button>
            </div>
        </form>


        <!-- Daftar Penerbangan -->
        <h1 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Daftar Penerbangan</h1>

        @if($flights->isEmpty())
            <p class="text-red-500 text-sm italic">There is no flights schedule.</p>
        @else
            <div class="space-y-4">
                @foreach ($flights as $flight)
                    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 transition hover:shadow-md">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <h2 class="text-lg font-bold text-[#7D0A0A]">{{ $flight->airline }}</h2>
                                <p class="text-sm text-gray-700 mt-1">{{ $flight->departure }} → {{ $flight->destination }}</p>
                                <p class="text-sm text-gray-600 mt-1">Departure: <span class="font-medium text-gray-800">{{ $flight->departure_time }}</span></p>
                                <p class="text-sm text-gray-600 mt-1">Price: <span class="font-semibold text-[#7D0A0A]">Rp{{ number_format($flight->price, 2) }}</span></p>
                            </div>

                            <div class="text-right sm:mt-0 mt-2">
                                <a
                                    href="{{ route('flight.show', $flight->id) }}"
                                    class="inline-block px-4 py-2 text-sm bg-[#EAD196] text-[#7D0A0A] font-semibold rounded-full shadow hover:bg-[#f5e7c0] hover:text-red-800 transition-all"
                                >
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection



