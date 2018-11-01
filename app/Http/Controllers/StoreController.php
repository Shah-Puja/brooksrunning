<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index()
    {
		request()->validate([
			'lat' => 'required|numeric',
			'lng' => 'required|numeric',
			'radius' => 'required|numeric',
		]);
 
		$stores = DB::table('stores')
					->select( 'id', 'name', 'lat', 'lng')
					->selectRaw( 'CONCAT(address, ", ", suburb, ", ", state, ", ", postcode) AS address' )
					->selectRaw('( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) AS distance', [request('lat'), request('lng'), request('lat')])
					->having('distance', '<', request('radius'))
					->orderBy('distance')
					->offset(0)
					->limit(100)
					->get();

        return response()
        			->view( 'info.stores', compact('stores'), 200 )
        			->header('Content-Type', 'text/xml');
    }
}
