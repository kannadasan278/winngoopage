<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MerchantPrice;

class MerchantPriceSeeder extends Seeder
{
    public function run()
    {
        $merchantPrices = [
            ['type' => 'Business', 'range' => null, 'price' => 10, 'vat' => 2, 'total_price' => 12],
            ['type' => 'Francise/Multi Business', 'range' => '1 to 10', 'price' => 15, 'vat' => 3, 'total_price' => 18],
            ['type' => 'Francise/Multi Business', 'range' => '10+', 'price' => 25, 'vat' => 5, 'total_price' => 30],
            ['type' => 'Wholesalers', 'range' => null, 'price' => 10, 'vat' => 2, 'total_price' => 12],
            ['type' => 'Manufacturers', 'range' => null, 'price' => 10, 'vat' => 2, 'total_price' => 12],
            ['type' => 'Charity', 'range' => null, 'price' => 0, 'vat' => 0, 'total_price' => 0],
            ['type' => 'Place of Worship', 'range' => null, 'price' => 0, 'vat' => 0, 'total_price' => 0],
            ['type' => 'Others', 'range' => null, 'price' => 0, 'vat' => 0, 'total_price' => 0],
        ];

        foreach ($merchantPrices as $price) {
            MerchantPrice::create($price);
        }
    }
}

