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

Route::resource('/tags','TagsController');
Route::resource('/categories','CategoriesController');

Route::resource('/products','ProductsController');
Route::resource('/images','ImagesController');


Route::get('/carrito', 'ShoppingCartController@index');
Route::post('/carrito', 'ShoppingCartController@checkout');

Route::resource('/compras', 'ShoppingCartController@show');

Route::get('/payments/store', 'PaymentsController@store');

Route::resource('/in_shopping_carts','InShoppingCartController',
		['only'=>['store','destroy'] ]);

Route::resource('/orders','OrdersController',
	  ['only'=>['index','update'] ]);

Route::get('products/images/{filename}',function($filename){

	$path=storage_path("app/images/$filename");

	if(!\File::exists($path)) abort(404);

	$file = \File::get($path);

	$type =\File::mimeType($path);

	$response = Response::make($file,200);

	$response->header("Content-Type",$type);

	return $response;

});






