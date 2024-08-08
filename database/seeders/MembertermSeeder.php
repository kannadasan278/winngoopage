<?php
namespace Database\Seeders;

use App\Models\Memberterm;
use Illuminate\Database\Seeder;

class MembertermSeeder extends Seeder
{
    public function run()
    {
        // Generate 20 dummy Memberterm articles using the MembertermFactory
        Memberterm::factory()->count(1)->create();
    }
}
