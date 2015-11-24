<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends ApiController
{
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
     * Display the specified user's profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProfile($id)
    {
        $user = User::findorFail($id, ['id', 'name', 'email', 'level', 'created_at']);

        $user->nCoins = Auth::user()->copies()->count();
        $collection = $this->getUserCollection(Auth::id());

        return view('users.show', compact('user', 'collection'));
    }

    /**
     * Show the form for editing the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEdit()
    {
        return view('users.edit')->with(['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function patchUpdate(Request $request)
    {
        Auth::user()->update($request->all());

        Session::flash('alert-message', 'Perfil editado com sucesso.');
        Session::flash('alert-type', 'alert-success');

        return Redirect::action('UsersController@getProfile', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
