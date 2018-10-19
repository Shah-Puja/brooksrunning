<section class="pdp-container--benefits">
@php  
    $benefit_1 = (!empty($product->benefit_1)) ? explode('#', $product->benefit_1) : ''; 
    $benefit_2 = (!empty($product->benefit_2)) ? explode('#', $product->benefit_2) : ''; 
    $benefit_3 = (!empty($product->benefit_3)) ? explode('#', $product->benefit_3) : ''; 
    $add_benefit_1 = (!empty($product->add_benefit_1)) ? explode('#', $product->add_benefit_1) : ''; 
    $add_benefit_2 = (!empty($product->add_benefit_2)) ? explode('#', $product->add_benefit_2) : ''; 
    $add_benefit_3 = (!empty($product->add_benefit_3)) ? explode('#', $product->add_benefit_3) : ''; 
@endphp
@if($benefit_1)
	<div class="wrapper module-header">
		<div class="col-12">
			<div class="module-heading">
			  <h3 class="br-mainheading">Benefits</h3>
			</div>
			<div class="module-img">
				<picture>
					@php $benefit_desktop_url =  ($product->benefit_desktop!='') ? benefit_img_check($product->benefit_desktop) : '';
					     $benefit_mobile_url =  ($product->benefit_mobile!='') ? benefit_img_check($product->benefit_mobile) : '';
					@endphp
					@if($benefit_desktop_url!='')
						<source media="(max-width: 595px)" srcset="{{ $benefit_mobile_url }}">
					@endif

					@if($benefit_desktop_url!='')
						<img src="{{ $benefit_desktop_url }}" alt="Header Images">
				    @endif
				</picture>
			</div>
		</div>
	</div>
	<div class="full-wrapper module-info">
		<div class="row">
			<div class="col-6">
				<div class="info-wrapper clearfix">
					<div class="info right">
					 	<h3 class="br-heading">{{ (isset($benefit_1[1]) &&  $benefit_1[1]!='') ? $benefit_1[1] : "" }}</h3>
						<p class="br-info">{{ (isset($benefit_1[2]) &&  $benefit_1[2]!='') ? $benefit_1[2] : "" }}</p>
					</div>
			    </div>
			</div>
			<div class="col-6">
				<div class="img">
					@php $benefit_1_img_url = (isset($benefit_1[3]) &&  $benefit_1[3]!='') ? benefit_img_check($benefit_1[3])  : "" ; @endphp
                    @if($benefit_1_img_url!='')
						<picture>
							<source media="(max-width: 595px)" srcset="{{ $benefit_1_img_url }}">
							<img src="{{ $benefit_1_img_url }}" alt="Header Images">
						</picture>
				    @endif
				</div>
			</div>
		</div>
	</div>
		@if($benefit_2!='')
		<div class="full-wrapper module-info">
			<div class="row">
				<div class="col-6 visible-mob visible-tab">
					<div class="info-wrapper clearfix">
						<div class="info">
							<h3 class="br-heading">{{ (isset($benefit_2[1]) &&  $benefit_2[1]!='') ? $benefit_2[1] : "" }}</h3>
							<p class="br-info">{{ (isset($benefit_2[2]) &&  $benefit_2[2]!='') ? $benefit_2[2] : "" }}</p>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="img left">
						@php $benefit_2_img_url = (isset($benefit_2[3]) &&  $benefit_2[3]!='') ? benefit_img_check($benefit_2[3])  : "" ; @endphp
						@if($benefit_2_img_url!='')
							<picture>
								<source media="(max-width: 595px)" srcset="{{ $benefit_2_img_url }}">
								<img src="{{ $benefit_2_img_url }}" alt="Header Images">
							</picture>
						@endif
					</div>
				</div>
				<div class="col-6 hidden-mob hidden-tab">
					<div class="info-wrapper clearfix">
						<div class="info">
							<h3 class="br-heading">{{ (isset($benefit_2[1]) &&  $benefit_2[1]!='') ? $benefit_2[1] : "" }}</h3>
							<p class="br-info">{{ (isset($benefit_2[2]) &&  $benefit_2[2]!='') ? $benefit_2[2] : "" }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
		@if($benefit_3!='')
		<div class="full-wrapper module-info">
			<div class="row">
				<div class="col-6">
					<div class="info-wrapper clearfix">
						<div class="info right">
							<h3 class="br-heading">{{ (isset($benefit_3[1]) &&  $benefit_3[1]!='') ? $benefit_3[1] : "" }}</h3>
							<p class="br-info">{{ (isset($benefit_3[2]) &&  $benefit_3[2]!='') ? $benefit_3[2] : "" }}</p>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="img">
						@php $benefit_3_img_url = (isset($benefit_3[3]) &&  $benefit_3[3]!='') ? benefit_img_check($benefit_3[3])  : "" ; @endphp
						@if($benefit_3_img_url!='')
							<picture>
								<source media="(max-width: 595px)" srcset="{{ $benefit_3_img_url }}">
								<img src="{{ $benefit_3_img_url }}" alt="Header Images">
							</picture>
						@endif
					</div>
				</div>
			</div>
		</div>
		@endif
	@endif
	@if($add_benefit_1!='')
	<div class="full-wrapper module-additional">
		<div class="row">
			<div class="col-12">
				<div class="heading">
					<h3>ADDITIONAL BENEFITS</h3>
				</div>
			</div>
		</div>
		<div class="row cust-grid">
			<div class="col-4">
				<div class="info">
					<h4>{{ (isset($add_benefit_1[1]) &&  $add_benefit_1[1]!='') ? $add_benefit_1[1] : "" }}</h4>
					<p>{{ (isset($add_benefit_1[2]) &&  $add_benefit_1[2]!='') ? $add_benefit_1[2] : "" }}</p>
				</div>
			</div>
			@if($add_benefit_2!='')
			<div class="col-4">
				<div class="info">
					<h4>{{ (isset($add_benefit_2[1]) &&  $add_benefit_2[1]!='') ? $add_benefit_2[1] : "" }}</h4>
					<p>{{ (isset($add_benefit_2[2]) &&  $add_benefit_2[2]!='') ? $add_benefit_2[2] : "" }}</p>
				</div>
			</div>
			@endif
			@if($add_benefit_3!='')
			<div class="col-4">
				<div class="info">
					<h4>{{ (isset($add_benefit_3[1]) &&  $add_benefit_3[1]!='') ? $add_benefit_3[1] : "" }}</h4>
					<p>{{ (isset($add_benefit_3[2]) &&  $add_benefit_3[2]!='') ? $add_benefit_3[2] : "" }}</p>
				</div>
			</div>
			@endif
		</div>
	</div>
	@endif
</section>

<!-- Size chart popup  -->
<div id="sizechart-popup--wrapper" class="popup-container size-chart--popup">
	<div class="popup-container--wrapper">
		<div class="popup-container--info">
			<div class="close-me" id="sizechart-popup--close"><span class="icon-close-icon"></span></div>
			<!-- shoes size chart -->
			<div class="tab-container">
				<ul class="tabs size-chart--tab">
					<li class="tab-link current" data-tab="tab-1">
						<div class="input-wrapper">
								<div class="radio-inline">
									<input type="radio" name="sizechart" id="tab-opt1" checked="checked">
									<label for="tab-opt1">
										<div class="mark"><span></span></div>
										<div class="text">General Sizing Tips</div>
									</label>
								</div>
						</div>	
					</li>
					<li class="tab-link" data-tab="tab-2">
						<div class="input-wrapper">
								<div class="radio-inline">
									<input type="radio" name="sizechart" id="tab-opt2">
									<label for="tab-opt2">
										<div class="mark"><span></span></div>
										<div class="text">Switching to Brooks?</div>
									</label>
								</div>
						</div>
					</li>
					<li class="tab-link" data-tab="tab-3">
						<div class="input-wrapper">
								<div class="radio-inline">
									<input type="radio" name="sizechart" id="tab-opt3">
									<label for="tab-opt3">
										<div class="mark"><span></span></div>
										<div class="text">International Size Chart</div>
									</label>
								</div>
						</div>
					</li>
				</ul>
				<div id="tab-1" class="tab-content current">
					<div class="size-chart-wrapper">
						<h3 class="br-heading">General Sizing Tips</h3>
						<h4>Size up</h4>
						<p>We recommend ordering Brooks running shoes 1/2 size to one size larger than normal dress shoes</p>
						<h4>Select width</h4>
						<p>For women's footwear, B is the standard width. 2A is narrow, D is wide, and 2E is extra wide. For men's footwear, D is standard, B is narrow, 2E is wide, and 4E is extra wide.</p>
						<h4>Unisex sizing</h4>
						<p>Ladies, when orderding "unisex" shoes, order 1.5 sizes smaller than your usual women's size.</p>
						<h4>Get fit</h4>
						<p>Whenever possible, visit your local running and walking footwear store for a proper fitting.</p>
						<h4>Can't make it to a store?</h4>
						<p>Our online tools can help you out. Shoefitr compares the fit of your current shoe with other models and finds your perfect fit. If you're switching to Brooks, check out our Shoe Finder, where you can either tell us what brand of shoe you wear and we'll show you something better – or you can answer five simple questions and we'll introduce you to your sole mate. And, our International Size Chart can help make the size translations for the UK, Europe, and Japan.</p>
					</div>
				</div>
				<div id="tab-2" class="tab-content">
						<div class="size-chart-wrapper">
						<div class="clearfix">
							<div class="col-4 tab-5">
								<div class="plp-store-finder">
									<h3 class="br-heading">Need help<br/>choosing a shoe?</h3>
									<p class="br-info">Try the shoe finder</p>
									<a class="primary-button" href="#">Shoe Finder</a>
									<img src="images/brooks-shoes--logo.png" alt="">
								</div>
							</div>
							<div class="col-8 tab-7">
								<h3 class="br-heading">Switching to Brooks</h3>
								<h4>Find your solemate</h4>
								<p>Running shoes are not created equal - we're the first to agree with that! But if you've been running in shoes from another brand, and want to try Brooks, it's helpful to know where to start. Check out our Shoe Finder, where you can either tell us what brand of shoe you wear and we'll show you something better – or you can answer five simple questions and we'll introduce you to your sole mate.</p>
							</div>
						</div>
					</div>
				</div>
				<div id="tab-3" class="tab-content">
					<div class="size-chart-wrapper">
						<h3 class="br-heading">International Size Chart</h3>
						<p>Sizing on BrooksRunning.com is displayed in US sizes only. For international sizes, please see conversion chart, below.</p>
						<div class="bras-size--table">
						<table>
							<tbody>
								<tr>
									<td colspan="7" class="blue-bg">International Footwear Size Chart</td>
								</tr>
								<tr>
									<td class="dark-bg">US Men</td>
									<td class="dark-bg">US Women</td>
									<td class="dark-bg">UK Men</td>
									<td class="dark-bg">UK Women</td>
									<td class="dark-bg">Europe Unisex</td>
									<td class="dark-bg">Japan Men(cm)</td>
									<td class="dark-bg">Japan Women(cm)</td>
								</tr>
								<tr>
									<td>3.5</td>
									<td>5</td>
									<td>2.5</td>
									<td>3</td>
									<td>35</td>
									<td>22.5</td>
									<td>22</td>
								</tr>
								<tr>
									<td>4</td>
									<td>5.5</td>
									<td>3</td>
									<td>3.5</td>
									<td>36</td>
									<td>23</td>
									<td>22.5</td>
								</tr>
								<tr>
									<td>4.5</td>
									<td>6</td>
									<td>3.5</td>
									<td>4</td>
									<td>36.5</td>
									<td>23</td>
									<td>23</td>
								</tr>
								<tr>
									<td>5</td>
									<td>6.5</td>
									<td>4</td>
									<td>4.5</td>
									<td>37.5</td>
									<td>23.5</td>
									<td>23.5</td>
								</tr>
								<tr>
									<td>5.5</td>
									<td>7</td>
									<td>4.5</td>
									<td>5</td>
									<td>38</td>
									<td>24</td>
									<td>24</td>
								</tr>
								<tr>
									<td>6</td>
									<td>7.5</td>
									<td>5</td>
									<td>5.5</td>
									<td>38.5</td>
									<td>24.5</td>
									<td>24.5</td>
								</tr>
								<tr>
									<td>6.5</td>
									<td>8</td>
									<td>5.5</td>
									<td>6</td>
									<td>39</td>
									<td>25</td>
									<td>25</td>
								</tr>
								<tr>
									<td>7</td>
									<td>8.5</td>
									<td>6</td>
									<td>6.5</td>
									<td>40</td>
									<td>25</td>
									<td>25.5</td>
								</tr>
								<tr>
									<td>7.5</td>
									<td>9</td>
									<td>6.5</td>
									<td>7</td>
									<td>40.5</td>
									<td>25.5</td>
									<td>26</td>
								</tr>
								<tr>
									<td>8</td>
									<td>9.5</td>
									<td>7</td>
									<td>7.5</td>
									<td>41</td>
									<td>26</td>
									<td>26.5</td>
								</tr>
								<tr>
									<td>8.5</td>
									<td>10</td>
									<td>7.5</td>
									<td>8</td>
									<td>42</td>
									<td>26.5</td>
									<td>27</td>
								</tr>
								<tr>
									<td>9</td>
									<td>10.5</td>
									<td>8</td>
									<td>8.5</td>
									<td>42.5</td>
									<td>27</td>
									<td>28</td>
								</tr>
								<tr>
									<td>9.5</td>
									<td>11</td>
									<td>8.5</td>
									<td>9</td>
									<td>43</td>
									<td>27.5</td>
									<td>28.5</td>
								</tr>
								<tr>
									<td>10</td>
									<td>11.5</td>
									<td>9</td>
									<td>9.5</td>
									<td>44</td>
									<td>28</td>
									<td>29</td>
								</tr>
								<tr>
									<td>10.5</td>
									<td>12</td>
									<td>9.5</td>
									<td>10</td>
									<td>44.5</td>
									<td>28.5</td>
									<td>29.5</td>
								</tr>
								<tr>
									<td>11</td>
									<td>12.5</td>
									<td>10</td>
									<td>10.5</td>
									<td>45</td>
									<td>29</td>
									<td>30</td>
								</tr>
								<tr>
									<td>11.5</td>
									<td>13</td>
									<td>10.5</td>
									<td>11</td>
									<td>45.5</td>
									<td>29.5</td>
									<td></td>
								</tr>
								<tr>
									<td>12</td>
									<td></td>
									<td>11</td>
									<td>11.5</td>
									<td>46</td>
									<td>30</td>
									<td></td>
								</tr>
								<tr>
									<td>12.5</td>
									<td></td>
									<td>11.5</td>
									<td>12</td>
									<td>46.5</td>
									<td>30.5</td>
									<td></td>
								</tr>
								<tr>
									<td>13</td>
									<td></td>
									<td>12</td>
									<td>13</td>
									<td>47.5</td>
									<td>31</td>
									<td></td>
								</tr>
								<tr>
									<td>14</td>
									<td></td>
									<td>13</td>
									<td>14</td>
									<td>48.5</td>
									<td>32</td>
									<td></td>
								</tr>
								<tr>
									<td>15</td>
									<td></td>
									<td>14</td>
									<td>15</td>
									<td>49.5</td>
									<td>33</td>
									<td></td>
								</tr>
								<tr>
									<td>16</td>
									<td></td>
									<td>15</td>
									<td></td>
									<td>50.5</td>
									<td>34</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
			<!-- /shoes size chart -->
	     </div>
    </div>
</div>
<!-- /Size chart popup -->