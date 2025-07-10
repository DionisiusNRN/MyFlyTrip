<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserCustomer extends Authenticatable
{
    use Notifiable;

    /**
     * Atribut yang boleh diisi secara massal (mass assignment).
     * Dipakai saat membuat user baru (misal via register).
     */
    protected $fillable = [
        'username',  // Nama pengguna
        'email',     // Email user
        'password',  // Password (disimpan dalam bentuk hash)
        'phone',     // Nomor telepon user
    ];

    /**
     * Atribut yang harus disembunyikan saat model diserialisasi (misalnya saat dilempar ke JSON).
     */
    protected $hidden = [
        'password',        // Demi keamanan
        'remember_token',  // Token "remember me"
    ];

    /**
     * Relasi one-to-many dengan tabel payments.
     * Setiap user bisa punya banyak pembayaran.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    /**
     * Relasi one-to-many dengan tabel bookings.
     * Setiap user bisa melakukan banyak pemesanan.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id');
    }

    /**
     * Relasi many-to-many dengan tabel flights melalui tabel pivot `save_flights`.
     * Digunakan untuk fitur "save" atau menyimpan penerbangan favorit.
     */
    public function savedFlights()
    {
        return $this->belongsToMany(Flight::class, 'save_flights', 'user_id', 'flight_id')
                    ->withTimestamps(); // Otomatis isi created_at & updated_at di tabel pivot
    }
}
