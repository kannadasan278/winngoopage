<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Automotive',
            'Fashion & Clothing',
            'Household & Garden',
            'Sports & Leisure',
            'Holiday & Travel',
            'Health & Beauty',
            'Food & Drinks',
            'Utilities & Telecom',
            'Entertainment',
            'Flowers & Gifts',
            'Supermarkets',
            'Toys & Games',
            'Pet & Vet',
            'Properties',
            'Professional Services',
            'Medical & Insurance',
            'Finance',
            'Office & Business',
            'Others'
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name_en' => $category,
                'category_slug_en' => Str::slug($category),
                'category_icon' => 'fa fa-shopping-bag',
                'category_image' => 'default.jpg',
                'category_banner_image' => 'default.jpg',
            ]);
        }
    }
}
