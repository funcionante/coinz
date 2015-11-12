<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use Auth;

use App\User;

class VerificationController extends Controller
{

    /**
     * Verify an user's account.
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if ($user) {
            $user->setVerified();
            $user->save();

            Auth::login($user);

            Session::flash('alert_success', 'Conta ativada com sucesso.');

            return Redirect::action('CoinsController@index');
        }

        abort(404);
    }
}
