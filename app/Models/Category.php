<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_en',
        'category_slug_en',
        'description',
        'category_icon',
        'category_image',
        'category_banner_image'
    ];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class, 'category_id', 'id');
    }
      public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
 public function merchants()
    {
        return $this->hasMany(Merchant::class, 'category_id');
    }
}
