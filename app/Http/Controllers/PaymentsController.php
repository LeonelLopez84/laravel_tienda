<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Http\Requests;

use Ecommerce\ShoppingCart;
use Ecommerce\PayPal;
use Ecommerce\Order;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('shoppingcart');
    }

    public function store(Request $request)
    {
    	$shopping_cart = $request->shopping_cart;

         $paypal=  new PayPal($shopping_cart);

         $response = $paypal->execute($request->paymentId,$request->PayerID);

         if($response->state == "approved"){
            
         	$order= Order::createFromPayPalResponse($response,$shopping_cart);
            \Session::remove("shopping_cart_id");
            $shopping_cart->approve();
         }
        return view("shopping_cart.completed",["shopping_cart"=>$shopping_cart,"order"=>$order]);
    }
}
