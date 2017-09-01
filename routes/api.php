<?php

Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'jwt.auth'], function() {
    Route::get('/profile', 'Auth\AuthController@user');
    Route::get('/dashboard', 'DashboardController@get');
});
