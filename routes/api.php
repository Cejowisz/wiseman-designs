<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('checkEmail', 'AuthController@checkEmail');
    Route::post('verifyemail', 'AuthController@verifyEmail');

    Route::group(['middleware' => ['jwt.auth', 'email.verify']], function() {
        Route::post('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });

    Route::get('token/refresh', 'AuthController@refresh');
});

// Property
Route::group(['namespace' => 'Property'], function() {
//    Route::group(['middleware' => ['jwt.auth', 'email.verify']], function() {
        Route::resource('property', 'PropertyController');
        Route::resource('property-description', 'PropertyDescriptionController');
        Route::resource('property-price', 'PropertyPriceController');
        Route::resource('property-photo', 'PropertyPhotoController');
        Route::resource('property-purpose', 'PropertyPurposeController');
        Route::resource('property-type', 'PropertyTypeController');
//    });
});


    Route::get('test', 'ProfileController@getThisUser');









