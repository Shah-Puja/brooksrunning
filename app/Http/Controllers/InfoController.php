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
<<<<<<< HEAD
    public function sitemap()
	{
		return view( 'info.sitemap');
=======

    public function store_locator(){
      return view( 'info.store_locator');
>>>>>>> cc83dc1924a27665d49d225e1cb2d35994172642
    }
}
