<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Support\Facades\Auth;
use App\Match;
use Carbon\Carbon;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // to select today date ..
        $mytime = Carbon::now();
        $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');

        $matches = Match::where('date', $today)->get();
        return view('home',\compact('matches'));

    }
}
