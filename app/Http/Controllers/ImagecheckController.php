<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagecheckController extends Controller
{
    public function index(){
        $files = Storage::disk('sftp')->files('public_html/product/orig/');
        print_r($files);
    }
}
