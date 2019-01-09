<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Shoefinder;
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
				0 => array(
					0 => 0,
					1 => 0,
					2 => 0,
					3 => 15,
					4 => 15
				),
				1 => array(
					0 => 0,
					1 => 0,
					2 => 0,
					3 => 5,
					4 => 10
				),
				2 => array(
					0 => 0,
					1 => 0,
					2 => 0,
					3 => 0,
					4 => 5
				)
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
                Session::put('miles',$val0);
				break;

			case 7:
				$miles =  Session::get('miles');
				$user_choices = Session::get('user_choices');
				$user_choices[$qid] = $score_array[$qid][$miles][$val0];
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
        return view( 'customer.shoe_finder_view.shoefinder_ajax_view',compact('data'));
	}
	
	public function get_shoe(){
		$score = Session::get('score');
		if($score <= 50 ){
			// its neutral
			$tag  = 'neutral';
		}
		elseif($score > 50 && $score <= 90){
			// its support
			$tag  = 'support';
		}
		elseif($score >= 90){
			$tag  = 'support_max';
		}

		$experience_type = Session::get('experience_type');
		$experience = Session::get('experience');
		$gender = $data['gender'] = Session::get('gender');
		$trail_status = (Session::get('shoe_status') == 'trail' ? 'yes' : 'no');
		$result = Shoefinder::getshoe($tag,$experience_type,$experience,$gender,$trail_status);
		//echo "<pre>";
		//print_r($result);
		//exit;
		return view( 'customer.shoe_finder_view.shoefinder_result',compact('result','tag'));

	}

	public function shoefinder_new(Request $request){
		Session::put('score', '0');
		Session::put('experiencetype','');
		Session::put('experience','');
		Session::put('tag','');
		//$request->session()->put('score','0');
		//$request->session()->put('experiencetype','');
		//$request->session()->put('expnew','');
		return view( 'customer.shoe_finder_view_new.shoefinder');

	}

	public function ajax_data_new(Request $request){
		$array = [
			'run_distance'=>
				['0'=>'10','1'=>'5','2'=>'0'],
			'training'=>
				[
					'0' =>['0'=>'0','1'=>'0','2'=>'15','3'=>'15','4'=>'0'],
					'1' =>['0'=>'0','1'=>'0','2'=>'5','3'=>'10','4'=>'0'],
					'2' =>['0'=>'0','1'=>'0','2'=>'0','3'=>'5','4'=>'0'],
				],
			'injury'=> 
				['knees'=>'15','leg'=>'5','foot'=>'10','none'=>'0'],
			'feet'=> 
				['0'=>'0','1'=>'10','2'=>'15'],
			'balance'=> 
				['0'=>'0','1'=>'15'],
			'knee'=> 
				['0'=>'15','1'=>'10','2'=>'0'],
			'flexibility'=> 
				['0'=>'25','1'=>'0'],
		];
		$user_actions = $request->all();
		$points =0;
		foreach ($user_actions as $key => $value) {
			if($key!='surface' && $key!='feel' && $key!='impact' && $key!='id' && $key!='gender'){ // skip question 1 step
				if($key=='training'){
					$sub_key = request('run_distance');
					$points +=$array[$key][$sub_key][$value];
				}else{
					$points +=$array[$key][$value];
				}
				
			}

			if($key=='feel'){
				Session::put('experiencetype', ($value == 0 ? 'feel' : 'float'));
				//$request->session()->put('experiencetype', ($value == 0 ? 'feel' : 'float'));
			}

			if($key=='impact'){
				if(request('feel') == 0){
					//$request->session()->put('expnew', ($value == 0 ? 'energize_me' : 'connect_me'));
					Session::put('experience', ($value == 0 ? 'propel_me' : 'connect_me'));
				}else{
					//$request->session()->put('expnew', ($value == 2 ? 'cushion_me' : 'propel_me'));
					 Session::put('experience', ($value == 2 ? 'cushion_me' : 'energize_me'));
				}
			}
		}
		Session::put('score',$points);
		//$request->session()->put('score',$points);
	}

	public function ajax_checkpoint_new(Request $request){
		//$score = $request->session()->get('score');
		$this->ajax_data_new($request);
		if(request('id')=='2'){
			$score = Session::get('score');
			if($score <= 50 ){
				// its neutral
				$tag  = 'neutral';
				$text = "Looks like you've got flexible ligaments, stable ankles, feet that point straight,  and a steady training regimen. We recommend your shoes should be:";
			}
			elseif($score > 50 && $score <= 90){
				// its support
				$tag  = 'support';
				$text ="Looks like you've got a recent injury, knees and hips that aren't aligned, less flexible ligaments, unstable ankles, feet that don't point straight,  and a desire to significantly increase your mileage. We recommend your shoes should be:";
			}
			elseif($score >= 90){
				$tag  = 'support_max';
				$text = "Looks like you've got a recent injury, knees and hips that aren't aligned, less flexible ligaments, unstable ankles, feet that don't point straight,  and a desire to significantly increase your mileage. We recommend your shoes should be:";
			}
			Session::put('tag',$tag);
			return view('customer.shoe_finder_view_new.shoefinder_checkpoint2',compact('tag','text'));
		}

		if(request('id')=='3'){
			return view('customer.shoe_finder_view_new.shoefinder_checkpoint3');
		}

	}

	public function ajax_result_new(Request $request){
		$experience_type = Session::get('experiencetype');
		$experience = Session::get('experience');
		$gender = $data['gender'] = request('gender');
		$trail_status = (request('surface') == 'trail' ? 'yes' : 'no');
		$tag = Session::get('tag');
		$surface = request('surface');
		$result = Shoefinder::getshoe($tag,$experience_type,$experience,$gender,$trail_status);
		//echo "<pre>";
		//print_r($result);
		//exit;
		return view('customer.shoe_finder_view_new.shoefinder_result_new',compact('result','tag','surface','experience_type','experience','gender'));
	}

	public function ajax_getscore(){
	    return Session::get('score');
	}

	
}
