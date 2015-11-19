<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * The countries table is initialized with all the countries in the euro area.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['Andorra', 'Andorra', 1],
            ['Austria', 'Áustria', 1],
            ['Belgium', 'Bélgica', 1],
            ['Cyprus', 'Chipre', 1],
            ['Estonia', 'Estónia', 1],
            ['Finland', 'Finlândia', 1],
            ['France', 'França', 1],
            ['Germany', 'Alemanha', 1],
            ['Greece', 'Grécia', 1],
            ['Ireland', 'Irlanda', 1],
            ['Italy', 'Itália', 1],
            ['Latvia', 'Letónia', 1],
            ['Lithuania', 'Lituânia', 1],
            ['Luxembourg', 'Luxemburgo', 1],
            ['Malta', 'Malta', 1],
            ['Monaco', 'Mónaco', 1],
            ['Netherlands', 'Holanda', 1],
            ['Portugal', 'Portugal', 1],
            ['San Marino', 'São Marino', 1],
            ['Slovakia', 'Eslováquia', 1],
            ['Slovenia', 'Eslovénia', 1],
            ['Spain', 'Espanha', 1],
            ['Vatican City', 'Cidade do Vaticano', 1]
        ];

        foreach($countries as $country){
            App\Country::create(['name' => $country[0], 'name_pt' => $country[1], 'user_id' => $country[2]]);
        }
    }
}
