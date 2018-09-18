<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function index()
    {
     echo "test";
     $fields=Array('color_filter','support_level','arch','activity','drop_level','band_size','cup_size','support_preference','great_for','feature_preferences','breast_shape','impact','tag','sub_category','seqno','gender','features_heading','product_features','fabric','specifications','care_instructions');

    foreach ($fields as $field):
        echo $field."<br>";
    endforeach;


    }
}
