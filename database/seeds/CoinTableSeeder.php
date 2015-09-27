<?php

use Illuminate\Database\Seeder;

class CoinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * The coins table is initialized with all the coins from Austria and Belgium.
     *
     * @return void
     */
    public function run()
    {
        $coins = [
            [1, 2, 2, 0, 'media/coins/1_back.jpg', 1],
            [1, 2, 1, 0, 'media/coins/2_back.jpg', 1],
            [1, 2, 0.5, 0, 'media/coins/3_back.jpg', 1],
            [1, 2, 0.2, 0, 'media/coins/4_back.jpg', 1],
            [1, 2, 0.1, 0, 'media/coins/5_back.jpg', 1],
            [1, 2, 0.05, 0, 'media/coins/6_back.jpg', 1],
            [1, 2, 0.02, 0, 'media/coins/7_back.jpg', 1],
            [1, 2, 0.01, 0, 'media/coins/8_back.jpg', 1],

            [1, 3, 2, 0, 'media/coins/9_back.jpg', 1],
            [1, 3, 1, 0, 'media/coins/10_back.jpg', 1],
            [1, 3, 0.5, 0, 'media/coins/11_back.jpg', 1],
            [1, 3, 0.2, 0, 'media/coins/12_back.jpg', 1],
            [1, 3, 0.1, 0, 'media/coins/13_back.jpg', 1],
            [1, 3, 0.05, 0, 'media/coins/14_back.jpg', 1],
            [1, 3, 0.02, 0, 'media/coins/15_back.jpg', 1],
            [1, 3, 0.01, 0, 'media/coins/16_back.jpg', 1],
        ];

        foreach($coins as $coin) {
            App\Coin::create(['currency_id' => $coin[0], 'country_id' => $coin[1], 'value' => $coin[2], 'commemorative' => $coin[3], 'img_back' => $coin[4], 'user_id' => $coin[5]]);
        }
    }
}
