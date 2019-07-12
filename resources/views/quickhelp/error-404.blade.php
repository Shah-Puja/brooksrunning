@extends('customer.layouts.master')
@section('content')
<!-- <div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="br-mainheading">Title of the page</h1>
			</div>
		</div>
	</div>
</div> -->
<style>
.errorpage-header--wrapper{
	padding: 18px 10px;
    text-align: center;
	
}
.errorpage-header--wrapper p{
	margin: 0;
    margin-bottom: 2px;
    font-size: 18px;
	text-align:center;
}
.errorpage-header--wrapper .shoefinder-link{ color:white; font-weight:bold; font-size: 18.5px;}

.button_fixed{padding-top: 10px;}
.button_fixed_second{padding-top: 20px;}
.button_fixed_second .primary-button{margin:auto; max-width: 270px; }
.button_fixed .secondary-button{ color: #0263f7;background-color: #ffffff;
    border: 2px solid #ffffff; margin:auto; max-width: 270px; }
.button_fixed .secondary-button:hover {
    background-color: #0263f7;
    color: #ffffff;}
	.bg {
		/* The image used */
		background: url(../images/brooks-f19_apr_la_00477-1.jpg) no-repeat;
		-webkit-background-size: 100%;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		height:100vh;
		background-position: center center;
		}


@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
		.bg {
		
		height: 40vh;
    	background-position: 35% 35%;
		}
		.homepage-signup--wrapper h3{font-size: 25px;}
		.errorpage-header--wrapper p{font-size:16px;}
}

@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
	.bg {
		height: 58vh;
    background-position: 1% 100%;
		}
}
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
	/* iPhone only */
		.bg {
			height: 40vh;
    		background-position: 90% 30%;
		}
		.homepage-signup--wrapper h3{font-size: 25px;}
		.errorpage-header--wrapper p{font-size:16px;}
		.errorpage-header--wrapper .button_fixed_second {
			display: inline-block;
			padding: 1px;
    		width: 160px;
		}
		.button_fixed_second .primary-button{max-width: 200px;    padding:15px 20px;
			 font-size: 14px;}
	.errorpage-header--wrapper-onmob{
		padding-top: 75px;
	}
}

</style>
<section class="homepage-signup">
	<div class="wrapper">
		<div class="row">
			<div class="col-2 tab-2"></div>
			<div class="col-8 tab-8">
				<div class="homepage-signup--wrapper info errorpage-header--wrapper">
					<h3 class="br-heading">Oops! Looks like that page has run off!</h3>
					<p>Use our menu links or search bar to get you on the right path, <br class="hidden-mob hidden-tab visible-col"/> or check out our <a href="/shoefinder" class="shoefinder-link">Shoe Finder</a> to find your match.</p>
					<div class="button_fixed">
		       			<a class="secondary-button" href="/">Find shoes for your run</a>
		       	  </div>
				</div>
			</div>
				<!--<form name="subscriber_news1" method='post' action='/meet_brooks/enewsletter'>-->
			<div class="col-2 tab-2"></div>
		</div>
	</div>
</section>
<section class="create-account bg">
<div class="wrapper">
<div class="row">
			<div class="col-2 tab-2"></div>
			<div class="col-8 tab-8">
				<div class="homepage-signup--wrapper info errorpage-header--wrapper errorpage-header--wrapper-onmob">
					<div class="button_fixed_second">
		       			<a class="primary-button" href="/">Shop Women</a>
		       	  	</div>
					<div class="button_fixed_second">
		       			<a class="primary-button" href="/">Shop Men</a>
		       	  	</div>
				</div>
			</div>
				<!--<form name="subscriber_news1" method='post' action='/meet_brooks/enewsletter'>-->
			<div class="col-2 tab-2"></div>
</div>
</div>
</section>

@endsection