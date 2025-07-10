<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * Atribut yang boleh diisi massal (mass assignment).
     * Ini penting biar bisa pakai create() atau update() dengan aman.
     */
    protected $fillable = [
        'user_id',
        'username',
        'flight_id',
        'flight_number',
        'departure_date',
        'status', // Status bisa: pending, ongoing, completed
    ];

    /**
     * Relasi: Booking milik satu Flight.
     * Digunakan untuk mengakses informasi flight dari booking.
     * Contoh: $booking->flight->airline
     */
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }

    /**
     * Relasi: Booking dimiliki oleh satu UserCustomer.
     * Digunakan untuk akses data user dari booking (optional tergantung kebutuhan).
     * Contoh: $booking->userCustomer->username
     */
    public function userCustomer()
    {
        return $this->belongsTo(UserCustomer::class, 'user_id');
    }
}
