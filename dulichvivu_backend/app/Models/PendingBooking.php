<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PendingBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'departure_id',
        'customer_information_id',
        'user_id',
        'code',
        'start_date',
        'end_date',
        'number_adults',
        'number_children',
        'price_adult',
        'price_child',
        'total_price',
        'payment_method',
        'note',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

        protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            do {
                $code = 'DLVV' . strtoupper(Str::random(6));
            } while (self::where('code', $code)->exists());

            $booking->code = $code;
        });
    }
}
