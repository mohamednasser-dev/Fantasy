<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

	//this routes for user actions
	Route::post('login', 'Api\AuthController@login');
	Route::post('logout', 'Api\AuthController@logout');
    // Route::post('password/forgot', 'Api\ManulPasswordController@forgot');
    // Route::post('password/reset', 'Api\ManulPasswordController@reset'); 
    
    Route::post('password/forgot', 'ForgotPasswordController@forgot');
    Route::post('password/reset', 'ForgotPasswordController@reset');

	Route::post('register', 'Api\AuthController@store');
	Route::post('update_user_data', 'Api\AuthController@update_user_data');
	Route::post('select_user_data', 'Api\AuthController@select_user_data');
	Route::post('select_top_ten', 'Api\AuthController@select_top_ten');
	Route::post('rank_user', 'Api\AuthController@rank_user');
	//matches
	//main home page 
	Route::post('today_matches', 'Api\MatchesController@today_matches');
	Route::post('match_by_date', 'Api\MatchesController@match_by_date');
	Route::post('results_by_match_id', 'Api\MatchesController@results_by_match_id');
	Route::post('last_results', 'Api\MatchesController@last_results');
	// Squad Routes
	Route::post('select_squad', 'Api\SquadsController@select_squad');
	Route::post('store_squad', 'Api\SquadsController@store_squad');
	Route::post('store_squad_player', 'Api\SquadsController@store_squad_player');
	Route::post('update_squad_player', 'Api\SquadsController@update_squad_player');
	Route::post('test_gwla_open', 'Api\SquadsController@test_gwla_open');
	Route::post('test_squad', 'Api\SquadsController@test_squad');
	Route::post('update_squad_coach', 'Api\SquadsController@update_squad_coach');
	// to fill option component with data
	Route::post('coaches_by_classif', 'Api\CoachesController@coaches_by_classif');
	Route::post('players_by_classif', 'Api\PlayersController@players_by_classif');
	Route::post('clubs_by_classif', 'Api\ClubsController@clubs_by_classif');
	Route::post('players_by_club', 'Api\PlayersController@players_by_club');
	Route::post('remove_player_squad', 'Api\PlayersController@remove_player_squad');
	Route::post('transfer_player_position', 'Api\PlayersController@transfer_player_position');
	Route::post('player_info', 'Api\PlayersController@player_info');

	Route::post('my_squad', 'Api\SquadsController@index');
	//sponser images in Begain of application
	Route::get('sponsers', 'Api\AuthController@sponsers');



