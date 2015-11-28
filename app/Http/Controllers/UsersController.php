<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

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
        $user = User::findorFail($id, ['id', 'name', 'email', 'avatar', 'level', 'created_at']);

        $user->nCoins = $user->copies()->count();
        $collection = $this->getUserCollection($user->id);

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
    public function patchUpdate(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->update($request->all());

        $image = $request->file('avatar');
        if($image != null) {
            // The convention for image name of the coin is "id.jpg".
            $file = 'media/users/' . ($user->id) . '.jpg';

            // To unify all the images, they are limited to 300x300 pixels and converted to JPEG.
            Image::make($image)
                ->fit(300)
                ->save($file);

            $user->avatar = $file;
            $user->save();
        }


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
