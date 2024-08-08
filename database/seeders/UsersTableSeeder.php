<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'mobile_number' => '09965702481',
                'password' => Hash::make('1111'),
                'role' => 'admin',
                'status' => 'active',
            ],
           
              [
                'name' => 'Merchant',
                'email' => 'merchant@gmail.com',
                'mobile_number' => '09965502481',
                'password' => Hash::make('1111'),
                'role' => 'merchant',
                'status' => 'active',
            ],
        ];

        DB::table('users')->insert($data);
    }
}
