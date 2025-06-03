<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserCustomer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

        public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id');
    }

    public function savedFlights()
    {
        return $this->belongsToMany(Flight::class, 'save_flights', 'user_id', 'flight_id')
                    ->withTimestamps();
    }
}
