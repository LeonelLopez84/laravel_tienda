<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Ecommerce\Http\Requests;

class MainController extends Controller
{
    public function  home()
    {

        return view("main.home");
    }
    
}
