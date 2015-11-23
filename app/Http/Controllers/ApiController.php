<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Get a list of all the countries.
     *
     * @return array
     */
    public function getCountries()
    {
        return DB::table('countries')->orderBy('name_pt')->lists('name_pt');
    }

    /**
     * Get a listing of all the coins owned for a user by his id.
     *
     * @param $id
     * @return array
     */
    public function getUserCollection($id)
    {
        // Temporary!
        $query = 'SELECT t1.id, t1.name_pt, t1.value, t1.commemorative, t1.img_front, t1.img_back, t2.user_id FROM
                    (SELECT DISTINCT coins.id, countries.name_pt, coins.value, coins.commemorative, coins.img_front, coins.img_back
                      FROM coins, countries, currencies
                      WHERE
                        currencies.id = 1
                        AND coins.currency_id = currencies.id
                        AND coins.country_id = countries.id
                    ) t1
                    LEFT JOIN
                    (SELECT DISTINCT coins.id, copies.user_id
                      FROM copies, coins, countries, currencies
                      WHERE
                        currencies.id = 1
                        AND copies.user_id = ' . $id . '
                        AND copies.coin_id = coins.id
                        AND coins.currency_id = currencies.id
                        AND coins.country_id = countries.id
                    ) t2
                    ON t1.id = t2.id
                    ORDER BY t1.name_pt ASC, t1.commemorative ASC, t1.value DESC';

        $coins = DB::select( DB::raw($query) );

        // Organize data from $coins to a bidimensional array,
        // where the elements are the countries and each country has an array of coins.
        foreach ($coins as $coin) {
            // In the first loop, create the first element.
            if (!isset($country)) {
                $country = $coin->name_pt;
                $collection[$i = 0][] = $coin;
            }
            // When the country changes, create a new element.
            elseif ($coin->name_pt != $country) {
                $country = $coin->name_pt;
                $collection[++$i][] = $coin;
            }
            // In the other cases, append a new coin to the current country.
            else {
                $collection[$i][] = $coin;
            }
        }

        return $collection;
    }
}
