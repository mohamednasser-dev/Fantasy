<?php
	use Illuminate\Support\Facades\Route;
	Route::get('/', function () {
	    return view('auth/login');
	});
	
	// all type of users have appelety to view all this routes ..
	// this route for login and register
	Auth::routes();
	// Route::view('forgot_password', 'auth.reset_password')->name('password.reset');
	Route::get('forgot', 'ForgotPasswordController@forgot');
	Route::post('reset', 'ForgotPasswordController@reset');
	Route::get('support', 'Guest\supportController@index');
    Route::get('fLoop', 'Admin\MatchesController@fLoop');
	Route::group(['middleware' => ['auth']], function (){
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('matches', 'Admin\MatchesController@index');
	});

	Route::group(['middleware' => ['auth','monitor']], function (){
		Route::get('monitor_match/{match_id}', 'Admin\MatchesController@monitor_match');
		Route::post('monitor_match/store', 'Admin\MatchesController@store_match_event');
		Route::post('monitor_match/destroy', 'Admin\MatchesController@match_destroy');
		//match formation
		Route::get('match/{match_id}/{home_id}/{away_id}/view_match_formation', 'Editor\ClubFormationsController@index');
		Route::post('club_formations/store', 'Editor\ClubFormationsController@store');
		Route::post('club_formations/store_away', 'Editor\ClubFormationsController@store_away');
		Route::get('club_formations/{id}/delete', 'Editor\ClubFormationsController@destroy');
		Route::get('club_formations/delete_formation', 'Editor\ClubFormationsController@destroy_formation');
		Route::post('getPlayerInfo', 'Editor\ClubFormationsController@getPlayerInfo');
		Route::post('getPlayerInfo_away', 'Editor\ClubFormationsController@getPlayerInfo_away');
	});

	Route::group(['middleware' => ['auth','editor']], function (){
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
		Route::get('tournaments/{status}/{tour_id}/{type}/change_tour_status', 'Admin\TournamentsController@change_tour_status');
		//tournament gwalat routes
		Route::get('gwalat/{id}', 'Admin\TournamentsController@gwalat');
		Route::get('gwalat/{id}/create', 'Admin\TournamentsController@create_gawla');
		Route::post('gwalat/store', 'Admin\TournamentsController@store_gawla');
		Route::get('gwalat/{id}/delete', 'Admin\TournamentsController@destroy_gawla');
		Route::get('gwla_matches/{id}', 'Admin\MatchesController@gwla_matches');
		Route::get('gwla_matches/{status}/{id}/{tour_id}/change_gwla_status', 'Admin\TournamentsController@change_gwla_status');
		//match routes
		Route::post('matches/store', 'Admin\MatchesController@store');
		Route::get('matches/create', 'Admin\MatchesController@create');
		Route::get('matches/{gwla_id}/{home_id}/{away_id}/edit', 'Admin\MatchesController@edit');
		Route::post('matches/{gwla_id}/{home_id}/{away_id}/update', 'Admin\MatchesController@update');
		Route::get('matches/{gwla_id}/{home_id}/{away_id}/delete', 'Admin\MatchesController@destroy');
		Route::get('GetGwalat/{id}', 'Admin\MatchesController@GetGwalat');
		Route::get('GetClubs/{id}', 'Admin\MatchesController@GetClubs');
		Route::get('GetTours/{id}', 'Admin\MatchesController@GetTours');
		//News
		//  news category routes
		Route::resource('categories', 'Admin\CategoryController');
		Route::get('categories/{id}/delete', 'Admin\CategoryController@destroy');
		//  news  routes
		Route::resource('news', 'Admin\NewsController');
		Route::get('news/{id}/delete', 'Admin\NewsController@destroy');
		// Target news
		Route::get('news_target/{id}/delete', 'Admin\NewsController@destroyTarget');
		// sponser image routes
		Route::resource('sponsers', 'Admin\sponserController');
		Route::get('sponsers/{id}/delete', 'Admin\sponserController@destroy');
	});

	Route::group(['middleware' => ['auth','admin']], function () {
			//  users  routes
		Route::resource('users', 'Admin\usersController');
		Route::get('users/{id}/delete', 'Admin\usersController@destroy');
		// editors and monitors routes
		Route::get('editors', 'Admin\usersController@all_editors');
		Route::get('editors/create', 'Admin\usersController@create_editor');
		Route::post('editors/store', 'Admin\usersController@store_editor');
		Route::get('editors/{id}/delete', 'Admin\usersController@destroy');
		Route::get('monitor_Clubs/{user_id}', 'Admin\usersController@monitor_Clubs');
		Route::get('monitor_Clubs/{id}/create', 'Admin\usersController@create_monitor_clubs');
		Route::post('monitor_Clubs/store', 'Admin\usersController@store_monitor_clubs');
		Route::get('monitor_clubs/{club_id}/delete', 'Admin\usersController@destroy_monitor_club');
	});



