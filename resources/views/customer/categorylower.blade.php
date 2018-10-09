@extends('customer.layouts.master')

@section('content')

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<section class="create-account--header plp-header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="#">Home</a>
						</li>
						<li>
							<a href="#">{{ $gender=='M' ? 'Mens' : 'Womens' }}</a>
						</li>
						 @php $page_name = str_replace("-"," ",Request::segment(1)); @endphp
						<li>
							<a href="/{{Request::segment(1)}}" class="active">{{ ucwords($page_name) }}</a>
						</li>
					</ul>
				</div>
				<h1 class="br-mainheading">{{ ucwords($page_name) }}</h1>
				<!--<div class="sub-info">
					Ready for any workout, Our women's running gear proves "look good, feel good" is true.
				</div>-->
			</div>
		</div>
	</div>
</section>
<section class="plp-container">
	<div class="wrapper">
		<div class="row">
		    @include('customer.plp_filter')
			<div class="col-9 tab-8">
				<div class="row">
					<div class="col-6 tab-5 mob-12 hidden-mob">
						<div class="all-product--count">
							<p>{{ ucwords($page_name) }} (<span>{{ ($styles)? count($styles) : '0'}}</span>)</p>
						</div>
					</div>
					<div class="col-2 tab-1 mob-6">
						<div class="input-wrapper sort-by visible-mob" id="mob-filter--popup">
							<label for="">Filter</label>
							<div class="plp-filter-mob" >Filters</div>
				        </div>
					</div>
					<div class="col-4 tab-6 mob-6">
						<div class="input-wrapper sort-by">
							<label for="">SORT BY</label>
							<div class="custom-select">
						        <div class = "select-box">
								    <div class = "label-heading">
								    	<span class="text">Price (Low To High)</span> 
								    	<div class="sel-icon">
								    		<span class="icon-down-arrow"></span>
								    	</div>
								    </div>
								    <ul class="select-option--wrapper">
								    	<li class="option-value" data-value="">-</li>
								    	<li class="option-value" data-sorttype="ass" value="price">Price (High To Low)</li>
								    	<li class="option-value selected" data-sorttype="dec" value="price">Price (Low To High)</li>
								    	<li class="option-value" data-sorttype="name" value="name">Product Name (A To Z)</li>
								    </ul>
								</div>
						    </div>
				        </div>
					</div>
				</div>
				<div class="row">
				
					@if(strtolower($prod_type)=='footwear')
						@include('customer.plp_shoe_content')
					@else
						@include('customer.plp_apparel_content')
					@endif
			    </div>
			</div>
			<div class="filter-mob--apply plp-mob-filter__control">
				<a href="#">Apply</a>
			</div>
	    </div>
	</div>
</section>
@endsection
