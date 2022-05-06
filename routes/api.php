<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/restaurants', 'Api\RestaurantController@index');
