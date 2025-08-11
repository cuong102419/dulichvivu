<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'trans_id',
        'payer_id',
        'payer_email',
        'payer_name',
        'country_code',
        'status',
        'amount',
        'currency',
    ];
}
