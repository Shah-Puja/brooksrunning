<?php 
$qid = $data['qid'];
$val0 = $data['val0'];
$val1 = (isset($data['val1'])) ? $data['val1'] : '';
$answer_array = array(
		1 => array(
			0 => 'toe in',
			1 => 'toe out',
			2 => 'straight ahead'
		),
		2 => array(
			0 => 'stable',
			1 => 'unstable'
		),

		3 => array(
			0 => 'move in',
			1 => 'move out',
			2 => 'move straight forward'
		),

		4 => array(
			0 => 'quite flexible',
			1 => 'less flexible'	
		),

		5 => array(
			0 => 'knee',
			1 => 'lower leg',
			2 => 'foot',
			3 => 'something else'
		),

		6 => array(
			0 => '0 - 15 km',
			1 => '16 - 50 km',
			2 => 'More than 50 km'
		),

		7 => array(
			0 => 'health/life',
			1 => '5k',
			2 => '10k',
			3 => 'Half Marathon',
			4 => 'Marathon or longer'
		),

		8 => array(
			0 => array(
				0 => 'Cushion',
				1 => 'Energize'
			),


			1 => array(
				0 => 'Connect',
				1 => 'Speed'
			)

		)

	);

//echo "score: ". $this->session->userdata('score');

switch($qid):
case 0:

$gen = ($val0 == 'mens' ? "men's" : "women's");
?>
	<h3 class="answered">
		<div class="grid-container col-12 mob-12 ">
			<span class="checkmark">&#10004;</span>
			<span class="accordion-header-text">You prefer <span class='neo-sans-black-italic'><b><?=$gen;?></b> <b><?=$val1;?></b></span> shoes. Sweet!</span>
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=0">Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
			<input name="qid" type="hidden" value="0">
			<p class='sub-question'>When I go out for a run, I prefer to wear
				<select name='val0' id="gender" onchange="changeFunction();">
					<option value='mens' <?=($val0 == 'mens' ? 'selected' : '');?>>men's</option>
					<option value='womens' <?=($val0 == 'womens' ? 'selected' : '');?>>women's</option>
				</select> shoes on the
				<select name='val1' id="shoe_status" onchange="changeFunction();">
					<option value='road' <?=($val1 == 'road' ? 'selected' : '');?>>road</option>
					<option value='trail' <?=($val1 == 'trail' ? 'selected' : '');?> >trail</option>
				</select> </p>
			<div class="clearfix"></div>
			<button class="ss-continue" onclick="shoestatus()" type="submit" style="display:none;">Continue</button>
		</form>
		<div class="totalscore" style="display:none;"><?=Session::get('score');?></div>
	</div>
<?php break;
case 1: ?>

	<h3 class="answered">
		<div class="grid-container col-12 mob-12">
			<span class="checkmark">&#10004;</span>
			<span class="accordion-header-text">Your feet <?=($val0 == 2 ? 'point ' : '');?><span class='neo-sans-black-italic'><?=$answer_array[$qid][$val0];?>.</span> Good to know.</span>
			<!-- <span class="neo-sans-black-italic">straight ahead.</span> -->
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=1">Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
			<input name="qid" type="hidden" value="1">
			<p class='sub-question'>Time to take a quick walk. Observe five steps and notice how your feet position themselves. Did they?</p>
			<div class="grid-container grid">
				<label class="three columns withImg">
					<input type="radio" name="val0" value="0" <?=($val0 == 0 ? 'checked' : '');?> onclick="clickFunction();" >
					<div class='label-text'><span class='label-title'>Toe in</span>
						<p>My feet pointed inward.</p>
					</div> <img src="/images/SS/toesIn.png" alt=""> </label>
				<label class="three columns withImg">
					<input type="radio" name="val0" value="1" <?=($val0 == 1 ? 'checked' : '');?> onclick="clickFunction();">
					<div class='label-text'><span class='label-title'>Toe out</span>
						<p>My feet pointed outward.</p>
					</div> <img src="/images/SS/toesOut.png" alt=""> </label>
				<label class="three columns withImg">
					<input type="radio" name="val0" value="2" <?=($val0 == 2 ? 'checked' : '');?> onclick="clickFunction();">
					<div class='label-text'><span class='label-title'>Toe straight forward</span></div> <img src="/images/SS/toesStraight.png" alt=""> </label>
			</div>
			<div class="clearfix"></div>
			<button class="ss-continue" type="submit" style="display:none;">Continue</button>
		</form>
		<div class="totalscore" style="display:none;"><?=Session::get('score');?></div>
	</div>

