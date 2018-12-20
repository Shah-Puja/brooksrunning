<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MovetableController extends Controller
{
    public function index(){

        $DB_from = "ftfjkzaeke"; // staging
        $DB_to = "gkkwquthrm"; // production

        //$DB_from = "brookstest_2018"; // staging
        //$DB_to = "chatbox"; // production
        //DB::connection('mysql2')->statement("DROP TABLE IF EXISTS $DB_to.newtable;");
        
        DB::connection('mysql2')->statement("CREATE TABLE $DB_to.newtable LIKE $DB_from.p_products;");

        DB::connection('mysql2')->statement("INSERT INTO $DB_to.newtable SELECT * FROM $DB_from.p_products");
    }
}
