<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "subcategory_name_en",
        "subcategory_slug_en",
        "category_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class,'subcategory_id', 'id');
    }
     public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }
}
