<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Imagecheck;

class ImagecheckController extends Controller
{
    public function index(){
        $files = Storage::disk('sftp')->files('public_html/product/t/');
        $records = [];
        foreach($files as $file){
            $record = [
                'image' => $file,
            ];
            $records[] = $record;
        }
        Imagecheck::insert($records);
    }
}
