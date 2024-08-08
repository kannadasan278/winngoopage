<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'stripe_charge_id',
        'amount',
        'currency',
        'status',
        'description',
        'metadata',
        'coupon_type',
        'coupon_amount',
        'coupon_percentage'
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
