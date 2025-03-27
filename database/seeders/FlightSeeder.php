<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            [
                'airline' => 'Garuda Indonesia',
                'departure' => 'Jakarta (CGK)',
                'destination' => 'Bali (DPS)',
                'departure_time' => Carbon::now()->addDays(1)->format('Y-m-d H:i:s'),
                'arrival_time' => Carbon::now()->addDays(1)->addHours(2)->format('Y-m-d H:i:s'),
                'price' => 1500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'airline' => 'Lion Air',
                'departure' => 'Surabaya (SUB)',
                'destination' => 'Yogyakarta (JOG)',
                'departure_time' => Carbon::now()->addDays(2)->format('Y-m-d H:i:s'),
                'arrival_time' => Carbon::now()->addDays(2)->addHours(1)->format('Y-m-d H:i:s'),
                'price' => 700000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'airline' => 'AirAsia',
                'departure' => 'Bandung (BDO)',
                'destination' => 'Medan (KNO)',
                'departure_time' => Carbon::now()->addDays(3)->format('Y-m-d H:i:s'),
                'arrival_time' => Carbon::now()->addDays(3)->addHours(3)->format('Y-m-d H:i:s'),
                'price' => 1200000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
