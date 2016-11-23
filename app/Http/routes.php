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
/*
Route::get('/{code}',[
    'uses'=>'LinksController@get',
    'as'=>'get'
]);
*/
Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        'as'   => 'home',
        'uses' => 'LinksController@index'
    ]);
Route::resource('links','LinksController');
Route::get('/{hash}',[
	'as'=>'hash',
	 'uses' => 'LinksController@redirecciona'
	]);
Route::auth();

Route::get('/home', 'HomeController@index');
    
});


