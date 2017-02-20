<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Http\Requests;

use Ecommerce\ShoppingCart;
use Ecommerce\PayPal;
use Ecommerce\Order;



class ShoppingCartController extends Controller
{
 
	public function __construct()
	{
		$this->middleware('shoppingcart');
	}

      public function checkout(Request $request)
      {
            $shopping_cart = $request->shopping_cart;

            $paypal = new PayPal($shopping_cart);

            $payment = $paypal->generate();

            return redirect($payment->getApprovalLink());
      }

 	public function show($id)
 	{
 		$shopping_cart = ShoppingCart::where('customid',$id)->first();
 		$order = $shopping_cart->order();
 		return view("shopping_cart.completed",["shopping_cart"=>$shopping_cart,"order"=>$order]);
 	}

 	public function index(Request $request)
 	{
 		$shopping_cart = $request->shopping_cart; 

      	$products = $shopping_cart->products()->get();

      	$total = $shopping_cart->total();

      	return view("shopping_cart.index",["products"=>$products,"total"=>$total]);
 	}

}
