<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
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

        $coins = DB::table('coins')->count();
        $copies = DB::table('copies')->count();
        $users = DB::table('users')->count();

        return view('pages.home', compact('coins', 'copies', 'users'));
    }
}
