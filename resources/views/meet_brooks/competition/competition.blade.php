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
			    @if($competition->status == 'Open')
				<div class="row">
					<div class="col-10">
						<p>{{ $competition->comp_text }}</p>
					</div>
				</div>
				<hr>
				<p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
				    @if(!empty($competition->comp_form))
						@include('meet_brooks.competition.'.$competition->comp_form)
					@endif
				@endif
				<div class="row">
					<div class="tab-12">
						<div class="comp_bottom">
							{!! $competition->footer_text !!}
							@if($competition->status == 'Open')
								@if(!empty($competition->terms_conditions))
								<p class="privacy">Click here to view the <a class="privacy-terms--popup" href="javascript:void(0)">Terms &amp; Conditions of Entry</a></p>                            
								@endif
							@endif
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
            <div class="privacy-content">@include('meet_brooks.terms_conditions.'.$competition->terms_conditions)</div>
		</div>
	</div>
    </div>
</section>

@endsection