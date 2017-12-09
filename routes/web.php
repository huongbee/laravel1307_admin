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

Route::post('admin-login',[
    'uses'=>'AdminController@postLogin',
    'as'=>'login'
]);


Route::get('admin-register',[
    'uses'=>'AdminController@getRegister',
    'as'=>'register'
]);
Route::post('admin-register',[
    'uses'=>'AdminController@postRegister',
    'as'=>'register'
]);


Route::group(['prefix'=>'admin','middleware'=>'checkLogin'], function () {
    Route::get('admin-logout',[
        'uses'=>'AdminController@getLogout',
        'as'=>'logout'
    ]);
    Route::get('/',[
    	'uses'=>'AdminController@getIndex',
    	'as'=>'homepage'
    ]);

    Route::get('list-product',[
    	'uses'=>'AdminController@getListProduct',
    	'as'=>'list-product'
    ]);

    Route::get('list-product-{id}',[
    	'uses'=>'AdminController@getListProductByType',
    	'as'=>'list-product-by-type'
    ]);

    Route::get('add-product',[
    	'uses'=>'AdminController@getAddProduct',
    	'as'=>'addProduct'
    ]);

    Route::post('add-product',[
    	'uses'=>'AdminController@postAddProduct',
    	'as'=>'addProduct'
    ]);


    Route::get('edit-product-{id}',[
    	'uses'=>'AdminController@getEditProduct',
    	'as'=>'editProduct'
    ]);

    Route::post('edit-product-{id}',[
    	'uses'=>'AdminController@postEditProduct',
    	'as'=>'editProduct'
    ]);

    Route::post('delete-product-{id}',[
    	'uses'=>'AdminController@postDeleteProduct',
    	'as'=>'deleteProduct'
    ]);








});

