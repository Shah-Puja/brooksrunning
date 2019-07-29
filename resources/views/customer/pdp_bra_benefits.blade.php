@php  
  $benefit_1 = (!empty($product->benefit_1)) ? explode('#', html_entity_decode($product->benefit_1,ENT_QUOTES)) : ''; 
  $benefit_2 = (!empty($product->benefit_2)) ? explode('#', html_entity_decode($product->benefit_2,ENT_QUOTES)) : ''; 
  $benefit_3 = (!empty($product->benefit_3)) ? explode('#', html_entity_decode($product->benefit_3,ENT_QUOTES)) : ''; 
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
            <h3 class="br-heading">{!! (isset($benefit_1[1]) &&  $benefit_1[1]!='') ? $benefit_1[1] : "" !!}</h3>
						<p class="br-info">{!! (isset($benefit_1[2]) &&  $benefit_1[2]!='') ? $benefit_1[2] : "" !!}</p>
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
            <h3 class="br-heading">{!! (isset($benefit_2[1]) &&  $benefit_2[1]!='') ? $benefit_2[1] : "" !!}</h3>
						<p class="br-info">{!! (isset($benefit_2[2]) &&  $benefit_2[2]!='') ? $benefit_2[2] : "" !!}</p>
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
            <h3 class="br-heading">{!! (isset($benefit_2[1]) &&  $benefit_2[1]!='') ? $benefit_2[1] : "" !!}</h3>
						<p class="br-info">{!! (isset($benefit_2[2]) &&  $benefit_2[2]!='') ? $benefit_2[2] : "" !!}</p>
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
            <h3 class="br-heading">{!! (isset($benefit_3[1]) &&  $benefit_3[1]!='') ? $benefit_3[1] : "" !!}</h3>
						<p class="br-info">{!! (isset($benefit_3[2]) &&  $benefit_3[2]!='') ? $benefit_3[2] : "" !!}</p>
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

