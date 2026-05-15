<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_code',
        'order_code',
        'amount',
        'method',
        'status',
        'paid_at',
        'notes',
    ];
}