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

class CoinsController extends ApiController
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
        $collection = $this->getUserCollection(Auth::id());
        $link = action('UsersController@show', Auth::id());

        return view('coins.index', compact('collection', 'title', 'link'));
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
