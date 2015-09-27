<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(CoinTableSeeder::class);

        Model::reguard();
    }
}
