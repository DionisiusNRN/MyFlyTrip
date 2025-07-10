<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Atribut yang boleh diisi secara massal (mass assignment).
     * Ini dipakai saat menggunakan metode seperti create() atau fill().
     */
    protected $fillable = [
        'name',        // Nama user
        'email',       // Alamat email user
        'password',    // Password (akan di-hash)
    ];

    /**
     * Atribut yang akan disembunyikan saat data model diserialisasi (misalnya ke JSON).
     * Menjaga agar data sensitif tidak bocor ke frontend/API.
     */
    protected $hidden = [
        'password',         // Jangan expose password
        'remember_token',   // Token yang digunakan untuk remember me
    ];

    /**
     * Atribut yang akan otomatis di-cast ke tipe data tertentu.
     * 'password' => 'hashed' artinya akan otomatis di-hash saat diset.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // Di-cast jadi objek DateTime
            'password' => 'hashed',             // Password otomatis di-hash
        ];
    }
}
