<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//this routes for user actions
Route::post('login', 'Api\AuthController@login');
Route::post('logout', 'Api\AuthController@logout');
Route::post('register', 'Api\AuthController@store');
Route::post('update_user_data', 'Api\AuthController@update_user_data');
Route::post('select_user_data', 'Api\AuthController@select_user_data');
Route::post('select_top_ten', 'Api\AuthController@select_top_ten');


//main home page 
Route::post('today_matches', 'Api\MatchesController@today_matches');

// Squad Routes
Route::post('store_squad', 'Api\SquadsController@store_squad');
Route::post('store_squad_player', 'Api\SquadsController@store_squad_player');

// to fill option component with data
Route::post('coaches_by_classif', 'Api\CoachesController@coaches_by_classif');
Route::post('players_by_classif', 'Api\PlayersController@players_by_classif');
Route::post('clubs_by_classif', 'Api\ClubsController@clubs_by_classif');
Route::post('players_by_club', 'Api\PlayersController@players_by_club');

Route::post('remove_player_squad', 'Api\PlayersController@remove_player_squad');
Route::post('transfer_player_position', 'Api\PlayersController@transfer_player_position');




Route::post('my_squad', 'Api\SquadsController@index');


