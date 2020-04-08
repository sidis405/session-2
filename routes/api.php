<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// offers
// offer/{id}

Route::get('users', 'UsersController@index')->name('users.index');
Route::get('users/{user}', 'UsersController@show')->name('users.show');

Route::get('offers', 'OffersController@index')->name('offers.index');
Route::get('offers/{offer}', 'OffersController@show')->name('offers.show');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
