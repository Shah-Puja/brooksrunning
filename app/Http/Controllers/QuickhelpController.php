<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuickhelpController extends Controller
{
    //
    public function defective_product_clain()
	{
		return view( 'quickhelp.defective-product-clain');
    }
    public function faqs()
	{
		return view( 'quickhelp.faqs');
    }
    public function fit_sizing()
	{
		return view( 'quickhelp.fit-sizing');
    }
    public function returns_centre()
	{
		return view( 'quickhelp.returns-centre');
    }
    public function track_your_order()
	{
		return view( 'quickhelp.track_your_order');
    }

    public function error_404()
    {
      return view( 'quickhelp.error-404');
      }
}
