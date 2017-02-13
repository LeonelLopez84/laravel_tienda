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
        $this->middleware('shopping_cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
