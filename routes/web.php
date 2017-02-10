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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/products','ProductsController');

Route::get('/carrito', 'ShoppingCartController@index');
Route::resource('/compras', 'ShoppingCartController@show');

Route::get('/payments/store', 'PaymentsController@store');

Route::resource('/in_shopping_carts','InShoppingCartController',
	  ['only'=>['store','destroy'] ]);

Route::resource('/orders','OrdersController',
	  ['only'=>['index','update'] ]);