<!-- Bras Expert Advice popup  -->
<div id="expertadv-popup--wrapper" class="popup-container size-chart--popup">
									<div class="popup-container--wrapper">
										<div class="popup-container--info">
											<div class="close-me" id="expertadv-popup--close"><span class="icon-close-icon"></span></div>
											<!-- shoes size chart -->
											<div class="tab-container">
												<ul class="tabs size-chart--tab">
													<li class="tab-link current" data-tab="tab-1">
														<div class="input-wrapper">
															  <div class="radio-inline">
															  	  <input type="radio" name="sizechart" id="tab-opt1" checked="checked">
															      <label for="tab-opt1">
															      	    <div class="mark"><span></span></div>
															      	    <div class="text">HOW WE MEASURE UP</div>
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
															      	    <div class="text">SPORTS BRA BASICS</div>
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
															      	    <div class="text">FIT CHALLENGES SOLVED</div>
															       </label>
															  </div>
														</div>
													</li>
													<li class="tab-link" data-tab="tab-4">
														<div class="input-wrapper">
															  <div class="radio-inline">
															  	  <input type="radio" name="sizechart" id="tab-opt4">
															      <label for="tab-opt4">
															      	    <div class="mark"><span></span></div>
															      	    <div class="text">WHY BROOKS SPORTS BRAS</div>
															       </label>
															  </div>
														</div>
													</li>
												</ul>
												<div id="tab-1" class="tab-content current">
												<div class="size-chart-wrapper ">
													<div class="expertadv-content-header">
														<h1 class="mc-title">HOW WE MEASURE UP</h1>
														<p class="info">Your unique shape, size, and breast tissue density will influence your bra fitting experience. The measuring process is designed to guide you to a starting band size and cup size. From there, it's important to try on different styles to find the best fit for you.</p>
													</div>
														<div class="size-chart-wrapper">
														<div class="clearfix">
															<div class="col-8 tab-7">
															<h4>TO ENSURE THE MOST ACCURATE MEASUREMENT:</h4>
																<p><ul>
																	<li>Visit a fitting professional or recruit someone else to measure you.</li>
																	<li>Wear a natural-fitting lingerie bra that maintains your natural shape—with little to no padding or minimizing features.</li>
																	<li>Breathe deep and stay relaxed.</li>
																</ul></p>
																<h4>1. RIB CAGE MEASUREMENT</h4>
																<p>Measure around your rib cage around the bottom band, just under the breast. The tape measure should feel quite snug. Round the measurement down to the closest inch.</p>
																<h4>2. BAND SIZE CONVERSION</h4>
																<p>Using our measurement guidelines below, find your corresponding band size based on your rib cage measurement.</p>
																<h4>3. BUST SIZE MEASUREMENT</h4>
																<p>Measure the bust over the fullest point of the breast. For larger-breasted women, the fullest point may not be at center, and is often lower. As breast tissue can fluctuate as much as 20%, round up to the closest inch.</p>
																<h4>4. CUP SIZE CONVERSION</h4>
																<p>Subtract your actual rib cage measurement (step 1) from your actual bust measurement (step 3). The difference in inches is your suggested cup size. If the difference is between sizes, round up to the larger size.</p>
															</div>
															<div class="col-4 tab-5">
																<img src="/images/bras/how-we-measure.jpg">
															</div>
														</div>
														<hr/>
														</div>
														<div class="clearfix">
															<div class="col-3 tab-3">
															  <div class="bras-size--table">
															  	<h3 class="mc-title">Bottom Band</h3>
																<p class="sub-header">Measurement Guideline</p>
																<table>
															        <tbody>
															        	<tr>
															        		<td class="dark-bg">RIB CAGE</td>
															        		<td class="dark-bg">BAND SIZE</td>
															        	</tr>
															        	 <tr>
									                                       <td>25"-26"</td>
									                                       <td>30</td>
									                                    </tr>
									                                    <tr>
									                                       <td>27"-28"</td>
									                                       <td>32</td>
									                                    </tr>
									                                    <tr>
									                                       <td>29"-30"</td>
									                                       <td>34</td>
									                                    </tr>
									                                    <tr>
									                                       <td>31"-32"</td>
									                                       <td>36</td>
									                                    </tr>
									                                    <tr>
									                                       <td>33"-34"</td>
									                                       <td>38</td>
									                                    </tr>
									                                    <tr>
									                                       <td>35"-36"</td>
									                                       <td>40</td>
									                                    </tr>
									                                    <tr>
									                                       <td>37"-38"</td>
									                                       <td>42</td>
									                                    </tr>
									                                    <tr>
									                                       <td>39"-40"</td>
									                                       <td>44</td>
									                                    </tr>
															        </tbody>
															    </table>
															  </div>
															</div>
															<div class="col-3 tab-3">
															  <div class="bras-size--table">
															  	<h3 class="mc-title">Cup Size</h3>
																<p class="sub-header">Measurement Guideline</p>
																<table>
															        <tbody>
															        	<tr>
														        		<td class="dark-bg">DIFFERENCE IN CUP SIZE</td>
														        		<td class="dark-bg">YOUR CUP SIZE</td>
															        	</tr>
															        	  <tr>
											                               <td>3"</td>
											                               <td>AA</td>
											                            </tr>
											                            <tr>
											                               <td>4"</td>
											                               <td>A</td>
											                            </tr>
											                            <tr>
											                               <td>5"</td>
											                               <td>B</td>
											                            </tr>
											                            <tr>
											                               <td>6"</td>
											                               <td>C</td>
											                            </tr>
											                            <tr>
											                               <td>7"</td>
											                               <td>D</td>
											                            </tr>
											                            <tr>
											                               <td>8"</td>
											                               <td>DD</td>
											                            </tr>
											                            <tr>
											                               <td>9"</td>
											                               <td>E</td>
											                            </tr>
															        </tbody>
															    </table>
															  </div>
															</div>
															<div class="col-6 tab-6">
																<div id="size-example">
									                              <h3 class="br-heading">Example</h3>
									                              <div class="numbers">
									                                 <span class="circle-num">37</span> - <span class="circle-num">30</span> = <span class="circle-num"> 7"</span>                    
									                              </div>
									                              <p>Bust size minus rib cage size=cup size</p>
									                              <div class="numbers">Size = 34D</div>
												                </div>
															</div>
														</div>
														<hr/>
														<h2 class="br-heading">ALL SET?</h2>
														<p class="info">Go experience the difference the right bra can make.</p>
												</div>
												</div>
												<div id="tab-2" class="tab-content">
												 <div class="size-chart-wrapper">
													<div class="expertadv-content-header">
													<h1 class="mc-title">FOUR FUNDAMENTALS OF FIT</h1>
													<p class="info">Unsure how your sports bra should look and feel? <br/>Gain confidence with these checkpoints.</p>
													</div>
													<div class="step">
														<h4 class="mc-title">1. THE BAND</h4>
														<p>On the middle hook, ensure it's snug and lies even. If it rides up, it's too loose and/or the straps need adjustment. Chafing can occur if the band is too loose.the band is too loose.</p>
														<img src="/images/bras/band-too-loose.png">
														<hr/>
														<h4 class="mc-title">2. The Cups</h4>
														<p>Scoop your breasts into the cups, ensuring they are centered. The breast tissue should be fully contained, but the bra doesn't pucker or wrinkle. Anything that spills out the top or side indicates the cup size is too small.</p>
							                           <img src="/images/bras/cups-too-small.png">
							                           <img src="/images/bras/cups-too-loose.png">
							                           	<hr/>
														<h4 class="mc-title">3. Underwire</h4>
														<p>If applicable, make sure it sits flat against the body. Any gaping indicates the need to go up a cup size.</p>
		                   								<img src="/images/bras/underwire-just-right.png">
		                   								<hr/>
														<h4 class="mc-title">4. The Straps</h4>
														<p>They should not slip or dig. Adjustable straps can offer a more custom fit. If the support feels like it's coming from the straps, you may need a smaller band size.</p>
		                   								<img src="/images/bras/straps-just-right.png">
		                   								<hr/>
														<h2 class="br-heading">ALL SET?</h2>
														<p class="info">Go experience the difference the right bra can make.</p>
													</div>
												</div>
												</div>
												<div id="tab-3" class="tab-content">
												 <div class="size-chart-wrapper">
													<div class="expertadv-content-header ">
													<h1 class="mc-title">GET THE BRA YOU DESERVE</h1>
													<p class="info">Every woman deserves to feel perfectly supported. <br/> Here are some common challenges and our suggested solutions.</p>
													</div>
													<div class="step">
														<h4 class="mc-title">SURGERY OR INJURY</h4>
														<p>Women who have suffered an arm, neck, or shoulder injury, or who have just had breast surgery, may find a traditional racerback style too hard to put on. Look for a style that has detachable front-adjustable straps, or an open-back style with a back closure.</p>
								                           <span class="expertadv-blue expertadv-bold">WE SUGGEST:</span><br>
								                           <a href="javascript:void(0)" class="prod-link">        
								                           <img src="/images/bras/300604_017_f_SM.jpg" class="prod"><br>
								                           <span class="expertadv-expertadv-dark-grey expertadv-bold">FINEFORM</span>
								                           </a>   
								                           <a href="javascript:void(0)" class="prod-link">         
								                           <img src="/images/bras/350064_001_f_SM.jpg" class="prod"><br>
								                           <span class="expertadv-expertadv-dark-grey expertadv-bold">FIONA</span>
								                           </a>
								                           <a href="javascript:void(0)" class="prod-link">            
								                           <img src="/images/bras/350042_001_f_SM.jpg" class="prod"><br>	
								                           <span class="expertadv-expertadv-dark-grey expertadv-bold">JUBRALEE</span>
								                           </a>
														<hr/>
														<h4 class="mc-title">Pregnancy or Nursing</h4>
														 <p>Sports bras are a great solution for the extra sensitivity women may experience during pregnancy or nursing. Look for a style with front-adjustable straps that can adjust with your changing body. Plus, those front-adjustable straps can make it easier to breastfeed.</p>
									                       <span class="expertadv-blue expertadv-bold">WE SUGGEST:</span><br>
									                       <a href="javascript:void(0)" class="prod-link">
									                       <img src="/images/bras/350064_001_f_SM.jpg" class="prod"><br>
									                       <span class="expertadv-dark-grey expertadv-bold">FIONA</span>
									                       </a>
									                       <a href="javascript:void(0)" class="prod-link">
									                       <img src="/images/bras/350025_001_f_SM.jpg" class="prod"><br>
									                       <span class="expertadv-dark-grey expertadv-bold">JUNO</span>
									                       </a>
							                           	<hr/>
														<h4 class="mc-title">Narrow Shoulders</h4>
														 <p>Even with a well-fitted sports bra, some women experience straps that continuously slip off the shoulders. Keep straps in check a racerback or crossback style.</p>
								                           <span class="expertadv-blue expertadv-bold">WE SUGGEST:</span><br>
								                           <a href="javascript:void(0)" class="prod-link">
								                           <img src="/images/bras/300614_001_f_SM.jpg" class="prod"><br>
								                           <span class="expertadv-dark-grey expertadv-bold">UPRISE CROSSBACK</span>
								                           </a>
								                           <a href="javascript:void(0)" class="prod-link">
								                           <img src="/images/bras/350037_005_f_SM.jpg" class="prod"><br>
								                           <span class="expertadv-dark-grey expertadv-bold">REBOUND RACER</span>	
								                           </a>
		                   								<hr/>
														<h4 class="mc-title">Uneven Breasts</h4>
														<p>Most women have one breast larger than the other. Always fit your sports bra to the larger cup and look for a style with adjustable straps that allows you to customize the fit to each individual breast.</p>
								                           <span class="expertadv-blue expertadv-bold">WE SUGGEST:</span><br>
								                           <a href="javascript:void(0)" class="prod-link">
								                           <img src="/images/bras/350064_001_f_SM.jpg" class="prod"><br>
								                           <span class="expertadv-dark-grey expertadv-bold">FIONA</span>
								                           </a>
								                           <a href="javascript:void(0)" class="prod-link">
								                           <img src="/images/bras/350025_001_f_SM.jpg" class="prod"><br>
								                           <span class="expertadv-dark-grey expertadv-bold">JUNO</span>
								                           </a>
		                   								<hr/>
		                   								<h4 class="mc-title">Wearing Two Bras</h4>
														 <p>Women who wear two bras while running are not getting the fit, support, or comfort they need. Look for a supportive style designed for larger cups. Sometimes one is better than two!</p>
								                           <span class="expertadv-blue expertadv-bold">WE SUGGEST:</span><br>
								                           <a href="javascript:void(0)" class="prod-link">
								                           <img src="/images/bras/350054_001_f_SM.jpg" class="prod"><br>
								                           <span class="expertadv-dark-grey expertadv-bold">MAIA</span>
								                           </a>
								                           <a href="javascript:void(0)" class="prod-link">
								                           <img src="/images/bras/350025_001_f_SM.jpg" class="prod"><br>
								                           <span class="expertadv-dark-grey expertadv-bold">JUNO</span>
								                           </a>
														
													</div>
												</div>
												</div>
												<div id="tab-4" class="tab-content">
													 <div class="size-chart-wrapper">
														<div class="expertadv-content-header">
														<h1 class="mc-title">THE BRA STANDARD</h1>
														<p class="info">The Brooks Moving Comfort Collection is the #1 sports bra brand with runners and for good reason.</p>
														</div>
														<div class="size-chart-wrapper">
														<div class="clearfix">
															<div class="col-8 tab-7">
															<h4>TO ENSURE THE MOST ACCURATE MEASUREMENT:</h4>
																<p>A great sports bra is at the center of every woman's run. It's why our expert team of designers and engineers take pride in their craft--building bras to fit women, not forcing women to fit the bra.</p>
																<p>Their dedication to testing and editing ensures every stitch of the final product is purposeful and its beauty is matched with proven performance. Women who discover what running feels like in our bras know why we are the best in the industry. We invite you to experience the difference a bra can make</p>
																
															</div>
															<div class="col-4 tab-5">
																<img src="/images/bras/why-mc.jpg">
															</div>
														</div>
														<hr/>
														</div>
													</div>
												</div>
											</div>
											<!-- /shoes size chart -->
											<!-- bras size chart -->
											<div class="size-chart--bras" style="display: none;">
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
											<!-- clothing size chart -->
											<div class="size-chart--bras" style="display: none;">
												<h3 class="br-heading">Men's Clothing</h3>
												<div class="info">
													<h4>Size &amp; Fit Guide</h4>
													<p>Sizing on BrooksRunning.com is displayed in US sizes only.</p>
												</div>
												<div class="bras-size--table">
										            <table>
										                <tbody>
										                    <tr>
										                        <td class="blue-bg" colspan="8" style="text-align: left; padding-left: 13px;">Men's Body Measurements (centimeters)</td>
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
								<!-- /Bras Expert Advice popup -->