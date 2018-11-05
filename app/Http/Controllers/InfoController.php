<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class InfoController extends Controller {

    public function index($pg) {

        return view('info.' . $pg);
    }

    public function help() {
        return view('info.help');
    }

    public function sitemap()
	{
		return view( 'info.sitemap');
    }


    public function store_locator() {
        return view('info.store_locator');
    }

    public function check_email(){
        $email= request()->email;
        $user = User::where("email", "=",  $email)->first();
        if($user){
            echo "true";
        }else{
            echo "false";
        }   
    }


}
