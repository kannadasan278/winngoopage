<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Authenticatable
{
    use HasFactory;

    protected $guard_name = 'merchant';

    protected $fillable = [
        'merchant_parent_id',
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'city',
        'post_code',
        'country',
        'phone_number',
        'referral_code',
        'business_name',
        'trading_name',
        'category_id',
        'othercategory',
        'sub_category_id',
        'othersubcategory',
        'is_franchise',
        'business_description',
        'trading_years',
        'discountType',
        'discount_percentage',
        'terms_and_conditions',
        'website_link',
        'image',
        'status',
        'business_type_id',
        'coupon_code',
        'rejected_comments',
        'rejected_reason'
    ];

    protected $hidden = [
        'password',
    ];
     protected $casts = [
        'category_id' => 'array',
        'sub_category_id' => 'array',
    ];
     public function categories()
    {
        return $this->hasMany(Category::class);
    }

     public function businessHours()
    {
        return $this->hasMany(MerchantHour::class);
    }
     public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
     public function businessType()
    {
        return $this->belongsTo(MerchantPrice::class);
    }
     public function taglines()
    {
        return $this->hasMany(Tagline::class);
    }
    // Relationship with the parent Merchant
    public function parent()
    {
        return $this->belongsTo(Merchant::class, 'merchant_parent_id');
    }

    // Relationship with the children Merchants
    public function children()
    {
        return $this->hasMany(Merchant::class, 'merchant_parent_id');
    }
     public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

