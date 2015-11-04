<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateCoinRequest;
use App\Http\Controllers\Controller;
use App\Country;
use App\Coin;
use Auth;
use DB;
use Image;

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

        // Organize data from $coins to a bidimensional array,
        // where the elements are the countries and each country has an array of coins.
        foreach ($coins as $coin)
        {
            // In the first loop, create the first element.
            if (!isset($country))
            {
                $country = $coin->name_pt;
                $data[$i = 0][] = $coin;
            }
            // When the country changes, create a new element.
            elseif ($coin->name_pt != $country)
            {
                $country = $coin->name_pt;
                $data[++$i][] = $coin;
            }
            // In the other cases, append a new coin to the current country.
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
        $countries = Country::orderBy('name_pt')->lists('name_pt', 'id');

        return view('coins.create')->with(compact('countries'));
    }

    /**
     * Store a newly created coin in storage.
     *
     * @param CreateCoinRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCoinRequest $request)
    {
        // The id will be the id from the last coin plus one.
        $coin_id = Coin::all('id')->last()->id + 1;

        // The convention for image name of the coin is "id_back.jpg".
        $file_name = 'media/coins/' . ($coin_id) . '_back.jpg';

        // To unify all the images, they are limited to 300x300 pixels and converted to JPEG.
        Image::make($request->file('img_back'))
            ->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save($file_name);

        $coin = new Coin($request->all());
        $coin->currency_id = 1;
        if ($request->commemorative == null){
            $coin->commemorative = 0;
        }
        $coin->img_back = $file_name;

        Auth::user()->coins()->save($coin);

        return Redirect::action('CoinsController@show', $coin_id);
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
