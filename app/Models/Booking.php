<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'flight_id',
        'flight_number',
        'departure_date',
        'status', // Misal: 'now' atau 'history'
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }
}
