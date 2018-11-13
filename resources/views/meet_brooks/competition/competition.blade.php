@extends('customer.layouts.master')

@section('head')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
<section class="header-img--banner">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<!-- for different banner ipad and mobile
					<picture>
					    <source media="(max-width: 595px)" srcset="images/home/82018_Wave8_HP_FW_1b_SM.jpg">
					    <img src="/images/home/82018_Wave8_HP_FW_1b_BIG.jpg" alt="Header Images">
				    </picture>
			    -->
				<img src="/images/competition/banner.jpg" width="100%" alt="competetion">
			</div>
		</div>
	</div>
</section>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-9">
			<div class="create-account--left">
				<div class="row">
					<div class="col-10">
						<p>For your chance to WIN a pair of new Brooks Levitate 2 running shoes, fill in your details below and sign up to the Brooks e-newsletter, The Run Down to receive updates on the latest Brooks styles, training tips and so much more!</p>
					</div>
				</div>
				<hr>
				<p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
					@include('meet_brooks.competition.'.$comp_name."_form")
				<div class="row">
					<div class="tab-12">
						<div class="comp_bottom">
							<p>Competition Closes: 14th December 2018</p>
							<p class="notice">Brooks Sports will not use your email address or information for any purpose other than notifying the winner of the competition and distributing our email newsletter. You must be an Australian resident to be eligible for any prize drawing.</p>
							<p class="privacy">Click here to view the <a class="privacy-terms--popup" href="#">Terms &amp; Conditions of Entry</a></p>                            
                    	</div>
					</div>
				</div>
			</div>
		</div>
	</div>

  <div class="privacy-terms--wrapper popup-container afterpay--popup">
    <div class="popup-container--wrapper">
        <div class="popup-container--info">
			<div class="close-me"><span class="icon-close-icon afterpay-popup--close"></span></div>        
            <div class="privacy-content">@include('meet_brooks.terms_conditions.'.$comp_name."_terms")</div>
		</div>
	</div>
    </div>
</section>

@endsection