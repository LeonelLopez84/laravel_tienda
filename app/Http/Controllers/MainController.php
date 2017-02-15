<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Http\Requests;
use Ecommerce\Product;

class MainController extends Controller
{
    public function  home()
    {
    	$products=Product::latest()->simplePaginate(12);

        return view("main.home",["products"=>$products]);
    }
    
}
