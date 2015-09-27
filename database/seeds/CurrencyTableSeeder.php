<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * The currencies table is initialized with the Euro currency.
     *
     * @return void
     */
    public function run()
    {
        $currency = ['Euro', '1999-01-01', '1'];

        App\Currency::create(['name' => $currency[0], 'begin' => $currency[1], 'user_id' => $currency[2]]);
    }
}
