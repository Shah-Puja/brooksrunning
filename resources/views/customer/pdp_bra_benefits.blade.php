@php  
  $benefit_1 = (!empty($product->benefit_1)) ? explode('#', $product->benefit_1) : ''; 
  $benefit_2 = (!empty($product->benefit_2)) ? explode('#', $product->benefit_2) : ''; 
  $benefit_3 = (!empty($product->benefit_3)) ? explode('#', $product->benefit_3) : ''; 
@endphp
@if($benefit_1)
<section class="pdp-container--benefits">
	<div class="wrapper module-header">
		<div class="col-12">
			<div class="module-heading">
			  <h3 class="br-mainheading">Benefits</h3>
			</div>
			<div class="module-img">
				<img src="/images/details/pdp-benefits-top.jpg" alt="">
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
				<div class="img">
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
				<div class="img right">
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
</section>
@endif

<!-- Size chart popup  -->
<div id="sizechart-popup--wrapper" class="popup-container size-chart--popup">
	<div class="popup-container--wrapper">
		<div class="popup-container--info">
			<div class="close-me" id="sizechart-popup--close"><span class="icon-close-icon"></span></div>
			<!-- bras size chart -->
			<div class="size-chart--bras" >
				<h3 class="br-heading">Sports Bras</h3>
				<div class="info">
					<h4>Sizing guide</h4>
					<p>Sizing on BrooksRunning.com is displayed in US sizes only.</p>
					<div class="bras-size--table">
						<table>
							<thead>
								<tr>
									<th colspan="2">&nbsp;</th>
									<th>US</th>
									<th>EURO</th>
									<th>AU</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th rowspan="5" class="blue-bg">A/B<br>CUP</th>
									<td class="dark-bg">XS/XP</td>
									<td>30AB-32A</td>
									<td>65AB-70A</td>
									<td>8AB-10A</td>
								</tr>
								<tr>
									<td class="dark-bg">S/P</td>
									<td>32AB-34A</td>
									<td>70AB-75A</td>
									<td>10AB-12A</td>
								</tr>
								<tr>
									<td class="dark-bg">M/M</td>
									<td>34AB-36A</td>
									<td>75AB-80A</td>
									<td>12AB-14A</td>
								</tr>
								<tr>
									<td class="dark-bg">L/G</td>
									<td>36AB-38A</td>
									<td>80AB-85A</td>
									<td>14AB-16A</td>
								</tr>
								<tr>
									<td class="dark-bg">XL/TG</td>
									<td>38AB-40A</td>
									<td>85AB-90A</td>
									<td>16AB-18A</td>
								</tr>
								<tr>
									<th rowspan="5" class="blue-bg">C/D<br>CUP</th>
									<td class="dark-bg">XS/XP</td>
									<td>30CD-32C</td>
									<td>65CD-70C</td>
									<td>8ACD-10C</td>
								</tr>
								<tr>
									<td class="dark-bg">S/P</td>
									<td>32CD-34C</td>
									<td>70CD-75C</td>
									<td>10CD-12C</td>
								</tr>
								<tr>
									<td class="dark-bg">M/M</td>
									<td>34CD-36C</td>
									<td>75CD-80C</td>
									<td>12CD-14C</td>
								</tr>
								<tr>
									<td class="dark-bg">L/G</td>
									<td>36CD-38C</td>
									<td>80CD-85C</td>
									<td>14CD-16C</td>
								</tr>
								<tr>
									<td class="dark-bg">XL/TG</td>
									<td>38CD-40C</td>
									<td>85CD-90C</td>
									<td>16CD-18C</td>
								</tr>
								<tr>
									<th rowspan="5" class="blue-bg">XS-XL<br>SIZING</th>
									<td class="dark-bg">XS/XP</td>
									<td>30-32</td>
									<td>65-70</td>
									<td>8-10</td>
								</tr>
								<tr>
									<td class="dark-bg">S/P</td>
									<td>32-34</td>
									<td>70-75</td>
									<td>10-12</td>
								</tr>
								<tr>
									<td class="dark-bg">M/M</td>
									<td>34-36</td>
									<td>75-80</td>
									<td>12-14</td>
								</tr>
								<tr>
									<td class="dark-bg">L/G</td>
									<td>36-38</td>
									<td>80-85</td>
									<td>14-16</td>
								</tr>
								<tr>
									<td class="dark-bg">XL/TG</td>
									<td>38-40</td>
									<td>85-90</td>
									<td>16-18</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /bras size chart -->
	     </div>
    </div>
</div>
<!-- /Size chart popup -->