<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Support\Facades\Auth;
use App\Match;



class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mytime = Carbon\Carbon::now();

        $matches = Match::where('date',$mytime->toDateTimeString());
        return view('home',\compact('matches'));
        return view('home');
    }
}
