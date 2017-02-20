<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Product;
use Illuminate\Support\Facades\Auth;
use Ecommerce\Http\Requests;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view("products.index",['productos'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=new Product;
        return view("products.create",['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();

        $Product=new Product;

        $Product->title=$request->title;
        $Product->description = $request->description;
        $Product->pricing = $request->pricing;
        $Product->user_id = Auth::id();

        if($hasFile){
            $Product->extension = $request->cover->extension();

        }

        if($Product->save())
        {
            if($hasFile){
                $request->cover->storeAs('images',"{$Product->id}.{$Product->extension}");
            }

            return redirect("/products");
        }else{
            return view("products.create",["product"=>$product]);
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
        $product=Product::find($id);
        return view("products.show",["product"=>$product]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view("products.edit",["product"=>$product]);
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
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();
        
        $Product=Product::find($id);

        $Product->title=$request->title;
        $Product->description = $request->description;
        $Product->pricing = $request->pricing;
        $Product->user_id = Auth::id();

        if($hasFile){
            $Product->extension = $request->cover->extension();

        }

        if($Product->save())
        {
            if($hasFile){
                $request->cover->storeAs('images',"{$Product->id}.{$Product->extension}");
            }
            return redirect("/products");
        }else{
            return view("products.edit",["product"=>$product]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect("/products");
    }
}
