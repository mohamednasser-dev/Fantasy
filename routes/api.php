<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'API\AuthController@login');
Route::post('logout', 'API\AuthController@logout');

Route::post('register', 'API\UserApiController@store');
Route::post('salonHome', 'API\HomeApiController@index');

Route::post('products', 'API\productApiController@allProducts');

Route::post('services', 'API\serviceApiController@allServices');

Route::post('servicesWithCat', 'API\serviceApiController@servicesWithCat');
Route::post('productsWithCat', 'API\productApiController@productsWithCat');

Route::post('selectedSalon', 'API\HomeApiController@selectedSalon');
Route::post('service_offers', 'API\serviceApiController@service_offers');

Route::post('products_offers', 'API\productApiController@products_offers');


Route::post('categoryProduct', 'API\productApiController@CategoryProduct');
Route::post('categoryService', 'API\serviceApiController@CategoryService');

Route::post('updateProfil', 'API\UserApiController@updateProfil');

Route::post('products_offers_withCat', 'API\productApiController@products_offers_withCat');
Route::post('service_offers_withCat', 'API\serviceApiController@service_offers_withCat');


Route::post('products_offers_withCat','API\productApiController@products_offers_withCat');
Route::post('service_offers_withCat','API\serviceApiController@service_offers_withCat');

Route::post('productsWithName','API\productApiController@products_with_Name');
Route::post('servicesWithName','API\serviceApiController@service_with_Name');

Route::post('changePass','API\UserApiController@changePass');
Route::post('update_logo','API\UserApiController@update_logo');


Route::post('user_reservation','API\ReservationController@user_reservation');
Route::post('reservation_with_status','API\ReservationController@reservation_with_status');





Route::post('addtocart','API\CartController@addToCart');
Route::post('allCart','API\CartController@allCart');
Route::post('availabletime','API\CartController@availabletime');
Route::post('checkout','API\CartController@checkout');
Route::post('reservation','API\CartController@reservation');
Route::post('addcount','API\CartController@addcount');
Route::post('minuscount','API\CartController@minuscount');
Route::post('editServiceCart','API\CartController@editServiceCart');
Route::post('deleteCart','API\CartController@deleteCart');
Route::post('cancelreservation','API\CartController@cancelReservation');



Route::post('productsWithName','API\productApiController@products_with_Name');
Route::post('servicesWithName','API\serviceApiController@service_with_Name');

Route::post('cartcount', 'API\CartController@cartcount');


Route::post('productsWithName', 'API\productApiController@products_with_Name');
Route::post('servicesWithName', 'API\serviceApiController@service_with_Name');
