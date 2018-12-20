<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MovetableController extends Controller
{
    public function index(){

        $DB_from = "ftfjkzaeke"; // staging
        $DB_to = "gkkwquthrm"; // production
        DB::statement("DROP TABLE $DB_to.newtable;");
        
        DB::statement("CREATE TABLE $DB_to.newtable LIKE $DB_from.p_products;");

        DB::statement("INSERT INTO $DB_to.newtable SELECT * FROM $DB_from.p_products");
    }
}
