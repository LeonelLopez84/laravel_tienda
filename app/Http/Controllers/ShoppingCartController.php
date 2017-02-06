<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Http\Requests;

use Ecommerce\ShoppingCart;

class ShoppingCartController extends Controller
{
 
 		public function index()
 		{
 			$shopping_cart_id=\Session::get("shopping_cart_id");

      $shopping_cart= ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

      $products = $shopping_cart->products()->get();

      $total = $shopping_cart->total();

      return view("shopping_cart.index",["products"=>$products,"total"=>$total]);
 		}
}
