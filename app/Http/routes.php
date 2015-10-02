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

// Route::get('home', 'HomeController@index');

/*
 * auth
 */
Route::post('login','Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => '/'], function() {
	Route::resource('/', 'homeController');
    // Route::group(['middleware' => 'guest'], function(){
    //     // Route::resource('page', 'PageController');
    //     // Route::resource('article', 'ArticleController');
    //     // Route::resource('gallery', 'GalleryController');
    //     // Route::resource('user', 'UserController');

    //     // ...
    // });
});
//Route::get('/', 'homeController@index','middleware' => 'guest',['except' => 'getLogout']);
