<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'LoginController@show')->name("login");
