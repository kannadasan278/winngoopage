<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(IconSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(PrivacySeeder::class);
        $this->call(MembertermSeeder::class);
        $this->call(MerchanttermSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(MerchantPriceSeeder::class);
    }
}
