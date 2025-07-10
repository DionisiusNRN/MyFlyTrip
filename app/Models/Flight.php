<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    /**
     * Atribut yang boleh diisi massal.
     * Memudahkan create/update data secara langsung.
     */
    protected $fillable = [
        'airline',
        'departure',
        'destination',
        'departure_time',
        'arrival_time',
        'price',
    ];

    /**
     * Casting kolom datetime supaya bisa langsung pakai Carbon.
     * Contoh: $flight->departure_time->format('d M Y')
     */
    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time'   => 'datetime',
    ];

    /**
     * Relasi Many-to-Many:
     * Flight bisa disimpan oleh banyak user (disimpan = "saved").
     * Pakai pivot table: save_flights
     *
     * Dengan relasi ini, kamu bisa akses:
     * - $flight->savedByUsers → dapat semua user yang menyimpan flight ini
     * - $user->savedFlights → dapat semua flight yang disimpan user
     */
    public function savedByUsers()
    {
        return $this->belongsToMany(UserCustomer::class, 'save_flights')
                    ->withTimestamps(); // Nyimpan waktu save/unsave
    }
}
