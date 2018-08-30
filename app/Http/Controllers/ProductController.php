<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        //
    }
    public function list($prodtype){
        switch($prodtype):
            case 'footwear' : return view ('customer.list_footwear'); break;
            case 'apparel' : return view ('customer.list_apparel'); break;
            case 'sportsbra' : return view ('customer.list_sportsbra'); break;
        endswitch;
    }
}