<?php break;
case 2: ?>
	<h3 class="answered">
		<div class="grid-container col-12 mob-12">
	    	<span class="checkmark">&#10004;</span>
		  	<span class="accordion-header-text">Got it. Standing on one foot feels <span class='neo-sans-black-italic'><?=$answer_array[$qid][$val0];?></span> Let's roll on.</span>
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=2">Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
			<input name="qid" type="hidden" value="2">
			<p class='sub-question'>Kick off your shoes and stand on one leg. What do you sense in your standing foot?</p>
			<div class="grid-container grid">
				<label class="three columns block-label">
					<input type="radio" name="val0" value="0" <?=($val0 == 0 ? 'checked' : '');?> onclick="clickFunction();" >
					<div class='label-text'><span class='label-title'>I feel very stable</span>
						<p>Very little movement .</p>
					</div>
				</label>
				<label class="three columns block-label">
					<input type="radio" name="val0" value="1" <?=($val0 == 1 ? 'checked' : '');?> onclick="clickFunction();">
					<div class='label-text'><span class='label-title'>I feel a bit unstable.</span>
						<p>My foot is moving a lot to keep balance.</p>
					</div>
				</label>
			</div>
			<div class="clearfix"></div>
			<button class="ss-continue" type="submit" style="display:none;">Continue</button>
		</form>
		<div class="totalscore" style="display:none;"><?=Session::get('score');?></div>
	</div> 
<?php break;
case 3: ?>
	<h3 class="answered">
		<div class="grid-container col-12 mob-12">
	    	<span class="checkmark">&#10004;</span>
	    	<span class="accordion-header-text">Noted. Your knees <span class='neo-sans-black-italic'><?=$answer_array[$qid][$val0];?>.</span>.</span>
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=2">Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
			<input name="qid" type="hidden" value="3"> <img class='qImg' src='/images/SS/kneeQuestion.png' />
			<p class='sub-question wImg'>Now that you're warmed up, stand up with your feet together, heels and toes touching. Slide your hand between your knees and do a shallow squat. What do you feel?</p>
			<div class='clearfix'></div>
			<div class="grid-container grid">
				<label class="four columns withImg">
					<input type="radio" name="val0" value="0" <?=($val0 == 0 ? 'checked' : '');?> onclick="clickFunction();">
					<div class='label-text'><span class='label-title'>My knees move in.</span>
						<p>I feel increased pressure on my hand.</p>
					</div> <img src="/images/SS/kneesIn.png" alt=""> </label>
				<label class="four columns withImg">
					<input type="radio" name="val0" value="1" <?=($val0 == 1 ? 'checked' : '');?> onclick="clickFunction();">
					<div class='label-text'><span class='label-title'>My knees move out.</span>
						<p>The pressure on my hand decreased or I lost contact altogether.</p>
					</div> <img src="/images/SS/kneesOut.png" alt=""> </label>
				<label class="four columns withImg">
					<input type="radio" name="val0" value="2" <?=($val0 == 2 ? 'checked' : '');?> onclick="clickFunction();">
					<div class='label-text'><span class='label-title'>My knees move straight forward.</span>
						<p>The pressure on my hand stayed the same.</p>
					</div> <img src="/images/SS/kneesStraight.png" alt=""> </label>
			</div>
			<div class="clearfix"></div>
			<button class="ss-continue" type="submit" style="display:none;">Continue</button>
		</form>
		<div class="totalscore" style="display:none;"><?=Session::get('score');?></div>
	</div>

