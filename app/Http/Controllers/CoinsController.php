<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoinRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\User;
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
        $this->middleware('auth', ['except' => 'userCollection']);
        $this->middleware('verified', ['except' => ['index', 'userCollection']]);
        $this->middleware('manager', ['except' => ['index', 'userCollection', 'show']]);
    }

    /**
     * Display a listing of all the coins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->userCollection(Auth::id());
    }

    /**
     * Show the form for creating a new coin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name_pt')->lists('name_pt', 'id');

        return view('coins.create', compact('countries'));
    }

    /**
     * Store a newly created coin in storage.
     *
     * @param CoinRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoinRequest $request)
    {
        $coin = new Coin($request->all());

        Auth::user()->coins()->save($coin);

        $this->handleImage($coin, $request->file('img_back'));

        Session::flash('alert-message', 'Moeda adicionada com sucesso.');
        Session::flash('alert-type', 'alert-success');

        return Redirect::action('CoinsController@show', $coin->id);
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
            ->select('coins.id', 'coins.value', 'coins.img_back', 'coins.commemorative', 'currencies.name as currency', 'countries.name_pt as country')
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
        $coin = Coin::findOrFail($id);
        $countries = Country::orderBy('name_pt')->lists('name_pt', 'id');

        return view('coins.edit', compact('coin', 'countries'));
    }

    /**
     * Update the specified coin in storage.
     *
     * @param  CoinRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoinRequest $request, $id)
    {
        $coin = Coin::findOrFail($id);

        $coin->update($request->all());

        $this->handleImage($coin, $request->file('img_back'));

        Session::flash('alert-message', 'Moeda editada com sucesso.');
        Session::flash('alert-type', 'alert-success');

        return Redirect::action('CoinsController@show', $coin->id);
    }

    /**
     * Remove the specified coin from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coin = Coin::findOrFail($id);

        // delete image, if it exists
        $file = $coin->img_back;
        unlink($file);

        $coin->delete();

        Session::flash('alert_success', 'Moeda eliminada com sucesso.');

        return Redirect::action('CoinsController@index');
    }

    /**
     * Display a listing of all the coins owned for a user by his id.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function userCollection($id)
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

        $title = 'Coleção de ' . User::find($id)->name;
        $link = \Request::root() . '/user/' . + $id;

        return view('coins.index', compact('collection', 'title', 'link'));
    }

    /**
     * Save the image associated to a coin, if it exists.
     *
     * @param $coin
     * @param $image
     */
    private function handleImage($coin, $image)
    {
        if($image != null) {
            // The convention for image name of the coin is "id_back.jpg".
            $file = 'media/coins/' . ($coin->id) . '_back.jpg';

            // To unify all the images, they are limited to 300x300 pixels and converted to JPEG.
            Image::make($image)
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save($file);

            $coin->img_back = $file;
            $coin->save();
        }
    }
}
