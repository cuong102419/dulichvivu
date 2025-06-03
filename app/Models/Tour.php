<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'time',  
        'image',
        'quantity',
        'price_adult',
        'price_child',
        'destination',
        'availability',
        'description',
        'reviews',
        'start_date',
        'end_date'
    ];

    public function timeline()
    {
        return $this->hasMany(Timeline::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
