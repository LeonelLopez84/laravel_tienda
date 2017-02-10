<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Http\Requests;

use Ecommerce\ShoppingCart;
use Ecommerce\PayPal;

class ShoppingCartController extends Controller
{
 
 	public function show($id)
 	{
 		$shopping_cart = ShoppingCart::where('customid',$id)->first();
 		$order = $shopping_cart->order();
 		return view("shopping_cart.completed",["shopping_cart"=>$shopping_cart,"order"=>$order]);
 	}

 	public function index()
 	{
 		$shopping_cart_id=\Session::get("shopping_cart_id");

      	$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

      	$paypal = new PayPal($shopping_cart);

      	$payment = $paypal->generate();

      	return redirect($payment->getApprovalLink());      
 	}

}
