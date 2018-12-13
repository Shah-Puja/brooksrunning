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
					<source media="(max-width: 595px)" srcset="/images/competition-single/{{ $competition->banner_mobile }}">
					<img src="/images/competition-single/{{ $competition->banner }}" alt="Header Images">
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
				<div class="row">
					<div class="col-10">
						<p>{!! $competition->comp_text !!}</p>
					</div>
				</div>
				<hr>
				<div class="response_content">
					<p class="privacy"><sup>*</sup>Indicates a required field</a>.</p>
						@if(!empty($competition->comp_form))
							@include('meet_brooks.competition.'.$competition->comp_form)
						@endif
					@endif
				</div>
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
			$(".response_content").html(response.success);
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