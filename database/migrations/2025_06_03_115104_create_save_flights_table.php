<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('save_flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('flight_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user_customers')->onDelete('cascade');
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->unique(['user_id', 'flight_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_flights');
    }
};
