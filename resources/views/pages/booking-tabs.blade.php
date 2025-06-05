<div class="flex space-x-6 pb-3 mt-20 max-w-md mx-auto">
    <a href="{{ route('booking-now.index') }}"
       class="px-6 py-2 rounded-t-lg font-semibold transition-colors duration-300
              {{ request()->routeIs('booking-now.index')
                  ? 'bg-[#7D0A0A] text-white shadow-md border-b-4 border-[#EAD196]'
                  : 'bg-white text-gray-700 hover:text-[#7D0A0A] hover:border-b-4 hover:border-[#EAD196]' }}">
        Booking Now
    </a>
    <a href="{{ route('booking-history.index') }}"
       class="px-6 py-2 rounded-t-lg font-semibold transition-colors duration-300
              {{ request()->routeIs('booking-history.index')
                  ? 'bg-[#7D0A0A] text-white shadow-md border-b-4 border-[#EAD196]'
                  : 'bg-white text-gray-700 hover:text-[#7D0A0A] hover:border-b-4 hover:border-[#EAD196]' }}">
        Booking History
    </a>
</div>


{{-- <div class="flex space-x-4 border-b pb-2 mb-4 my-20">
    <a href="{{ route('booking-now.index') }}"
        class="px-4 py-2 border rounded {{ request()->routeIs('booking-now.index') ? 'bg-[#7D0A0A] text-white' : 'bg-white' }}">
        Booking Now
    </a>
    <a href="{{ route('booking-history.index') }}"
        class="px-4 py-2 border rounded {{ request()->routeIs('booking-history.index') ? 'bg-[#7D0A0A] text-white' : 'bg-white' }}">
        Booking History
    </a>
</div> --}}


