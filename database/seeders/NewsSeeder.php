<?php
namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        // Generate 20 dummy news articles using the NewsFactory
        News::factory()->count(1)->create();
    }
}
