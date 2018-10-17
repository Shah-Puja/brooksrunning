<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagecheckController extends Controller
{
    public function index(){
        $exists = Storage::disk('sftp')->exists('public_html/product/orig/300614_001_lf_wr.jpg');
        echo $exists;
    }
}