<?php break;
case 4: ?>
	<h3 class="answered">
		<div class="grid-container col-12 mob-12">
	    	<span class="checkmark">&#10004;</span>
		  	<span class="accordion-header-text">Your joints are <span class='neo-sans-black-italic'><?=$answer_array[$qid][$val0];?></span>.</span>
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=2">Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
		<input name="qid" type="hidden" value="4">
		<p class='sub-question'>Place your hand, palm face down, on to a flat surface. Bend back your index finger with your opposite hand. What is the angle from the table?</p>
		<div class="grid-container grid">
			<label class="three columns withImg">
				<input type="radio" name="val0" value="0" <?=($val0 == 0 ? 'checked' : '');?> onclick="clickFunction();"> <span class='label-title'>More than 45&deg;</span> <img src="/images/SS/moreThan45.png" alt=""> </label>
			<label class="three columns withImg">
				<input type="radio" name="val0" value="1" <?=($val0 == 1 ? 'checked' : '');?> onclick="clickFunction();"> <span class='label-title'>45&deg; or less</span> <img src="/images/SS/lessThan45.png" alt=""> </label>
		</div>
		<div class="clearfix"></div>
		<button class="ss-continue" type="submit" style="display:none;">Continue</button>
	</form>
		<div class="totalscore" style="display:none;"><?=Session::get('score');?></div>
	</div>

<?php break;
case 5:?>
	<h3 class="answered">
		<div class="grid-container col-12 mob-12">
	    	<span class="checkmark">&#10004;</span>
				<?php // check the count of the array 

					if(!empty($val1)){
						if(count($val1) == 1  ){
							$curr_val = reset($val1); //You injured something else recently.

							switch($curr_val){
								case 0:
								case 1:
								case 2:
									echo "<span class='accordion-header-text'>You injured your <span class='neo-sans-black-italic'>{$answer_array[$qid][$curr_val]}</span></span>";
									break;

								case 3:
									echo "<span class='accordion-header-text'>You injured <span class='neo-sans-black-italic'>{$answer_array[$qid][$curr_val]}</span> recently.</span>";
									break;

							}
						}
						elseif(count($val1) > 1  ){
							// iterate over the options

							$result = '<span class="accordion-header-text">You injured your <span class="neo-sans-black-italic">';

							foreach($val1 as $value){

								if ($value === end($val1))
	        						//echo 'LAST ELEMENT!';
	        						$result .= " and {$answer_array[$qid][$value]}";
	        					else
	        						$result .= "{$answer_array[$qid][$value]} ,";

							} // end of foreach;

							$result .= "</span>.</span>";
							echo $result;
						} // end of else if;

					} // end of if
					
					else{
						echo "<span class='accordion-header-text'>You're <span class='neo-sans-black-italic'>injury free</span>. Great to hear!</span>";
						$val1 = [];
					}


				?>

		  		
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=2">Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
			<input name="qid" type="hidden" value="5">
			<p class='sub-question'>Nobody likes injuries, but they're important to discuss. Do you currently experience pain or have you endured a running-related injury in the past six months?</p>
			<div class="grid-container grid">
				<label class="two columns block-label">
					<input type="radio" name="val0" value="0" <?=($val0 == 0 ? 'checked' : '');?> class="question5"> <span class='label-title'>Yes</span> </label>
				<label class="two columns block-label">
					<input type="radio" name="val0" value="1" <?=($val0 == 1 ? 'checked' : '');?> id='s6_2' onclick='step6radio(this.id)' class="question5"> <span class='label-title'>No</span> </label>
			</div>
			<ul class="followup-questions " >
				<li class="question5_div" <?=($val0 == 0 ? '' : 'style=display:none');?>>
					<p>Sorry to hear that, tell us where it is/was?</p>
					<div class="grid-container grid">
						<label class="two columns block-label">
							<input type="checkbox" name="val1[]" value="0" <?=(in_array(0, $val1) ? 'checked' : '');?> onclick="clickFunction();" > <span class='label-title'>Knee</span> </label>
						<label class="two columns block-label">
							<input type="checkbox" name="val1[]" value="1" <?=(in_array(1, $val1) ? 'checked' : '');?> onclick="clickFunction();" > <span class='label-title'>Lower leg</span> </label>
						<label class="two columns block-label">
							<input type="checkbox" name="val1[]" value="2" <?=(in_array(2, $val1) ? 'checked' : '');?> onclick="clickFunction();" > <span class='label-title'>Arch <span class='label-title-small'>or </span>foot</span>
						</label>
						<label class="two columns block-label">
							<input type="checkbox" name="val1[]" value="3" <?=(in_array(3, $val1) ? 'checked' : '');?> onclick="clickFunction();" > <span class='label-title'>None of these</span> </label>
					</div>
				</li>
				<li class="" <?=($val0 == 0 ? 'style=display:none' : '');?>></li>
			</ul>
			<div class="clearfix"></div>
			<button class="ss-continue" type="submit" style='display:none;'>Continue</button>
		</form>
		<div class="totalscore" style="display:none;"><?=Session::get('score');?></div>
	</div>

