<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ecommerce\Http\Requests;

use Ecommerce\Product;
use Ecommerce\Categorie;
use Ecommerce\Image;


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
        $categories=[];
        foreach(Categorie::where('categorie_id', '=', '0')->get() as $k=>$val){
            $categories[$val->id]=$val->name;
        }
        
        return view("products.create",['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        

        $Product = new Product;
       
        $Product->title=$request->title;
        $Product->description = $request->description;
        $Product->pricing = $request->pricing;
        $Product->categorie_id = $request->categorie;
        $Product->user_id = Auth::id();

        if($Product->save())
        {
             foreach($request->images as $img){

                $hasFile  = $request->hasFile('images') && $img->isValid();

                 if($hasFile){
                    $Image=new Image;
                    $Image->extension = $img->extension();
                    $Image->product_id = $Product->id;
                    $Image->save();
                    $Image->name = $Image->id .'.'.$Image->extension;
                    $Image->save();
                    $img->storeAs('images',$Image->name);
                }
            }

            $Product->tag($request->tags);

            $Product->save();
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
        $categories=[];
        foreach(Categorie::where('categorie_id', '=', '0')->get() as $k=>$val){
            $categories[$val->id]=$val->name;
        }
        
       
        $tags=array();
        foreach($product->tags as $val){
            $tags[]=$val->name;
        }
        
        $tags=implode(',',$tags);

        return view("products.edit",["product"=>$product,'categories'=>$categories,'tags'=>$tags]);
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
        $Product->categorie_id = $request->categorie;
        $Product->setTags($request->tags);
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
