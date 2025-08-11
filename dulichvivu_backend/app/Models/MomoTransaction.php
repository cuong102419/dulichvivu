<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MomoTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'request_id',
        'trans_id',
        'order_type',
        'pay_type',
        'amount',
        'result_code',
        'message',
        'signature',
        'response_time'       
    ];
}