<?php break;
case 6: ?>
	<h3 class="answered">
		<div class="grid-container col-12 mob-12">
	    	<span class="checkmark">&#10004;</span>
		  	<span class="accordion-header-text">You ran <span class='neo-sans-black-italic'><?=$answer_array[$qid][$val0];?></span>. Keep it up!</span>
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=2">Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
			<input name="qid" type="hidden" value="6">
			<p class='sub-question'>During the past six months, estimate how many kilometers you ran each week.</p>
			<div class="grid-container grid">
				<label class="three columns block-label">
					<input type="radio" name="val0" value="0" <?=($val0 == 0 ? 'checked' : '');?> onclick="clickFunction();"> <span class='label-title'>0 - 15 km</span> </label>
				<label class="three columns block-label">
					<input type="radio" name="val0" value="1" <?=($val0 == 1 ? 'checked' : '');?> onclick="clickFunction();" > <span class='label-title'>16 - 50 km</span> </label>
				<label class="three columns block-label">
					<input type="radio" name="val0" value="2" <?=($val0 == 2 ? 'checked' : '');?> onclick="clickFunction();" > <span class='label-title'>More than 50 km</span> </label>
			</div>
			<div class="clearfix"></div>
			<button class="ss-continue" type="submit" style="display:none;">Continue</button>
		</form>	
		<div class="totalscore" style="display:none;"><?=Session::get('score');?></div>
	</div>

<?php break;
case 7: ?>
	<h3 class="answered">
		<div class="grid-container col-12 mob-12">
	    	<span class="checkmark">&#10004;</span>
		  	<span class="accordion-header-text">You're training for a <span class='neo-sans-black-italic'><?=$answer_array[$qid][$val0];?></span>. We're cheering for you!</span>
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=2">Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
			<input name="qid" type="hidden" value="7">
			<p class='sub-question'>What are you training for?</p>
			<div class="grid-container grid">
				<label class="two columns block-label">
					<input type="radio" name="val0" value="0" <?=($val0 == 0 ? 'checked' : '');?> onclick="clickFunction();"> <span class='label-title'>Health/Life</span> </label>
				<label class="two columns block-label">
					<input type="radio" name="val0" value="1" <?=($val0 == 1 ? 'checked' : '');?> onclick="clickFunction();"> <span class='label-title'>5k</span> </label>
				<label class="two columns block-label">
					<input type="radio" name="val0" value="2" <?=($val0 == 2 ? 'checked' : '');?> onclick="clickFunction();"> <span class='label-title'>10k</span> </label>
				<label class="two columns block-label">
					<input type="radio" name="val0" value="3" <?=($val0 == 3 ? 'checked' : '');?> onclick="clickFunction();"> <span class='label-title'>Half Marathon</span> </label>
				<label class="two columns block-label">
					<input type="radio" name="val0" value="4" <?=($val0 == 4 ? 'checked' : '');?> onclick="clickFunction();"> <span class='label-title'>Marathon or longer</span> </label>
			</div>
			<div class="clearfix"></div>
			<button class="ss-continue" type="submit" style="display:none;">Continue</button>
		</form>
		<div class="totalscore" style="display:none;"><?=Session::get('score');?></div>
	</div>

