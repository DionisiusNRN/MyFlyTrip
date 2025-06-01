<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'transaction_id',
        'payment_type',
        'amount',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
