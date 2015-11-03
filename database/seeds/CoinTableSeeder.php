<?php

use Illuminate\Database\Seeder;

class CoinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * The coins table is initialized with the first series of euro coins from all the countries in the euro area.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;

        for($i = 1; $i < 24; $i++)
        {
            $coins[] = [1, $i, 2, 0, 'media/coins/'.$id++.'_back.jpg', 1];
            $coins[] = [1, $i, 1, 0, 'media/coins/'.$id++.'_back.jpg', 1];
            $coins[] = [1, $i, 0.5, 0, 'media/coins/'.$id++.'_back.jpg', 1];
            $coins[] = [1, $i, 0.2, 0, 'media/coins/'.$id++.'_back.jpg', 1];
            $coins[] = [1, $i, 0.1, 0, 'media/coins/'.$id++.'_back.jpg', 1];
            $coins[] = [1, $i, 0.05, 0, 'media/coins/'.$id++.'_back.jpg', 1];
            $coins[] = [1, $i, 0.02, 0, 'media/coins/'.$id++.'_back.jpg', 1];
            $coins[] = [1, $i, 0.01, 0, 'media/coins/'.$id++.'_back.jpg', 1];
        }

        foreach($coins as $coin) {
            App\Coin::create(['currency_id' => $coin[0], 'country_id' => $coin[1], 'value' => $coin[2], 'commemorative' => $coin[3], 'img_back' => $coin[4], 'user_id' => $coin[5]]);
        }
    }
}
