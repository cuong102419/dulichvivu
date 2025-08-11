<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkRedirect extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'url'
    ];
}
