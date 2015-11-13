<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Copy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CopiesController extends Controller
{
    /**
     * Create a new copies controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('owner', ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new copy.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //save the specified coin id in the session for the next request
        Session::flash('coin_id', $id);
        return view('copies.create');
    }

    /**
     * Store a newly created copy in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $copy = new Copy($request->all());
        $copy->coin_id = Session::get('coin_id');

        Auth::user()->coins()->save($copy);

        Session::flash('alert-message', 'Exemplar adicionado com sucesso.');
        Session::flash('alert-type', 'alert-success');

        return Redirect::action('CoinsController@show', Session::get('coin_id'));
    }

    /**
     * Display the specified copy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified copy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $copy = Copy::findOrFail($id);
        Session::flash('coin_id', $id);

        return view('copies.edit', compact('copy'));
    }

    /**
     * Update the specified copy in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $copy = Copy::findOrFail($id);
        $copy->update($request->all());

        Session::flash('alert-message', 'Exemplar editado com sucesso.');
        Session::flash('alert-type', 'alert-success');

        return Redirect::action('CoinsController@show', $copy->coin->id);
    }

    /**
     * Remove the specified copy from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $copy = Copy::findOrFail($id);
        $coinId = $copy->coin->id;
        $copy->delete();

        Session::flash('alert_success', 'Exemplar eliminado com sucesso.');

        return Redirect::action('CoinsController@show', $coinId);
    }
}
