<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     * Digunakan ketika membuat atau mengupdate data via create() / update().
     */
    protected $fillable = [
        'booking_id',      // Relasi ke tabel bookings
        'user_id',         // Relasi ke user_customer (siapa yang melakukan pembayaran)
        'transaction_id',  // ID transaksi dari Midtrans (atau sistem pembayaran lain)
        'payment_type',    // Metode pembayaran: bank_transfer, e-wallet, dsb
        'amount',          // Total yang dibayarkan
        'status',          // Status pembayaran: pending, success, failed, dsb
    ];

    /**
     * Relasi ke model Booking.
     * Setiap payment hanya milik satu booking.
     * Akses: $payment->booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Relasi ke model UserCustomer.
     * Menghubungkan payment ke user yang melakukan pembayaran.
     * Akses: $payment->userCustomer
     */
    public function userCustomer()
    {
        return $this->belongsTo(UserCustomer::class, 'user_id');
    }
}
