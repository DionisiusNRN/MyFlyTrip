<div class="flex space-x-4 border-b pb-2 mb-4 my-20">
    <a href="{{ route('booking-now.index') }}"
        class="px-4 py-2 border rounded {{ request()->routeIs('booking-now.index') ? 'bg-[#7D0A0A] text-white' : 'bg-white' }}">
        Booking Now
    </a>
    <a href="{{ route('booking-history.index') }}"
        class="px-4 py-2 border rounded {{ request()->routeIs('booking-history.index') ? 'bg-[#7D0A0A] text-white' : 'bg-white' }}">
        Booking History
    </a>
</div>
