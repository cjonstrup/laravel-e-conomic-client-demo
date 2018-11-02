<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class EconomicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth()
    {
        return redirect()->away('https://secure.e-conomic.com/secure/api1/requestaccess.aspx?appPublicToken=' . env('ECONOMIC_PUBLIC_TOKEN') . '&redirectUrl=' . route('economic.token'));
    }

    public function save(TokenRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->economic_token = $request->get('token');

        if ($user->save()) {
            Flash::message('Your account has been updated!');

            return Redirect::to('/');
        }

        return Redirect::to('/');
    }
}
