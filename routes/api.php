<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/restaurants', 'Api\RestaurantController@index');
Route::get('/users', 'Api\UserController@index');
Route::get('/categories', 'Api\CategoryController@index');
