<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'flight_id',
        'flight_number',
        'departure_date',
        'status',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }

    public function userCustomer()
    {
        return $this->belongsTo(UserCustomer::class, 'user_id');
    }


}
