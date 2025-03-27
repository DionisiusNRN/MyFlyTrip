<div class="flex space-x-4 border-b pb-2 mb-4">
    <a href="{{ route('booking-now.index') }}"
        class="px-4 py-2 border rounded {{ request()->routeIs('booking-now.index') ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
        Booking Now
    </a>
    <a href="{{ route('booking-history.index') }}"
        class="px-4 py-2 border rounded {{ request()->routeIs('booking-history.index') ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
        Booking History
    </a>
</div>
