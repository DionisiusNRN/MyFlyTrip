<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'airline', 'departure', 'destination',
        'departure_time', 'arrival_time', 'price'
    ];

    protected $casts = [
    'departure_time' => 'datetime',
    'arrival_time' => 'datetime',
];

}
