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
</section>
@endif

<!-- Size chart popup  -->
<div id="sizechart-popup--wrapper" class="popup-container size-chart--popup">
	<div class="popup-container--wrapper">
		<div class="popup-container--info">
			<div class="close-me" id="sizechart-popup--close"><span class="icon-close-icon"></span></div>
			<!-- clothing size chart -->
			<div class="size-chart--bras" >
			    @switch($product->gender)
                    @case('M')
						@php $gender = "Men's"; @endphp
                        @break
                    @case('W')
						@php $gender = "Women's"; @endphp
						@break
					@default
						@php $gender=""; @endphp
						@break	
                 @endswitch
				 <h3 class="br-heading">{{ $gender }} Clothing</h3>
				<div class="info">
					<h4>Size &amp; Fit Guide</h4>
					<p>Sizing on BrooksRunning.com is displayed in US sizes only.</p>
				</div>
				<div class="bras-size--table">
					<table>
						<tbody>
							<tr>
								<td class="blue-bg" colspan="8" style="text-align: left; padding-left: 13px;">{{ $gender }} Body Measurements (centimeters)</td>
							</tr>
							<tr>
								<td class="dark-bg">&nbsp;</td>
								<td class="dark-bg"><span class="bold">XS</span></td>
								<td class="dark-bg"><span class="bold">S</span></td>
								<td class="dark-bg"><span class="bold">M</span></td>
								<td class="dark-bg"><span class="bold">L</span></td>
								<td class="dark-bg"><span class="bold">XL</span></td>
								<td class="dark-bg"><span class="bold">XXL</span></td>
							</tr>
							<tr>
								<td>chest</td>
								<td>86-91</td>
								<td>91-96.5</td>
								<td>96.5-101.5</td>
								<td>104-109</td>
								<td>112-117</td>
								<td>119-124</td>
							</tr>
							<tr>
								<td>waist</td>
								<td>66-71</td>
								<td>73-79</td>
								<td>81-86</td>
								<td>89-94</td>
								<td>96.5-101.5</td>
								<td>104-109</td>
							</tr>
							<tr>
								<td>inseam</td>
								<td>78</td>
								<td>80</td>
								<td>81</td>
								<td>82.5</td>
								<td>84</td>
								<td>85</td>
							</tr>
							<tr>
								<td>short inseam</td>
								<td> - </td>
								<td>71</td>
								<td>73.6</td>
								<td>76</td>
								<td>78.5</td>
								<td> - </td>
							</tr>
							<tr>
								<td>tall inseam</td>
								<td> - </td>
								<td>80</td>
								<td>82.5</td>
								<td>86</td>
								<td>87.5</td>
								<td> - </td>
							</tr>
						</tbody>
					</table>
					<br>
					<br>
					<table>
						<tbody>
							<tr>
								<td class="blue-bg" colspan="7" style="text-align: left; padding-left: 13px;">Fit Descriptions</td>
							</tr>
							<tr>
								<td width="10%" class="dark-bg">&nbsp;</td>
								<td width="15%" class="dark-bg">Fitted</td>
								<td width="5%" class="dark-bg">&nbsp;</td>
								<td width="15%" class="dark-bg">Semi-Fitted</td>
								<td width="5%" class="dark-bg">&nbsp;</td>
								<td width="15%" class="dark-bg">Relaxed</td>
								<td width="5%" class="dark-bg">&nbsp;</td>
							</tr>
							<tr height="30">
								<td width="10%" class="white-bg">&nbsp;</td>
								<td width="15%" class="white-bg">Snug to the body<br/>throughout the garment.</td>
								<td width="5%" class="white-bg">&nbsp;</td>
								<td width="15%" class="white-bg">Contoured to the body.</td>
								<td width="5%" class="white-bg">&nbsp;</td>
								<td width="15%" class="white-bg">Drapes loosely on the body.</td>
								<td width="5%" class="white-bg">&nbsp;</td>
							</tr>
							<tr>
								<td width="10%" valign="top">&nbsp;</td>
								<td width="15%" valign="middle" align="center">
									<img width="100" border="0" alt="" src="/images/size-chart/top_fitted.gif"></td>
								<td width="5%" valign="middle">&nbsp;</td>
								<td width="15%" valign="middle" align="center"><img width="100" border="0" alt="" src="/images/size-chart/top_semifitted.gif"></td>
								<td width="5%" valign="middle">&nbsp;</td>
								<td width="15%" valign="middle" align="center"><img width="100" border="0" alt="" src="/images/size-chart/top_relaxed.gif"></td>
								<td width="5%" valign="middle">&nbsp;</td>
							</tr>
							<tr>
								<td width="10%" valign="top" class="white-bg">&nbsp;</td>
								<td width="15%" valign="middle" align="center" class="white-bg"><img width="100" border="0" alt="" src="/images/size-chart/bottom_fitted.gif"></td>
								<td width="5%" valign="middle" class="white-bg">&nbsp;</td>
								<td width="15%" valign="middle" align="center" class="white-bg"><img width="100" border="0" alt="" src="/images/size-chart/bottom_semifitted.gif"></td>
								<td width="5%" valign="middle" class="white-bg">&nbsp;</td>
								<td width="15%" valign="middle" align="center" class="white-bg"><img width="100" border="0" alt="" src="/images/size-chart/bottom_relaxed.gif"></td>
							</tr>
						</tbody>
					</table>
					<br>
					<br>
					<table>
						<tbody>
							<tr>
								<td class="blue-bg" colspan="3" style="text-align: left; padding-left: 13px;">How to Measure</td>
							</tr>
							<tr>
								<td width="20%" valign="top">Bust/Chest</td>
								<td width="52%" valign="top" style="text-align: left;">With arms relaxed down at sides, measure fullest part of bust/chest, keeping tape parallel to the floor.</td>
								<td width="28%" valign="top" rowspan="4" class="white-bg">
									<div align="center">
										<img height="210" width="101" border="0" src="http://demandware.edgesuite.net/aaev_prd/on/demandware.static/Sites-BrooksRunning-Site/Sites-BrooksRunning-Library/default/v1430053324817/images/content/sizing/measurefit.gif" alt="">
									</div>
								</td>
							</tr>
							<tr>
								<td width="20%" valign="top">Waist</td>
								<td width="52%" valign="top" style="text-align: left;">Measure around your natural waistline; keep your measuring tape comfortably loose.</td>
							</tr>
							<tr height="30">
								<td width="20%" valign="top">Hips</td>
								<td width="52%" valign="top" style="text-align: left;">Stand with heels together. Keeping tape straight and parallel to the floor, measure around fullest part.</td>
							</tr>
							<tr height="60">
								<td width="20%" valign="top">Inseam</td>
								<td width="52%" valign="top" style="text-align: left;">Measure inside length of your leg from crotch to bottom of ankle.</td>
							</tr>
						</tbody>
					</table>
					<br>
					<br>
					<table>
						<tbody>
							<tr>
								<td class="blue-bg" colspan="5" style="text-align: left; padding-left: 13px;">Sock Sizing</td>
							</tr>
							<tr>
								<td class="dark-bg">Sock Size</td>
								<td class="dark-bg">US Men's Shoe Size</td>
								<td colspan="3" class="dark-bg">Euro Shoe Size</td>
							</tr>
							<tr>
								<td>S</td>
								<td>N/A</td>
								<td colspan="3">N/A</td>
							</tr>
							<tr>
								<td>M</td>
								<td>6 - 8.5</td>
								<td colspan="3">40 - 42.5</td>
							</tr>
							<tr>
								<td>L</td>
								<td>9 - 11.5</td>
								<td colspan="3">41 - 45.5</td>
							</tr>
							<tr>
								<td>XL</td>
								<td>12 - 14.5</td>
								<td colspan="3">46 - 49.5</td>
							</tr>
						</tbody>
					</table>
					<br/>
					<br/>
					<table>
						<tbody>
							<tr>
								<td colspan="2" class="blue-bg" style="text-align: left; padding-left: 13px;">Glove Sizing</strong></td>
							</tr>
							<tr>
								<td width="20%" class="dark-bg">Glove Size</td>
								<td class="dark-bg">Length from Palm to Fingertip</td>
							</tr>
							<tr>
								<td>S</td>
								<td>7.5" or less</td>
							</tr>
							<tr>
								<td>M</td>
								<td>7.5"- 8"</td>
							</tr>
							<tr>
								<td>L</td>
								<td>8" - 9"</td>
							</tr>
							<tr>
								<td>XL</td>
								<td>9" or larger</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		     <!-- /clothing size chart -->
	     </div>
    </div>
</div>
<!-- /Size chart popup -->