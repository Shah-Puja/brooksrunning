@extends('customer.layouts.master')
@section('content')
@php
	use App\Http\Controllers\CategoryController;
	$heading='';
	switch($category){
		case 'neutral': $heading = "Neutral Running Shoes";break;
		case 'support': $heading = "support Running Shoes";break;
		case 'trail': $heading = "Trail Running Shoes";break;
		case 'competition': $heading = "competition Running Shoes";break;
		case 'x-training': $heading = "Cross Trainer Shoes";break;
		case 'walking': $heading = "Walking shoes";break;
	}
@endphp
<link rel="stylesheet" href="css/main.css">
<section class="ctg-main-container">
<div class="create-account--header plp-header">
  <div class="wrapper">
    <div class="row">
      <div class="col-8">
      	<div class="about-header">
      	<div class="breadcrumbs">
					<ul>
						<li>
							<a href="#">Home</a>
						</li>
						<li>
							<a href="JavaScript:Void(0);" class="active">{{$heading}}</a>
						</li>
					</ul>
				</div>
        
          <h1 class="br-mainheading">{{$heading}}</h1>
            <p>{{$page_info['header_text']}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="ctg-container">
	<div class="wrapper">
		<div class="row">
			<div class="ctg-wrapper-container">
				@foreach($shoes_category_product as $items)
				<div class="mob-6 tab-4 col-4">
					<div class="ctg-wrapper__sub">
						<div class="ctg-product">
							<div class="offer-info">
								@if(isset($items->experience))
									@if($items->experience == 'Cushion Me')
										<img src="{{ config('site.image_url.base_shoe_new_exp')}}cushion.png" alt="Cushion Badge" width="100" height="100" />
									@elseif ($items->experience == 'Energize Me')
										<img src="{{ config('site.image_url.base_shoe_new_exp')}}energize.png" alt="Energize Badge" width="100" height="100" />
									@elseif ($items->experience == 'Connect Me') 
										<img src="{{ config('site.image_url.base_shoe_new_exp')}}connect.png" alt="Connect Badge" width="100" height="100" />
									@elseif ($items->experience == 'Propel Me') 
										<img src="{{ config('site.image_url.base_shoe_new_exp')}}speed.png" alt="Speed Badge" width="100" height="100" />
									@endif
								@endif
							</div>
							<div class="img img-shoes">
							@if($items->category == "x-training")
								<img id="plp-img" src="{{ config('site.image_url.base_category_img')}}x_training/img/{{ strtolower($items->shoe_type) }}.jpg" alt="">
							@else
							<img id="plp-img" src="{{ config('site.image_url.base_category_img').strtolower($items->category) }}/img/{{ strtolower($items->shoe_type) }}.jpg" alt="">
							@endif
							</div>						
							<div class="info">
								<h3>{{ $items->shoe_name }}</h3>
								<div class="shoes-type">{{ $items->shoe_category_desc }}</div>
								<div class="ctg-btn clearfix">
									@php
										$seo_name_women=''; $seo_name_men='';
										if(isset($items->shop_men) && $items->shop_men!=''){
											$shop_m = explode('_', $items->shop_men);
											$seo_name_men = CategoryController::get_seo_name($shop_m['0'],$shop_m['1'],'m');
											$shop_men_url = $seo_name_men."/".$items->shop_men.".html";
										}
										if(isset($items->shop_women) && $items->shop_women!=''){
											$shop_w = explode('_', $items->shop_women);
											$seo_name_women = CategoryController::get_seo_name($shop_w['0'],$shop_w['1'],'w');
											$shop_women_url = $seo_name_women."/".$items->shop_women.".html";
										}
									@endphp
									@if($items->shop_men != '' && $seo_name_men!='')
									<span><a class="secondary-button" href="{{$shop_men_url}}">Men's</a></span>
									@endif
									@if($items->shop_women != '' && $seo_name_women!='')
									<span><a class="secondary-button" href="{{$shop_women_url}}">Women's</a></span>
									@endif
								</div>
							</div>
						</div>
				   </div>
			   </div>
			   @endforeach
		    </div>
		</div>
	</div>
</section>
<section class="ctg-benefits">
	<div class="wrapper">
		<div class="row">
			<div class="ctg-benefits--content">
				<div class="tab-6 mob-12">
					<div class="shoe-category-img br-ctg-info">
					<img src="images/category/medium-high-arch.png" alt="brooks" />
					</div>
					<div class="br-ctg-info">
					<p class="br-ctg-heading">Medium - High arch height</p>
					<p>(some netural runners can <br class="visible-tab"/>have flat feet)</p>
					</div>
				</div>
				<div class="tab-6 mob-12">
					<div class="shoe-category-img2 br-ctg-info">
					<img src="images/category/normal-pronation.png" alt="brooks" />
					</div>
					<div class="br-ctg-info">
					<p class="br-ctg-heading">Normal Pronation</p>
					<p>(doesn't roll inward)</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="br-shoefinder-banner br-shoefinder-subBanner">
	<div class="br-shoefinder-banner--wrapper">
			<div class="horizontal-shoe-finder">
					<p class="br-heading hidden-mob">Need help choosing a shoe? <span class="br-info">Try the shoe finder</span></p>
					<p class="br-heading-mob visible-mob"><span class="finder-heading-mob">Need help choosing a shoe?</span> <br/> <span class="br-info-mob">Try the shoe finder</span></p>
					<div class="row">
						<div class="col-4 tab-4 mob-12 " >&nbsp;</div>
						<div class="col-4 tab-4 mob-12 " >
									<div class="horizontal-shoefinder-btn">
										<a class="primary-button" href="#">Shoe Finder</a>
									</div>
						</div>
						<div class="col-4 tab-4 mob-12 " >
							<div class="horizontal-shoefinder-logo">
											<img src="images/brooks-shoes--logo.png" alt="">
										</div>
						</div>
				</div>
		</div>
</section>
<section class="ctg-discover">
	<div class="wrapper">
		<div class="row">
			<div class="cat-desc">
				<div class="col-12">
					<h2 class="">{{$page_info['footer_h2']}}</h2>
					<p>{{$page_info['footer_text']}}</p>
				</div>
			</div>
		</div>
	</div>
</section>
</section>
@endsection