<?php
namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run()
    {
        // Generate 20 dummy About articles using the AboutFactory
        About::factory()->count(1)->create();
    }
}
