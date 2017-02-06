<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'MainController@home');

Route::get('/carrito', 'ShoppingCartController@index');

Route::get('/payments/store', 'PaymentsController@store');

Auth::routes();

Route::resource('/products','ProductsController');
Route::resource('/in_shopping_carts','InShoppingCartController',
	  ['only'=>['store','destroy']
	]);


Route::get('/home', 'HomeController@index');
