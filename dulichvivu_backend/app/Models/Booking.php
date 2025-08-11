<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'departure_id',
        'user_id',
        'admin_id',
        'code',
        'start_date',
        'end_date',
        'number_adults',
        'number_children',
        'price_adult',
        'price_child',
        'total_price',
        'payment_method',
        'payment_status',
        'status',
        'note'
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
