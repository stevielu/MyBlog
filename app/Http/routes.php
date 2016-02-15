<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/pratice', 'Auth\praticeContoller@index');
Route::group(['prefix' => '/'], function() {
    Route::resource('/', 'homeController');
    Route::get('logout', 'Auth\AuthController@getLogout');
	Route::post('asynlogin', 'AsynAuthController@postLogin');
	Route::resource('login', 'Auth\AuthController');
    Route::resource('Article', 'ArticleController');
    Route::resource('Menu', 'MenuController');
	Route::group(['middleware' => 'auth'], function(){
        Route::resource('Albums', 'AlbumsController');
        Route::resource('photos', 'PhotoController',['except' => 'store']);
        Route::post('photos', 'PhotoController@store');
        Route::resource('userinfo', 'FileController');
        Route::post('Albums', 'AlbumsController@store');
        Route::post('photos/{id}', 'PhotoController@postUpdate');
    //     // Route::resource('article', 'ArticleController');
    //     // Route::resource('gallery', 'GalleryController');
    //     // Route::resource('user', 'UserController');

    //     // ...
    });
});
//Route::get('/', 'homeController@index','middleware' => 'guest',['except' => 'getLogout']);
