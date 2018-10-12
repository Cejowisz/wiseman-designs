<?php

Route::post('feedback', 'FeedbackController@store');


//Route::group(['namespace' => 'Auth'], function () {
//    Route::post('register', 'AuthController@register');
//    Route::post('login', 'AuthController@login');
//    Route::post('checkEmail', 'AuthController@checkEmail');
//    Route::post('verifyemail', 'AuthController@verifyEmail');
//
//    Route::group(['middleware' => ['jwt.auth', 'email.verify']], function() {
//        Route::post('logout', 'AuthController@logout');
//        Route::get('user', 'AuthController@user');
//    });
//
//    Route::get('token/refresh', 'AuthController@refresh');
//});














