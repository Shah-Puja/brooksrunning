<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<< HEAD
class InfoController extends Controller
{
  public function index($pg){ 
   
      return view( 'info.'.$pg);
  }
    public function help()
	{
		return view( 'info.help');
=======
class InfoController extends Controller {

    public function index($pg) {

        return view('info.' . $pg);
>>>>>>> af6b100e7d71ae470cb239303265c4f9ee8f8ecb
    }

    public function help() {
        return view('info.help');
    }
<<<<<<< HEAD
    public function sitemap()
	{
		return view( 'info.sitemap');
    }
=======

    public function store_locator() {
        return view('info.store_locator');
    }

>>>>>>> af6b100e7d71ae470cb239303265c4f9ee8f8ecb
}
