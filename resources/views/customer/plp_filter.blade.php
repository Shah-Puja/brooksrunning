<div class="col-3 tab-4 mobile-plp--filter plp-mob-filter__control">
	<div class="mobile-plp--main">
		<div class="mobile-plp--close">
			<span class="icon-close"></span>
		</div>
		<div class="plp-filter">
			<ul class="plp-filter--wrapper">
				@php $category_array = __($prod_type.'_Category') @endphp 
				@if(is_array($category_array))
					<li class="filter-menu">
						<label class="label br-mainheading category-heading">Categories</label>
						<ul class="filter-list filter-list--category clearfix">
							@foreach($category_array as $category)
							    @if($prod_type=='Apparel')
									@if($flag_bra=='Yes') <!-- Sports Bras category -->
										@if($category['Sports_bra']!='')
											@foreach($category['Sports_bra'] as $value)
												<a href="{{ $value[$gender.'_url'] }}">
													<li class="fullbox-filter category">
														{{ $value['name'] }}
													</li>
												</a>
											@endforeach
										@endif
									@else <!-- apparel Category -->
										@foreach($category['Clothes'] as $value)
										    @if(!($gender=='M' && $value['name']=='Sports Bras'))
												<a href="{{ $value[$gender.'_url'] }}">
													<li class="fullbox-filter category">
														{{ $value['name'] }}
													</li>
												</a>
											@endif
										@endforeach
									@endif
								@else  <!-- Footwear Category -->
									<a href="{{ $category[$gender.'_url'] }}">
										<li class="fullbox-filter category">
											{{ $category['name'] }}
										</li>
									</a>
								@endif
							@endforeach
						</ul>
					</li>
				@endif
				@if(count($filters)>0)
					<li class="filter-heading">
						<h3>Filter</h3>
					</li>
					@foreach($filters as $key=>$values)
						@if(count($values)>0)
							@if($key == 'Size' || $key == 'Cup_Size')
								<li class="filter-menu">
									<label class="label">{{ str_replace("_"," ",$key) }}</label>
									<ul class="filter-list clearfix">
										@foreach($values as $filter_value)
											<li class="size-filter">
												<a href="#" data-filter-attribute="{{ $key}}" data-filter-value=" ">{{ $filter_value }}</a>
											</li>
										@endforeach
									</ul>
								</li>
							@elseif($key == 'Color')
								<li class="filter-menu">
									<label class="label">COLOR</label>
									<ul class="filter-list clearfix">
										@foreach($values as $filter_value)
											<li class="fullbox-filter color-filter">
												<div class="input-wrapper">
													<div class="checklist-inline">
														<input type="checkbox" id="{{ $filter_value }}">
														<label for="{{ $filter_value }}">
																<div class="mark" style="background-color: {{ $filter_value }}"><span></span></div>
																<div class="text">{{ $filter_value }}</div>
														</label>
													</div>
												</div>	
											</li>
										@endforeach
									</ul>
								</li>
							@else
								<li class="filter-menu">
								<label class="label">{{ str_replace("_"," ",$key) }}</label>
								<ul class="filter-list clearfix">
									@foreach($values as $filter_value)
										@if($filter_value!='')
											<li class="fullbox-filter">
												<div class="input-wrapper">
													<div class="checklist-inline">
														<input type="checkbox" id="{{ $filter_value }}">
														<label for="{{ $filter_value }}">
																<div class="mark"><span></span></div>
																<div class="text">{{ $filter_value }}</div>
														</label>
													</div>
												</div>	
											</li>
										@endif
									@endforeach
								</ul>
							</li>
							@endif
						@endif
					@endforeach
				@endif
			</ul>
		</div>
	</div>
	@if(strtolower($prod_type)=='footwear')
		<div class="plp-store-finder">
			<h3 class="br-heading">Need help<br/>choosing a shoe?</h3>
			<p class="br-info">Try the shoe finder</p>
			<a class="primary-button" href="#">Shoe Finder</a>
			<img src="images/brooks-shoes--logo.png" alt="">
		</div>
	@endif
</div>