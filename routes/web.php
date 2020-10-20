<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

// this route for login and register
Auth::routes();


Route::group(['middleware' => ['auth']],
    function () {
Route::get('/home', 'HomeController@index')->name('home');

//Club routes
Route::get('clubs', 'Admin\ClubsController@index');
Route::post('clubs/store', 'Admin\ClubsController@store');
Route::get('clubs/create', 'Admin\ClubsController@create');
Route::get('clubs/{id}/edit', 'Admin\ClubsController@edit');
Route::post('clubs/{id}/update', 'Admin\ClubsController@update');
Route::get('clubs/{id}/delete', 'Admin\ClubsController@destroy');

//Coach routes
Route::get('coaches', 'Admin\CoachesController@index');
Route::post('coaches/store', 'Admin\CoachesController@store');
Route::get('coaches/create', 'Admin\CoachesController@create');
Route::get('coaches/{id}/edit', 'Admin\CoachesController@edit');
Route::post('coaches/{id}/update', 'Admin\CoachesController@update');
Route::get('coaches/{id}/delete', 'Admin\CoachesController@destroy');

//player routes
Route::get('players', 'Admin\PlayersController@index');
Route::post('players/store', 'Admin\PlayersController@store');
Route::get('players/create', 'Admin\PlayersController@create');
Route::get('players/{id}/edit', 'Admin\PlayersController@edit');
Route::post('players/{id}/update', 'Admin\PlayersController@update');
Route::get('players/{id}/delete', 'Admin\PlayersController@destroy');

//player routes
Route::get('stadiums', 'Admin\StadiumsController@index');
Route::post('stadiums/store', 'Admin\StadiumsController@store');
Route::get('stadiums/create', 'Admin\StadiumsController@create');
Route::get('stadiums/{id}/edit', 'Admin\StadiumsController@edit');
Route::post('stadiums/{id}/update', 'Admin\StadiumsController@update');
Route::get('stadiums/{id}/delete', 'Admin\StadiumsController@destroy');

//tournament routes
Route::get('tournaments', 'Admin\TournamentsController@index');
Route::post('tournaments/store', 'Admin\TournamentsController@store');
Route::get('tournaments/create', 'Admin\TournamentsController@create');
Route::get('tournaments/{id}/edit', 'Admin\TournamentsController@edit');
Route::post('tournaments/{id}/update', 'Admin\TournamentsController@update');
Route::get('tournaments/{id}/delete', 'Admin\TournamentsController@destroy');

//match routes
Route::get('matches', 'Admin\MatchesController@index');
Route::post('matches/store', 'Admin\MatchesController@store');
Route::get('matches/create', 'Admin\MatchesController@create');
Route::get('matches/{id}/edit', 'Admin\MatchesController@edit');
Route::post('matches/{id}/update', 'Admin\MatchesController@update');
Route::get('matches/{id}/delete', 'Admin\MatchesController@destroy');

//News

//  news category routes
Route::resource('categories', 'Admin\CategoryController');
Route::get('categories/{id}/delete', 'Admin\CategoryController@destroy');

//  news  routes
Route::resource('news', 'Admin\NewsController');
Route::get('news/{id}/delete', 'Admin\NewsController@destroy');


//  users  routes
Route::resource('users', 'Admin\usersController');
Route::get('users/{id}/delete', 'Admin\usersController@destroy');

});

