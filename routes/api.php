<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// users
// users/{id}
// me
// offers
// offer/{id}

Route::get('users', 'UsersController@index')->name('users.index');
Route::get('users/{user}', 'UsersController@show')->name('users.show');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
