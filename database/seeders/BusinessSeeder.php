<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessSeeder extends Seeder
{
    public function run()
    {
        $businesses = [
            'Business',
            'Francise/Multi Business',
            'Wholesaler',
            'Manufacture',
            'Charity',
            'Place of Worship',
            'Others'
        ];

        foreach ($businesses as $business) {
            Business::create(['name' => $business]);
        }
    }
}

