<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagline extends Model
{
    // Specify the table associated with the model if different from the default
    protected $table = 'taglines';

    // The attributes that are mass assignable
    protected $fillable = [
        'merchant_id',
        'tagline',
        'status',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'status' => 'string',
    ];

    // Define the relationship with the Merchant model
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
