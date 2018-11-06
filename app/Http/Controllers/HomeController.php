<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Lenius\Economic\RestClient;

class HomeController extends Controller
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
     *
     * @throws \Lenius\Economic\API\Exception
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $client = new RestClient(env('ECONOMIC_SECRET_TOKEN'), $user->economic_token);

        $parms = ['pagesize' => 10];

        $response = $client->request->get('products', $parms);

        $status = $response->httpStatus();

        $data = [];

        if ($status == 200) {
            // Successful request
            $data = $response->asArray();
            $data['products'] = $data['collection'];
        }



        return view('home')->with($data);
    }
}
