@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/shoefinder-css/main.css">
<link rel="stylesheet" href="/css/shoefinder-css/ss-newquiz.css" />
<link rel="stylesheet" href="/css/shoefinder-css/jquery.ui.all.css" />
 <script src="http://test.texaspeak.com.au/brooks/test/js/test/footerjs.js" type="text/javascript"></script>  


<div id="wrapper" class="shoefinder pt_content">
       
	   <script>
	   function changeFunction(){
		  var gender=document.getElementById('gender').value;
		  var shoe_status=document.getElementById('shoe_status').value;
		  if(gender!='' && shoe_status!=''){
			   $(".ui-accordion-content-active" ).find('.ss-continue').triggerHandler( "click" );
		  }
	   }
	   function clickFunction(){
		  $(".ui-accordion-content-active" ).find('.ss-continue').triggerHandler( "click" );
	   }
	   function step6radio(id){
		   var abc=document.getElementById(id).value;
		   if(abc==1){
			   $(".ui-accordion-content-active" ).find('.ss-continue').triggerHandler( "click" );
		   }
	   }
	   </script>
	   <div id="main" role="main" class="full-width clearfix ss-quiz-container">
		   <div id="primary" class="primary-content">
			   <div class="ss-quiz-header">
				   <div class="grid-container grid row" id="ss-quiz-banner">
					   <div class="col-6 mob-12">
						   <h1>What Type of Running Shoe Do I Need?</h1>
						   <p>Uncover the best running shoes for your requirements with the interactive Brooks shoe finder. It works like magic, yet it's rooted in the best running science to date.</p>
					   </div>
					   <div class="col-6 mob-12 no-right learn-more align-center no-mobile hidden-mob hidden-tab">
						   <img alt="" src="/images/SS/rs_logo_horiz_white.svg" title="" width="300" height="53" ><br>
						   <a class="blue cta" href="/runsignature">Learn About Run Signature</a>
					   </div>
				   </div>
				   
			   </div>
			   <div class="progress-bar no-mobile hidden-mob hidden-tab">
					   <div class="greybar">
					   </div>
					   <div class="whitebar">
					   </div>
					   <div id="progress-bar-bkgd" class="grid-container">
						   <div id="progressBar" class="ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
							   <div>
								   Start
							   </div>
							   <img id="ssRunner" src="/images/SS/woodenRunner.png" style="left: -1%;">
							   <div class="right">
								   Finish
							   </div>
							   <div class="ui-progressbar-value ui-widget-header ui-corner-left" style="display: none; width: 0%;">
							   </div>
						   </div>
					   </div>
				   </div>
			   <div id="accordion" class="row">
			   
				   <h3 class="answered row">
					   <div class="grid-container col-12 mob-12">
						   <span class="checkmark">&#10004;</span>
						   <span class="accordion-header-text">You prefer <span class='neo-sans-black-italic'><b>val1</b> <b>val2</b></span> shoes. Sweet!</span>
						   <a href="#">Edit</a>
					   </div>	
				   </h3>
				   <div>
					   <form method="POST" action="http://www.brooksrunning.com/en_us/ShoeFinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="0">
						   <p class='sub-question'>When I go out for a run, I prefer to wear
							   <select name='val0' id="gender" onchange="changeFunction();">
								   <option value='mens'>men's</option>
								   <option value='womens'>women's</option>
							   </select> shoes on the
							   <select name='val1' id="shoe_status" onchange="changeFunction();">
								   <option value='road'>road</option>
								   <option value='trail'>trail</option>
							   </select> </p>
						   <div class="clearfix"></div>
						   <button class="ss-continue" onclick="shoestatus()" type="submit" style='display:none;'>Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">1</span>
					   <span class="accordion-header-text">Let's start easy.</span>
				   </div>
				   </h3>
				   <div>
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="0">
						   <p class='sub-question'>
							   When I go for a run, I prefer to wear
								 <select name='val0' id="gender" onchange="changeFunction();" >
								   <option value=''>gender</option>
								   <option value='mens'>men's</option>
								   <option value='womens'>women's</option>
							   </select>
								shoes on the
							   <select name='val1'id="shoe_status" onchange="changeFunction();" >
								   <option value=''>road or trail</option>
								   <option value='road'>road</option>
								   <option value='trail'>trail</option>
							   </select>
							   
						   </p>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" onclick="shoestatus()" type="submit" style="display:block;">Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">2</span>
					   <span class="accordion-header-text">Walk it out.</span>
				   </div>
				   </h3>
				   <div style="display:block; !important;">
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="1">
						   <p class='sub-question'>
							   Time to take a quick walk. Observe five steps and notice how your feet position themselves. Did they?
						   </p>
						   <div class="flex-container">
							   <label class="three columns withImg">
							   <input type="radio" name="val0" value="0" onclick="clickFunction();">
							   <div class='label-text'>
								   <span class='label-title'>Toe in</span>
								   <p>
									   My feet pointed inward.
								   </p>
							   </div>
							   <img src="/images/SS/toesIn.png" alt="" >
							   </label>
							   <label class="three columns withImg">
							   <input type="radio" name="val0" value="1" onclick="clickFunction();">
							   <div class='label-text'>
								   <span class='label-title'>Toe out</span>
								   <p>
									   My feet pointed outward.
								   </p>
							   </div>
							   <img src="/images/SS/toesOut.png" alt="">
							   </label>
							   <label class="three columns withImg">
							   <input type="radio" name="val0" value="2" onclick="clickFunction();">
							   <div class='label-text'>
								   <span class='label-title'>Toe straight forward</span>
							   </div>
							   <img src="/images/SS/toesStraight.png" alt="">
							   </label>
						   </div>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" type="submit" style='display:none;'>Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">3</span>
					   <span class="accordion-header-text">Give us a leg to stand on.</span>
				   </div>
				   </h3>
				   <div>
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="2">
						   <p class='sub-question'>
							   Kick off your shoes and stand on one leg. What do you sense in your standing foot?
						   </p>
						   <div class="flex-container">
							   <label class="three columns block-label">
							   <input type="radio" name="val0" value="0" onclick="clickFunction();">
							   <div class='label-text'>
								   <span class='label-title'>I feel very stable</span>
								   <p>
									   Very little movement.
								   </p>
							   </div>
							   </label>
							   <label class="three columns block-label">
							   <input type="radio" name="val0" value="1" onclick="clickFunction();">
							   <div class='label-text'>
								   <span class='label-title'>I feel a bit unstable.</span>
								   <p>
									   My foot is moving a lot to keep balance.
								   </p>
							   </div>
							   </label>
						   </div>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" type="submit" style='display:none;'>Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">4</span>
					   <span class="accordion-header-text">Let&rsquo;s get knee deep.</span>
				   </div>
				   </h3>
				   <div>
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="3">
						   <img class='qImg' src='/images/SS/kneeQuestion.png'/>
						   <p class='sub-question wImg'>
							   Now that you're warmed up, stand up with your feet together, heels and toes touching. Slide your hand between your knees and do a shallow squat. What do you feel?
						   </p>
						   <div class='clearfix'>
						   </div>
						   <div class="flex-container">
							   <label class="four columns withImg">
							   <input type="radio" name="val0" value="0" onclick="clickFunction();">
							   <div class='label-text'>
								   <span class='label-title'>My knees move in.</span>
								   <p>
									   I feel increased pressure on my hand.
								   </p>
							   </div>
							   <img src="/images/SS/kneesIn.png" alt="">
							   </label>
							   <label class="four columns withImg">
							   <input type="radio" name="val0" value="1" onclick="clickFunction();">
							   <div class='label-text'>
								   <span class='label-title'>My knees move out.</span>
								   <p>
									   The pressure on my hand decreased or I lost contact altogether.
								   </p>
							   </div>
							   <img src="/images/SS/kneesOut.png" alt="">
							   </label>
							   <label class="four columns withImg">
							   <input type="radio" name="val0" value="2" onclick="clickFunction();">
							   <div class='label-text'>
								   <span class='label-title'>My knees move straight forward.</span>
								   <p>
									   The pressure on my hand stayed the same.
								   </p>
							   </div>
							   <img src="/images/SS/kneesStraight.png" alt="">
							   </label>
						   </div>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" type="submit" style="display:none;">Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">5</span>
					   <span class="accordion-header-text">Are you bendy?</span>
				   </div>
				   </h3>
				   <div>
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="4">
						   <p class='sub-question'>
							   Place your hand, palm face down, on to a flat surface. Bend back your index finger with your opposite hand. What is the angle from the table?
						   </p>
						   <div class="flex-container">
							   <label class="three columns withImg">
							   <input type="radio" name="val0" value="0" onclick="clickFunction();">
							   <span class='label-title'>More than 45&deg;</span>
							   <img src="/images/SS/moreThan45.png" alt="">
							   </label>
							   <label class="three columns withImg">
							   <input type="radio" name="val0" value="1" onclick="clickFunction();">
							   <span class='label-title'>45&deg; or less</span>
							   <img src="/images/SS/lessThan45.png" alt="">
							   </label>
						   </div>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" type="submit" style="display:none;">Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">6</span>
					   <span class="accordion-header-text">Share your pain.</span>
				   </div>
				   </h3>
				   <div>
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="5">
						   <p class='sub-question'>
							   Nobody likes injuries, but they're important to discuss. Do you currently experience pain or have you endured a running-related injury in the past six months?
						   </p>
						   <div class="flex-container">
							   <label class="two columns block-label">
							   <input type="radio" name="val0" value="0" >
							   <span class='label-title'>Yes</span>
							   </label>
							   <label class="two columns block-label">
							   <input type="radio" name="val0" value="1" id='s6_2' onclick='step6radio(this.id)'>
							   <span class='label-title'>No</span>
							   </label>
						   </div>
						   <ul class="followup-questions">
							   <li class="visually-hidden">
							   <p>
								   Sorry to hear that, tell us where it is/was?
							   </p>
							   <div class="flex-container">
								   <label class="two columns block-label">
								   <input type="checkbox" name="val1[]" value="0" onclick="clickFunction();">
								   <span class='label-title'>Knee</span>
								   </label>
								   <label class="two columns block-label">
								   <input type="checkbox" name="val1[]" value="1" onclick="clickFunction();">
								   <span class='label-title'>Lower leg</span>
								   </label>
								   <label class="two columns block-label">
								   <input type="checkbox" name="val1[]" value="2" onclick="clickFunction();">
								   <span class='label-title'>Arch <span class='label-title-small'>or </span>foot</span>
								   </label>
								   <label class="two columns block-label">
								   <input type="checkbox" name="val1[]" value="3" onclick="clickFunction();">
								   <span class='label-title'>None of these</span>
								   </label>
							   </div>
							   </li>
							   <li class="visually-hidden"></li>
						   </ul>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" type="submit" style="display:none;">Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">7</span>
					   <span class="accordion-header-text">Give us the long and short of it.</span>
				   </div>
				   </h3>
				   <div>
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="6">
						   <p class='sub-question'>
							   During the past six months, estimate how many kilometers you ran each week.
						   </p>
						   <div class="flex-container">
							   <label class="three columns block-label">
							   <input type="radio" name="val0" value="0" onclick="clickFunction();">
							   <span class='label-title'>0 - 15 km</span>
							   </label>
							   <label class="three columns block-label">
							   <input type="radio" name="val0" value="1" onclick="clickFunction();">
							   <span class='label-title'>16 - 50 km</span>
							   </label>
							   <label class="three columns block-label">
							   <input type="radio" name="val0" value="2" onclick="clickFunction();">
							   <span class='label-title'>More than 50 km</span>
							   </label>
						   </div>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" type="submit" style="display:none;">Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">8</span>
					   <span class="accordion-header-text">Are you training for something?</span>
				   </div>
				   </h3>
				   <div>
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="7">
						   <p class='sub-question'>
							   Let's talk goals. What are you training for?
						   </p>
						   <div class="flex-container">
							   <label class="two columns block-label">
							   <input type="radio" name="val0" value="0" onclick="clickFunction();">
							   <span class='label-title'>Health/Life</span>
							   </label>
							   <label class="two columns block-label">
							   <input type="radio" name="val0" value="1" onclick="clickFunction();">
							   <span class='label-title'>5k</span>
							   </label>
							   <label class="two columns block-label">
							   <input type="radio" name="val0" value="2" onclick="clickFunction();">
							   <span class='label-title'>10k</span>
							   </label>
							   <label class="two columns block-label">
							   <input type="radio" name="val0" value="3" onclick="clickFunction();">
							   <span class='label-title'>Half Marathon</span>
							   </label>
							   <label class="two columns block-label">
							   <input type="radio" name="val0" value="4" onclick="clickFunction();">
							   <span class='label-title'>Marathon</span>
							   </label>
						   </div>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" type="submit" style="display:none;">Continue</button>
					   </form>
				   </div>
				   <h3 class="row">
				   <div class="grid-container col-12 mob-12">
					   <!-- 0.0 -->
					   <span class="circle-number">9</span>
					   <span class="accordion-header-text">Come along for the ride.</span>
				   </div>
				   </h3>
				   <div>
					   <form method="POST" action="/shoefinder" class="grid-container wrapper">
						   <input name="qid" type="hidden" value="8">
						   <p class='sub-question'>
							   Choose the running experience you want.
						   </p>
						   <div class="flex-container">
							   <label class="four columns block-label">
							   <input type="radio" name="val0" value="0">
							   <div class='label-text'>
								   <span class='label-title'>Float</span>
								   <p>
									   I want more shoe to lift me off the ground.
								   </p>
							   </div>
							   </label>
							   <label class="four columns block-label">
							   <input type="radio" name="val0" value="1">
							   <div class='label-text'>
								   <span class='label-title'>Feel</span>
								   <p>
									   I want less shoe that feels lightweight and keeps me closer to the ground.
								   </p>
							   </div>
							   </label>
						   </div>
						   <ul class="followup-questions">
							   <li class="visually-hidden">
							   <p>
								   And last but not least, which experience appeals to you?
							   </p>
							   <div class="flex-container">
								   <label class="four columns block-label">
								   <input type="radio" name="val1" value="0">
								   <div class='label-text'>
									   <span class='label-title'>Cushion</span>
									   <p>
										   Soft and protective, these shoes cushion each step and let you glide through your run.
									   </p>
								   </div>
								   </label>
								   <label class="four columns block-label" id="shoe_hide1">
								   <input type="radio" name="val1" value="1">
								   <div class='label-text'>
									   <span class='label-title'>Energize</span>
									   <p>
										   Responsive and springy, these shoes add a lift to every stride.
									   </p>
								   </div>
								   </label>
							   </div>
							   </li>
							   <li class="visually-hidden">
							   <p>
								   And last but not least, which experience appeals to you?
							   </p>
							   <div class="flex-container">
								   <label class="four columns block-label">
								   <input type="radio" name="val1" value="0">
								   <div class='label-text'>
									   <span class='label-title'>Connect</span>
									   <p>
										   Lightweight and flexible, these shoes create a natural connection to the run.
									   </p>
								   </div>
								   </label>
								   <label class="four columns block-label" id="shoe_hide2">
								   <input type="radio" name="val1" value="1">
								   <div class='label-text'>
									   <span class='label-title'>Speed</span>
									   <p>
										   Fast and built for speed, these low-profile, race day shoes propel your performance to the next level.
									   </p>
								   </div>
								   </label>
							   </div>
							   </li>
						   </ul>
						   <div class="clearfix">
						   </div>
						   <button class="ss-continue" type="submit">See Results</button>
					   </form>
				   </div>
			   </div>
			   
	   <!------------------------------------------------------------- Resuls -------------------------------------------------------------- -->
	   
	   
	   
			   <div id="ss-results" style="display:none;">
				  
			   </div>
			   <!---------->
		   </div>
	   </div>
	   <script>
			   (function() {
			   console.log('shoe finder SEIF');	
				   var selectors = {'accordion':'#accordion','answered':'#accordion>h3>div>a','questions':'#accordion>h3','results':'#ss-results','header':'#ui-accordion-accordion-header-','panel':'#ui-accordion-accordion-panel-','qid':'input[name="qid"]'};
				   var baseurl = $('input[name="baseurl"]').val();
				   function initialize() {			
					   jQuery(selectors.accordion).accordion({
						   beforeActivate: function(e,ui) {
							   if (parseInt(jQuery(ui.newPanel).find(selectors.qid).val()) > jQuery(selectors.answered).length) {
								   e.preventDefault();
							   }
						   },
						   active: getActiveQuestion(),
						   heightStyle: "content",
						   collapsible: true,
						   animate: 500
					   });
					   refresh(false,".ss-continue");
				   }
				   function refresh(updateAccordion,continueSelector) {
					   updateProgressBar();				
					   var activeQuestion = getActiveQuestion();
					   if (updateAccordion) {
						   jQuery(selectors.accordion).accordion('refresh');
						   jQuery(selectors.accordion).accordion({
							   active : activeQuestion,
							   animate: 500
						   });
						   var top = 0;
					   }
					   if (activeQuestion === false) {
						   if (jQuery(selectors.results).length) {
							   top = jQuery(selectors.results).offset().top;
							   app.product.tile.init();
						   } else {
							   top = jQuery(selectors.accordion).offset().top + jQuery(selectors.accordion).outerHeight(true);
						   }					
					   } else {
						   top = jQuery(selectors.accordion).offset().top;
						   for (var i = 0; i < activeQuestion; i++) {
							   top = top + jQuery(selectors.header + i).outerHeight(true);
						   }
						   
					   }
					   jQuery(continueSelector).on('click', function(e) {
						   if (jQuery(this).attr('type') == 'submit') {
							   //alert("hi");
							   e.preventDefault();
						   }
						   submitForm(jQuery(this).closest('form'));					
					   });
					   jQuery("input:radio[name='val0']").on('click', function(e) {
						   var index = jQuery(this).val();
						   var followUpQuestions = jQuery(this).parents().siblings('.followup-questions').children();
						   if (followUpQuestions.length) {
							   jQuery(followUpQuestions).addClass('visually-hidden');
							   jQuery(followUpQuestions[index]).removeClass('visually-hidden');
						   }
					   });
				   } // end of referesh method.
				   function getActiveQuestion() {
					   var qs = jQuery(selectors.questions).length;
					   var as = jQuery(selectors.answered).length;
					   if (qs == as) {
						   return false;
					   } else {
						   return Math.min(qs - 1,as);
					   }
				   }
				   function submitForm(form) {
					   //console.log(form);
					   //return;
					   if ((jQuery(form).find("input[name='val0']").length && jQuery(form).find("input[name='val0']:checked").val() == undefined) || (jQuery(form).find("li:not(.visually-hidden) input[name='val1']").length && jQuery(form).find("li:not(.visually-hidden) input[name='val1']:checked").val() == undefined)) {
						   return false;
					   }
					   jQuery(form).find("li.visually-hidden input[name='val1']").attr('checked', false);
	   
					   var env = 'development';
					   if(env == 'production'){
						   if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-0') {
							   ga('send', 'pageview', '/step-1/');
						   } else if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-1') {
							   ga('send', 'pageview', '/step-2/');
						   } else if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-2') {  
							   ga('send', 'pageview', '/step-3/');
						   } else if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-3') { 
							   ga('send', 'pageview', '/step-4/');
						   } else if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-4') { 
							   ga('send', 'pageview', '/step-5/');
						   } else if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-5') { 
							   ga('send', 'pageview', '/step-6/');
						   } else if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-6') { 
							   ga('send', 'pageview', '/step-7/');
						   } else if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-7') { 
							   ga('send', 'pageview', '/step-8/');
						   } else if(jQuery(form).parent().attr('id') == 'ui-accordion-accordion-panel-8') { 
							   ga('send', 'pageview', '/form-completed-see-results/');
						   }
					   }
	   
					   jQuery.post(
						   baseurl + "shoefinder/ajax_data",
						   jQuery(form).serialize(),
						   function(html) {
							   console.log("succes data");
							   console.log(html);
							   getscore(html);
							   showSuccess(form,html);						
						   },
						   'html'
					   );
									   
				   }
			   
				   function getscore(html){
					   var totalscore=$(html).find(".totalscore").text();
					   console.log("totalscore"+totalscore);
					   var a=document.getElementById("shoe_status").value;
					   console.log("a value"+a);
						if(a=='trail'){
							console.log("exist in trail");
							if(totalscore <= 50 ){
							   document.getElementById("shoe_hide1").style.visibility = "visible";
							   document.getElementById("shoe_hide2").style.visibility = "visible";
							}else{
							   document.getElementById("shoe_hide1").style.visibility = "hidden";
							   document.getElementById("shoe_hide2").style.visibility = "hidden";
							 }
						}else if(a=='road'){   
						   document.getElementById("shoe_hide1").style.visibility = "visible";
						   document.getElementById("shoe_hide2").style.visibility = "visible";
						}
				   }
				   function updateProgressBar() {
					   var progressBar = jQuery('#progressBar');
					   var progressValue = jQuery(selectors.answered).length / jQuery(selectors.questions).length * 100;
					   var qs = jQuery(selectors.questions).length;
					   var as = jQuery(selectors.answered).length;
					   console.log(as); //added
					   progressBar.progressbar({
						   value: progressValue,
						   create: function() {
							   if (as === 0) {
								   jQuery('#ssRunner').css('left', -3 + '%');  
							   } else if (as === 1){      				
								   jQuery('#ssRunner').css('left', 5 + '%');
							   } else {
								   jQuery('#ssRunner').css('left', (as - 1) + '5%');
							   }
							 },
						   change: function() {  
							   if (as === 1){      				
								   jQuery('#ssRunner').css('left', 5 + '%');
							   } else {
								   jQuery('#ssRunner').css('left', (as - 1) + '5%');
							   }      				        				
							 },
						   complete: function() {
							   //jQuery('.ui-progressbar-value').text('Complete!'); 
							   jQuery('html, body').animate({        				
								   scrollTop: jQuery('#accordion').prop('scrollHeight')
							   }, 500);    				
							 }
					   });							
					   checkLabel();
					   if (as >= 2) {
						   mobileAccTop();
					   }								
				   }												
				   function showSuccess(form,html) {
					   var qid = parseInt(jQuery(form).find(selectors.qid).val());
					   jQuery(selectors.panel + qid).remove(); // removes the accordin panel (which is a div) after h3
					   jQuery(selectors.header + qid).remove(); // removes the header panel (which is a h3)
					   if (qid == 0) {
						   jQuery(selectors.header + (qid + 1)).before(html);
					   } else {
						   jQuery(selectors.panel + (qid - 1)).after(html);
					   }
					   refresh(true,selectors.panel + qid + " .ss-continue");
					   if (jQuery(selectors.accordion).accordion('option','active') === false) {
						   console.log('no accordion active');
						   //return;
						   jQuery.get(
							   baseurl + "shoefinder/get_shoe",
							   function(html) {
								   console.log('get callback');
								   if (jQuery(selectors.results).length) {
									   jQuery(selectors.results).remove();
								   }
								   jQuery(selectors.accordion).after(html);
								   jQuery(selectors.results).css('display','');
								   //app.product.tile.init();
							   },
							   'html'											
						   );
						   //loading gif for results
						   //jQuery('body').append('<div id="loading"><img src="http://test.texaspeak.com.au/brooks/test/images/SS/ss-runner.gif" /></div>');
					   }									
				   }
				   //add checked class to selected inputs for bkgd color
				   function checkLabel() {
					   var checkLabel = jQuery('label.columns.block-label input');		
					   checkLabel.filter(':checked').parent().addClass('checked');
					   checkLabel.change(function() {
						   checkLabel.parent().removeClass('checked');
						   checkLabel.filter(':checked').parent().addClass('checked');														
					   });					
				   }
				   //sticky progress bar
				   function stickyBar(){  				
					   $(window).scroll(function(){      				    				   			          			        			        			
						   var ot = $('#ss-quiz-banner').offset().top;
						   //console.log("ot: " + ot);
						   var st = $(window).scrollTop();
						   var progBar = $('.progress-bar');
						   if (st > ot && !progBar.hasClass('sticky') && $(selectors.answered).length < 9) {  
							   progBar.addClass('sticky');            			
						   } else if (st <= ot) {  
							   progBar.removeClass('sticky');            			
						   } else if ($(selectors.answered).length > 8){
							   progBar.removeClass('sticky');
						   }
					   });     			
				   };			
				   function scrollToElement(selector, time, verticalOffset) {
					   time = typeof(time) != 'undefined' ? time : 1000;
					   verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
					   element = $(selector);
					   offset = element.offset();
					   offsetTop = offset.top + verticalOffset;
					   $('html, body').animate({
						   scrollTop: offsetTop
					   }, time);           
				   }; 		
				   //close modal and scroll back if on small screen
				   function mobileAccTop(){	
					   var as = jQuery(selectors.answered).length;			
					   var active = $(".ui-accordion-header").eq(as-2);										
					   if ($(window).width() <= 768){						
						   scrollToElement(active, 400);
					   }
				   };
				   checkLabel();
				   stickyBar();					
				   initialize();			
			   })();		
		   </script>

@endsection