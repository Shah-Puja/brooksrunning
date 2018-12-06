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
					<img src="/images/competition-single/{{ $competition->banner_desktop }}" alt="Header Images">
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
					@include('staff_competition.'.$comp_name.'_form')
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<script>
function insert_staff_competition(){
	$("#staff_competition input,#staff_competition select").removeClass("error-border");
	$("#staff_competition input,#staff_competition select").parent().find('label span').remove();
	var form_data =  $('#staff_competition').serialize();
	$.ajax({
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
		url: "/staffcompetition/insert", 
		method: "post", 
		data: form_data,
		success: function(response) {
			$(".response_content").html(response.success);
			return false;
		},
		error: function(error){
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
					var input_label = $("#staff_competition input[name="+key+"],#staff_competition select[name="+key+"]").parent().find('label');
					$("#staff_competition input[name="+key+"],#staff_competition select[name="+key+"]").addClass("error-border");
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