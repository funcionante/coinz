<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    /**
     * Create a new pages controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'index']);
        $this->middleware('auth', ['only' => 'home']);
    }

    /** Show the main page of this app.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index');
    }

    /** Show the page with information about this app.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('pages.about');
    }

    /** Show the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {

        $nCoins = DB::table('coins')->count();
        $nCopies = DB::table('copies')->count();
        $nCopiesUser = Auth::user()->copies()->count();
        $nUsers = DB::table('users')->count();

        $coins = DB::table('coins')
            ->join('currencies', 'currencies.id', '=', 'coins.currency_id')
            ->join('countries', 'countries.id', '=', 'coins.country_id')
            ->orderBy('coins.created_at', 'desc')
            ->take(5)
            ->get(['coins.id', 'coins.value', 'currencies.name as currency', 'countries.name_pt as country', 'coins.created_at as date']);


        $copies = Auth::user()->copies()
            ->join('coins', 'coins.id', '=', 'copies.coin_id')
            ->join('currencies', 'currencies.id', '=', 'coins.currency_id')
            ->join('countries', 'countries.id', '=', 'coins.country_id')
            ->orderBy('copies.created_at', 'desc')
            ->take(5)
            ->get(['coins.id', 'coins.value', 'currencies.name as currency', 'countries.name_pt as country', 'copies.created_at as date']);

        return view('pages.home', compact('nCoins', 'nCopies', 'nCopiesUser', 'nUsers', 'coins', 'copies'));
    }
}
