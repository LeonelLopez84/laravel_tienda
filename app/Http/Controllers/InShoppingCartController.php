<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Http\Requests;
use Ecommerce\InShoppingCart;
use Ecommerce\ShoppingCart;

class InShoppingCartController extends Controller
{

    public function __construct()
    {
        $this->middleware('shoppingcart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
    **/

    public function store(Request $request)
    {
        $shopping_cart  = $request->shopping_cart;

        $response=InShoppingCart::create([
            "shopping_cart_id"=>$shopping_cart->id,
            "product_id"=>$request->product_id
            ]);

        if($response)
        {
            return redirect('/carrito');
        }else{
            return back();;
        }
    }
}
