<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FixFlightIdInBookingsTable extends Migration
{
    public function up()
    {
        // Isi NULL flight_id dulu (pastikan id=1 ada di flights)
        DB::table('bookings')->whereNull('flight_id')->update(['flight_id' => 1]);

        Schema::table('bookings', function (Blueprint $table) {
            // Drop FK lama (kalau sebelumnya sudah buat foreign key)
            $table->dropForeign(['flight_id']); // pastikan FK ini benar
        });

        Schema::table('bookings', function (Blueprint $table) {
            // Ubah jadi NOT NULL
            $table->unsignedBigInteger('flight_id')->nullable(false)->change();

            // Tambah FK ulang
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['flight_id']);
            $table->unsignedBigInteger('flight_id')->nullable()->change();
        });
    }
}

