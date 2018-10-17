<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SYG\Bridges\BridgeInterface;

class AP21Demo extends Controller
{
    public function index(BridgeInterface $bridge)
    {
    	return $bridge->getProduct(1);
    }
}
