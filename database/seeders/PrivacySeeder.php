<?php
namespace Database\Seeders;

use App\Models\Privacy;
use Illuminate\Database\Seeder;

class PrivacySeeder extends Seeder
{
    public function run()
    {
        // Generate 20 dummy Privacy articles using the PrivacyFactory
        Privacy::factory()->count(1)->create();
    }
}
