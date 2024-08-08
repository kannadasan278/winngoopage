<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'range',
        'price',
        'vat',
        'total_price'
    ];

     public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}

