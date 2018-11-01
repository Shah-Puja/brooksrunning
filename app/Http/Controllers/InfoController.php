<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
  public function index($pg){ 
   
      return view( 'info.'.$pg);
  }
  public function help()
	{
		return view( 'info.help');
    }

    public function store_locator(){
      return view( 'info.store_locator');
    }
}
