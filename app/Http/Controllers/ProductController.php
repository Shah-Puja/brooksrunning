<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($name,$style,$color){
        echo "<br> name=$name,style=$style,color=$color";
        //
    }
    public function list($prodtype){
        return view ('customer.list_' . $prodtype);
    }

}
