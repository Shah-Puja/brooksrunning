<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
  public function about_us(){
        return view( 'info.about_us');
   }
  public function contact_us()
	{
		return view( 'info.contact-us');
    }
  public function events(){
      return view( 'info.events');
  }
  public function find_a_store(){
  return view( 'info.find-a-store');
  }
  public function shoe_finder(){
    return view( 'info.shoe-finder');
    }
  public function returns_exchange()
  {
  return view( 'info.returns-exchange');
  }
  public function shipping_information()
  {
  return view( 'info.shipping-information');
  }
  public function terms_conditions(){
    return view( 'info.terms-conditions');
  }
  public function terms_of_use()
  {
  return view( 'info.terms-of-use');
  }
  public function newsletter_signup()
  {
  return view( 'info.newsletter');
  }
}
