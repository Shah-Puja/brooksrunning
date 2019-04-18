@extends('customer.layouts.master')

@section('head')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
@section('content')
<section class="header-img--banner">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<picture>
					<source media="(max-width: 595px)" srcset="/storage/images/competitions/{{$competition->slug}}/{{ $competition->banner_mobile }}">
					<img src="/storage/images/competitions/{{$competition->slug}}/{{ $competition->banner }}" alt="Header Images">
				</picture>
			</div>
		</div>
	</div>
</section>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-9">
			<div class="create-account--left">
			    @if($competition->status == 'Open')
				<div class="response_content">
					<div class="row">
						<div class="col-10">
							<p>{!! $competition->comp_text !!}</p>
						</div>
					</div>
					<hr>
					<p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
					
					@if(!empty($competition->comp_form_html))
						{!! $competition->comp_form_html !!}
							<input type="hidden" name="comp_name" value="{{ $competition->comp_name }}" />
							<input type="hidden" name="comp_slug" value="{{ $competition->slug }}" />
							<div class="row" style="margin-top:20px;">
								<div class="tab-6">
									<div class="input-wrapper">
										<div class="g-recaptcha captcha" data-sitekey="{{ config('services.google.recaptcha_key') }}"></div>
										<label class="recaptcha-label"></label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="tab-12">
									<!-- <div class="cart-btn">
										<button class="primary-button">Enter</button>
									</div> -->
									<div class="cart-btn comp-submit" >
										<div class="alignleft inline-loader">
											<button class="primary-button" id="comp_submit_btn">Enter</button>
										</div>
										<div class="alignright inline-loader">
											<div id = "comp_loader" style="display:none">
												<img src = "/images/loader.gif" alt="comp-loader"/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					@endif
				
				</div>
				@else
				<div class="row">
					<div class="col-10">
						{!! $competition->close_text !!}
					</div>
				</div>
				@endif
				<div class="row">
					<div class="tab-12">
						<div class="comp_bottom">
							{!! $competition->footer_text !!}
							@if($competition->status == 'Open')
								@if(!empty($competition->terms_conditions_html))
								<p class="privacy">Click here to view the <a class="privacy-terms--popup" href="javascript:void(0)">Terms &amp; Conditions of Entry</a></p>                            
								@endif
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Learn more -->
	 @if(!empty($competition->learn_more))
		 @include('meet_brooks.competition.learn_more.'.$competition->learn_more)
	@endif
	<!-- /Learn more -->
  <div class="privacy-terms--wrapper popup-container afterpay--popup">
    <div class="popup-container--wrapper">
        <div class="popup-container--info">
			<div class="close-me"><span class="icon-close-icon afterpay-popup--close"></span></div>  
			@if(!empty($competition->terms_conditions_html))      
			<div class="privacy-content">{!!$competition->terms_conditions_html!!}</div>
			@endif
		</div>
	</div>
    </div>
</section>

<script>
function insert_competition(){
	$("#comp_loader").show();
	$("#comp_submit_btn").addClass("disable");
	$("#competition input,#competition select").removeClass("error-border");
	$("#competition input,#competition select").parent().find('label span').remove();
	var form_data =  $('#competition').serialize();
	$.ajax({
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
		url: "/meet_brooks/competition", 
		method: "post", 
		data: form_data,
		success: function(response) {
			@if(!empty($competition->learn_more))
			   window.location.href="/meet_brooks/competition/thank_you";
			@endif
			$(".response_content").html(response.success);
			$("#learn_more").show();
			return false;
		},
		error: function(error){
			$("#comp_loader").hide();
			$("#comp_submit_btn").removeClass("disable");
			let obj = JSON.parse(error.responseText);
			let response = grecaptcha.getResponse();
			if(response==''){;
				let label_text =  $(".recaptcha-label").html("");
				let error_span = " <span class='error'>The recaptcha field is required.</span>";
				let error = error_span ;
				$(".recaptcha-label").html(error);
			}else{
				grecaptcha.reset();
			}
			$.each( obj.errors, function( key, value ) {
				if(key=='gender'){
					var input_label = $(".gender-label");
				}else{
					var input_label = $("#competition input[name="+key+"],#competition select[name="+key+"]").parent().find('label');
					$("#competition input[name="+key+"],#competition select[name="+key+"]").addClass("error-border");
				}
				let label_text = input_label.html();
				let error_span = " <span class='error'>"+ value +"</span>";
				let error = label_text + error_span ;
				input_label.html(error);
			});
		}
	});
	return false;
}
</script>

@endsection