<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;

class CoinsController extends Controller
{
    /**
     * Create a new coins controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of all the coins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                        AND copies.user_id = ' . Auth::id() . '
                        AND copies.coin_id = coins.id
                        AND coins.currency_id = currencies.id
                        AND coins.country_id = countries.id
                    ) t2
                    ON t1.id = t2.id
                    ORDER BY t1.name_pt ASC, t1.commemorative ASC, t1.value DESC';

        $coins = DB::select( DB::raw($query) );

        # organize data from $coins to a bidimensional array,
        # where the elements are the countries and each country has an array of coins.
        foreach ($coins as $coin)
        {
            # in the first loop, create the first element
            if (!isset($country))
            {
                $country = $coin->name_pt;
                $data[$i = 0][] = $coin;
            }
            # when the country changes, create a new element
            elseif ($coin->name_pt != $country)
            {
                $country = $coin->name_pt;
                $data[++$i][] = $coin;
            }
            # in the other cases, append a new coin to the current country
            else
            {
                $data[$i][] = $coin;
            }
        }

        return view('coins.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new coin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Form.";
    }

    /**
     * Store a newly created coin in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified coin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coin = DB::table('coins')
            ->join('currencies', 'currencies.id', '=', 'coins.currency_id')
            ->join('countries', 'countries.id', '=', 'coins.country_id')
            ->select('coins.id', 'coins.value', 'coins.img_back', 'currencies.name as currency', 'countries.name_pt as country')
            ->where('coins.id', '=', $id)
            ->first();

        $copies = DB::table('copies')
            ->where('coin_id', '=', $id)
            ->where('user_id', '=', Auth::id())
            ->select('id', 'year', 'state', 'observations')
            ->get();

        return view('coins.show')->with(compact('coin', 'copies'));
    }

    /**
     * Show the form for editing the specified coin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified coin in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified coin from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
