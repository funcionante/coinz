<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
}
