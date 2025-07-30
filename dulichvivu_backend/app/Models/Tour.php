<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'slug',
        'duration',  
        'description',
        'rules',
        'total_day',
        'destination',
        'departure_location',
        'area',
        'reviews',
        'type',
        'status'
    ];

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function departures() {
        return $this->hasMany(Departure::class);
    }
}
