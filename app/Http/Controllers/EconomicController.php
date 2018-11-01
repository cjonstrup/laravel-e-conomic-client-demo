<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use Illuminate\Http\Request;

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
        print_r($request->all('token'));
    }
}
