<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'client_view'],function(){
	Route::get('/', function () {
	    return view('welcome');
	});

	// ========================

});




Route::get('admin-login',[
	'uses'=>'AdminController@getLogin',
	'as'=>'login'
]);
Route::group(['prefix'=>'admin'], function () {
    
    Route::get('/',[
    	'uses'=>'AdminController@getIndex',
    	'as'=>'homepage'
    ]);

    Route::get('list-product',[
    	'uses'=>'AdminController@getListProduct',
    	'as'=>'list-product'
    ]);
});

