<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;


class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user_name' => 'John Doe',
            'flight_number' => 'FL001',
            'departure_date' => '2025-05-01',
            'status' => 'now',
        ]);

        Booking::create([
            'user_name' => 'Jane Smith',
            'flight_number' => 'FL002',
            'departure_date' => '2025-04-15',
            'status' => 'history',
        ]);
    }
}
