<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class ShoefinderController extends Controller
{
    //
    public function shoefinder()
	{   
		Session::put('score', '0');
		Session::put('user_choices',array());
		Session::get('score');
		return view( 'customer.shoe_finder_view.shoefinder');

    }

    public function ajax_data(){
        $curr_score = Session::get('score');
        $qid = Input::post('qid');
        $val0 = Input::post('val0');
        $score_array = array(
			1 => array(
				0 => 10,
				1 => 15,
				2 => 0
			),

			2 => array(
				0 => 0,
				1 => 15
			),

			3 => array(
				0 => 15,
				1 => 10,
				2 => 0
			),

			4 => array(
				0 => 0,
				1 => 25
			),

			5 => array(
				0 => array(
						0 => 15,
						1 => 5,
						2 => 10,
						3 => 0
					),

				1 => 0
				
			),

			6 => array(
				0 => 10,
				1 => 5,
				2 => 0
			),

			7 => array(
					0 => 0,
					1 => 0,
					2 => 0,
					3 => 15,
					4 => 15
			),
		);

		// 0 based index so question no.1 is 0 here. 
		switch($qid){
            case 0:
			    Session::put('gender',$val0);
                Session::put('shoe_status',Input::post('val1'));
				$user_choices = Session::get('user_choices');
                $user_choices[$qid] = 0;
                Session::put('user_choices',$user_choices);
				break;
			case 1:
			case 2:
			case 3:
			case 4:
                $user_choices = Session::get('user_choices');
				$user_choices[$qid] = $score_array[$qid][$val0];
                Session::put('user_choices',$user_choices);
				break;

			case 5:
                $user_choices = Session::get('user_choices');
				
				if($val0 == 0){
					$val1 = Input::post('val1');
					$temp_score = 0;
					foreach($val1 as $curr_value){
						$temp_score += $score_array[$qid][$val0][$curr_value];		
					}
					$user_choices[$qid] = $temp_score;
				}else{
					$user_choices[$qid] = $score_array[$qid][$val0];
				}
				Session::put('user_choices',$user_choices);
				
				break;

			case 6:
                $user_choices = Session::get('user_choices');
				$user_choices[$qid] = $score_array[$qid][$val0];
                Session::put('user_choices',$user_choices);
                Session::get('miles',$val0);
				break;

			case 7:
				//$miles =  session('miles');
				$user_choices = Session::get('user_choices');
				$user_choices[$qid] = $score_array[$qid][$val0];
				Session::put('user_choices',$user_choices);
				break;

			case 8: 
				$val1 = Input::post('val1');
				if($val0 == 0){
                    Session::put('experience_type', 'float');
                    Session::put('experience', ($val1 == 0 ? 'cushion_me' : 'energize_me'));
				}else{
                    Session::put('experience_type', 'feel');
                    Session::put('experience', ($val1 == 0 ? 'connect_me' : 'propel_me'));
				}
		}

		$final_choices_arr = Session::get('user_choices');
		$final_score = 0;
		foreach($final_choices_arr as $curr_arr){
			$final_score += $curr_arr; 
		}
        
        Session::put('score',$final_score);

        $data = Input::all();
        return view( 'customer.shoe_finder_view.shoe_finder_ajax_view',compact('data'));
    }
}