<?php break;
case 8: ?>
	<h3 class="answered">
		<div class="grid-container col-12 mob-12">
	    	<span class="checkmark">&#10004;</span>
		  	<span class="accordion-header-text">You want to  
				<?if($val0 == 0):?>
					<span class='neo-sans-black-italic'>float</span> above the ground with a <span class='neo-sans-black-italic'><?=$answer_array[$qid][$val0][$val1];?></span> 
				<?else:?>
					<span class='neo-sans-black-italic'>feel</span> close to the ground with a <span class='neo-sans-black-italic'><?=$answer_array[$qid][$val0][$val1];?></span>

				<?endif;?>

				experience. Excellent choice.</span>
			<a href="http://www.brooksrunning.com/en_us/ShoeFinder?qid=2" >Edit</a>
		</div>	
	</h3>
	<div>
		<form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
			<input name="qid" type="hidden" value="8">
			<p class='sub-question'>Choose the running experience you want.</p>
			<div class="grid-container grid">
				<label class="four columns block-label">
					<input type="radio" name="val0" value="0" <?=($val0 == 0 ? 'checked' : '');?>  class="question8">
					<div class='label-text'><span class='label-title'>Float</span>
						<p>I want more shoe to lift me off the ground.</p>
					</div>
				</label>
				<label class="four columns block-label">
					<input type="radio" name="val0" value="1" <?=($val0 == 1 ? 'checked' : '');?>  class="question8" > 
					<div class='label-text'><span class='label-title'>Feel</span>
						<p>I want less shoe that feels lightweight and keeps me closer to the ground.</p>
					</div>
				</label>
			</div>
			<ul class="followup-questions">
				<li <?=($val0 == 0 ) ? '' : 'style=display:none'?> class="question8_div1">
					<p>And last but not least, which experience appeals to you?</p>
					<div class="grid-container grid">
						<label class="four columns block-label">
							<input type="radio" name="val1" value="0" <?=($val0 == 0 && $val1 == 0 ? 'checked' : '');?> >
							<div class='label-text'><span class='label-title'>Cushion</span>
								<p>Soft and protective, these shoes cushion each step and let you glide through your run.</p>
							</div>
						</label>
						<label class="four columns block-label" id="shoe_hide1">
							<input type="radio" name="val1" value="1" <?=($val0 == 0 && $val1 == 1 ? 'checked' : '');?> >
							<div class='label-text'><span class='label-title'>Energize</span>
								<p>Responsive and springy, these shoes add a lift to every stride.</p>
							</div>
						</label>
					</div>
				</li>
				<li <?=($val0 == 1 ) ? '' : 'style=display:none'?> class="question8_div2">
					<p>And last but not least, which experience appeals to you?</p>
					<div class="grid-container grid">
						<label class="four columns block-label">
							<input type="radio" name="val1" value="0" <?=($val0 == 1 && $val1 == 0 ? 'checked' : '');?> >
							<div class='label-text'><span class='label-title'>Connect</span>
								<p>Lightweight and flexible, these shoes create a natural connection to the run.</p>
							</div>
						</label>
						<label class="four columns block-label" id="shoe_hide2">
							<input type="radio" name="val1" value="1" <?=($val0 == 1 && $val1 == 1 ? 'checked' : '');?> >
							<div class='label-text'><span class='label-title'>Speed</span>
								<p>Fast and built for speed, these low-profile, race day shoes propel your performance to the next level.</p>
							</div>
						</label>
					</div>
				</li>
			</ul>
			<div class="clearfix"></div>
			<button class="ss-continue" type="submit">See Results</button>
		</form>
	</div>
	
	<!-- Final Result --> 


<?php break;
endswitch; ?>

<?php //echo '<input type="hidden" name="score" value="'. $this->session->userdata('score') .'">'; ?>


