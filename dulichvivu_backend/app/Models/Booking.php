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
        'customer_information_id',
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

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }

    public function customerInformation()
    {
        return $this->belongsTo(CustomerInformation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
