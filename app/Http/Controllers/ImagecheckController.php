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
        Imagecheck::truncate();
        foreach($files as $file){
            $fname=str_replace('public_html/product/t/','',$file);
            $fname=str_replace('_t.jpg','.jpg',$fname);
            $record = [
                'image' => $fname,
            ];
            $records[] = $record;
        }
        Imagecheck::insert($records);
        /*for($i=1;$i<=10;$i++):
            $sql="select distinct image1 from p_images where image1 not in (select image from imagecheck)";
        endfor;*/
    }
}
