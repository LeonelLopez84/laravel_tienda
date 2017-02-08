<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Http\Requests;

use Ecommerce\ShoppingCart;
use Ecommerce\PayPal;
use Ecommerce\Order;

class PaymentsController extends Controller
{
    public function store(Request $request)
    {
    	$shopping_cart_id=\Session::get("shopping_cart_id");

         $shopping_cart= ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

         $paypal=  new PayPal($shopping_cart);

         $response = $paypal->execute($request->paymentId,$request->PayerID);

         if($response->state == "approved"){
         	$order= Order::CreateFromPayPalResponse($response,$shopping_cart);
         }

         return view("shopping_cart.completed",["shopping_cart",$shopping_cart,"order"=>$order]);
    }
}
