<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
   public function about_us(){
        return view( 'info.about_us');
   }
   public function contact_us()
	{
		return view( 'info.contact-us');
	}
}
