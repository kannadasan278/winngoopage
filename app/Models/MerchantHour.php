<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantHour extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'merchant_hours';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merchant_id',
        'day_of_week',
        'status',
        'opening_time',
        'closing_time',
        'day_type',
        'day_order',
    ];

    /**
     * Get the merchant that owns the hour.
     */
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
