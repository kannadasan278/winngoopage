<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Define the table if not using the default naming convention
    protected $table = 'reviews';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'merchant_id',
        'name',
        'email',
        'website',
        'comment',
        'rating',
        'status'
    ];

    // Define the relationship with merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
