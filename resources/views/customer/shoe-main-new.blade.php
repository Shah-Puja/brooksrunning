@extends('customer.layouts.master')
@section('content')
@php
	$str = $shoe_info->shoe_type;
	$str = str_replace("-", " ", $str);
	$str = ucwords($str);
	$str = str_replace(" ", "-", $str);
@endphp
<link rel="stylesheet" href="/css/main.css">
<div class="pdp-container">
	<div class="wrapper detail-shoe-pg">
		<div class="row">
			<div class="col-7">
				<div class="breadcrumbs2 hidden-tab hidden-mob">
						<ul>
							<li>
								<a href="/">Home</a>
							</li>
							<li>
								<a href="/shoefinder">Shoes</a>
							</li>
							<li>
								<a href="#" class="active">{{$str}}</a>
							</li>
						</ul>
					</div>
					<div class="heading-wrapper clearfix">
						<div class="heading">
							<h1 class="br-heading-detail">Brooks {{$str}}</h1>
						</div>
					</div>
				<div class="pdp-container--image">
				<img src="{{ config('site.image_url.base_shoe_new').$shoe_info->shoe_type }}/heroImage_{{$shoe_info->shoe_type}}.jpg" />
				</div>
			</div>
			<div class="col-5">
				<div class="pdp-container--info">
					<div class="shoe-info-wrapper">
						<p class="br-info">
                            {!! $shoe_info->description !!}                                
                        </p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<div class="ctg-main-container ">
<section class="ctg-container ">
	<div class="wrapper">
		<div class="heading">
				@if($str == "Maximus")
					<h3 class="br-shoe-heading">Shop all Brooks Maximus Shoes</h3>
				@elseif($str == "Liberty")
					<h3 class="br-shoe-heading">Shop all Brooks Liberty Shoes</h3>
				@else
					<h3 class="br-shoe-heading">Shop All Brooks Addiction Walker Shoes</h3>
				@endif
		</div>
		<div class="row detail-shoe-pg">
			<div class="ctg-wrapper-container">
			
			@foreach($shoes_detail as $prod_key => $shoes_value)	
				<div class="mob-6 tab-4 col-4">
					<div class="shoe-wrapper__sub">
						<div class="ctg-product">
							<!-- <div class="offer-info">
								@if(isset($shoes_value->experience))
									@if($shoe_info->experience == 'Cushion Me')
										<img src="{{ config('site.image_url.base_shoe_new_exp')}}cushion.png" alt="Cushion Badge" width="100" height="100" />
									@elseif ($shoe_info->experience == 'Energize Me')
										<img src="{{ config('site.image_url.base_shoe_new_exp')}}energize.svg" alt="Energize Badge" width="100" height="100" />
									@elseif ($shoe_info->experience == 'Connect Me') {
										<img src="{{ config('site.image_url.base_shoe_new_exp')}}connect.png" alt="Connect Badge" width="100" height="100" />
									@elseif ($shoe_info->experience == 'Propel Me') {
										<img src="{{ config('site.image_url.base_shoe_new_exp')}}speed.png" alt="Speed Badge" width="100" height="100" />
									@endif
								@endif
							</div> -->
							<div class="img img-shoes">
								<img id="plp-img" src="{{ $shoes_value->image->image1Medium() }}" alt="">
							</div>						
							<div class="info">
								<h3>@if($shoes_value->gender == 'M')Men's @else Women's @endif {{$shoes_value->stylename}}</h3>
								<div class="price">{{$shoes_value->variants[$prod_key]->price_sale}}</div>
								<div class="ctg-btn clearfix">
									<span><a class="secondary-button" href="/{{$shoes_value->seo_name}}/{{$shoes_value->style}}_{{$shoes_value->color_code}}.html">Shop Now</a></span>
								</div>
							</div>
						</div>
				   </div>
			   </div>
			@endforeach   
		    </div>
		</div>
	<div class="row">
			<div class="ctg-wrapper-container">
				<div class="mob-12 tab-12 col-12 br-padding_bottm">
					<div class="heading">
						<h3 class="br-heading-detail">Specification</h3>
					</div>
					<div class="info">
						<div class="row">
						@foreach($shoe_specs as $curr_specs)	
							<div class="col-6 mob-6">
								<div class="row">
									<div class="col-6 mob-12">
										<div class="info">
											<h3>{{$curr_specs['spec_name']}} :</h3>
										</div>
									</div>
									<div class="col-6 mob-12">
										<div class="info">
											<h4>{{$curr_specs['spec_value']}}</h4>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>


@endsection