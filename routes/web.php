<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', 'UsersController@index')->name('users.index');
Route::get('users/{user}', 'UsersController@show')->name('users.show');

Route::get('offers', 'OffersController@index')->name('offers.index');
Route::get('offers/{offer}', 'OffersController@show')->name('offers.show');

// Route::get('/home', 'HomeController@index')->name('home');
