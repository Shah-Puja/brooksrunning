<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class meet_brooksController extends Controller
{
    public function index($meet_brooks_pg){
        return view('meet_brooks.'.$meet_brooks_pg);
    }
}

