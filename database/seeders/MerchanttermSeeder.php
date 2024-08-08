<?php
namespace Database\Seeders;

use App\Models\Merchantterm;
use Illuminate\Database\Seeder;

class MerchanttermSeeder extends Seeder
{
    public function run()
    {
        // Generate 20 dummy Merchantterm articles using the MerchanttermFactory
        Merchantterm::factory()->count(1)->create();
    }
}
