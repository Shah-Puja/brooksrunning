<!-- Header for Mobile -->
<header class="header-mobile visible-mob">
		<div class="wrapper">
			<div class="row">
				<div class="mob-2">
					<div class="mob-icon" id="mob-nav--control">
						<span class="close icon-cart-mob"></span>
					</div>
				</div>
				<div class="mob-8">
					<div class="mob-logo">
					   <a href="/"><img src="/images/brooks-running-logo.png" alt="Brooks Running Aus"></a>
					</div>
				</div>
				<div class="mob-2">
					<div class="mob-icon cart">
					<a href="/cart"><span class="icon-cart-icon"></span>
						<div class="cart-count">{{ $cart->items_count > 0 ? $cart->items_count : 0 }}</div>
					</a>
					</div>
				</div>
				<!-- product cart popup Mobile -->
				<div class="cart-popup-desktop" style="display: none;">
                            <div class="cart-popup-info">
                                <div class="cart-close">
                                    <i class="icon-close"></i>
                                </div>
                                <div class="ajax_cart_popup">@include('cart.ajaxpopupcart')</div> 
                            </div>
                </div> 
			    <!-- /product cart popup Mobile -->
			</div>
		</div>
		<div class="mobile-offer--info">
			Free shipping on all orders over &dollar;50. Australia Wide
		</div>
		<div class="mob-search--product">
				<div class="search-container">
				<div class="search-wrapper">
					<form name="mob_searchproduct" role="search" method="get" onsubmit="return mob_search_product()">
						<input type="text" name="q"  class="o-header__search small valid" placeholder="SEARCH PRODUCTS" itemprop="query-input" autocomplete="off" required>
						<button type="submit"><i class="icon-next-arrow"></i> <img src="/images/bx_loader.gif" alt="loading" style="display:none"/></button>
					</form>
					<div class="close" style="display:none"><i class="icon-close"></i></div> 
					<div class="search-product-content"></div>

				</div>
			</div>
		</div>
		<nav class="mobile-navbar--container" id="mobile-navbar--container">
	        <ul id="mobile-navbar" class="ace-responsive-menu mobile-navbar" data-menu-style="accordion">
	            <li>
	                <a href="javascript:;">
	                    <span class="title">Women</span>
	                </a>
	                <!-- Level Two-->
	                <ul>
						<li>
	                        <a href="/womens-running-shoes-and-clothing">All Women</a>
	                    </li>
	                    <li>
	                        <a href="javascript:;">
	                            Running Shoes						
	                        </a>
	                        <!-- Level Three-->
	                        <ul>
	                            <li>
	                                <a href="/womens-neutral-running-shoes">Neutral Running</a>
	                                <p>Superior cushioning for runners that don't need added support.</p>
	                            </li>
	                            <li>
	                                <a href="/womens-support-running-shoes">Support Running</a>
	                                <p>Superior cushioning and support features for runners that overpronate (roll inward).</p>
	                            </li>
	                            <li>
	                                <a href="/womens-lightweight-running-shoes">Lightweight Running</a>
	                                <p>Lightweight and low profile running shoes.</p>
	                            </li>
	                            <li>
	                                <a href="/womens-competition-running-shoes">Competition Running</a>
	                                <p>Fast and built for speed, on the road or track.</p>
	                            </li> 
								<li>
                            		<a href="/womens-trail-running-shoes">Trail Running</a>
                                </li>
                                <!-- <li>
                                    <a href="/womens-cross-training-shoes">Cross-Training</a>
                                </li> -->
                                <li>
                                    <a href="/womens-walking-shoes">Walking</a>
                                </li>
                        		<li class="sale">
                                    <a href="/womens-running-shoes-sale">Sale Shoes</a>
                                </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="javascript:;">
	                            Best Selling Shoes
	                        </a>
							<ul>
	                            <li>
	                                <a href="/footwear/women/best_selling">Best Sellers</a>
	                            </li>
	                            <li>
									<a href="/brooks-running-shoes-ravenna-10-womens/120286_006.html" title="Ravenna 10">Ravenna 10</a> 
								</li>
								<li>
									<a href="/brooks-running-shoes-ghost-11-womens/120277_017.html" title="Ghost 11">Ghost 11 </a> 
								</li>
								<li>
									<a href="/glycerin-16-womens-running-shoes/120278_034.html" title="Glycerin 16">Glycerin 16</a> 
								</li>
								<li>
									<a href="/brooks-running-shoes-levitate-2-womens/120279_596.html" title="Levitate 2">Levitate 2</a> 
								</li>
								<li>
									<a href="/revel-2-womens-running-shoes/120281_028.html" title="Revel 2">Revel 2</a> 
								</li>
								<li>
									<a href="/brooks-running-shoes-adrenaline-gts-19-womens/120284_080.html" title="Adrenaline GTS 19">Adrenaline GTS 19 </a> 
								</li>
								<li>
									<a href="/brooks-running-shoes-launch-6-womens/120285_027.html" title="Levitate 2">Launch 6</a> 
								</li>
								<li>
									<a href="/brooks-running-shoes-transcend-6-womens/120287_531.html" title="Transcend 6">Transcend 6</a> 
								</li>
	                        </ul>
	                    </li>
						<li>
	                        <a href="javascript:;">
							Clothing
	                        </a>
							<ul>
	                            <li>
	                                <a href="/womens-running-clothes">All Women's Running Clothing</a>
	                            </li>
								<li>
									<a href="/womens-sports-bras">Sports Bras</a>
	                            </li>
								<li>
									<a href="/womens-running-shorts">Shorts</a>
	                            </li>
								<li>
									<a href="/womens-running-tops">Tops</a>
	                            </li>
								<li>
									<a href="/womens-running-jackets-vests">Jackets & Vests</a>
	                            </li>
								<li>
									<a href="/womens-running-pants-tights">Tights & Pants</a>
	                            </li>
	                            <li>
									<a href="/womens-reflective-running-gear">NightLife High-Visibility</a>
	                            </li>
	                            <li>
									<a  href="/womens-running-socks">Socks</a>
	                            </li>
	                            <li>
									<a  href="/womens-running-accessories">Accessories</a>
	                            </li>
	                            <li class="sale">
									<a  href="/womens-running-clothes-sale">SALE Clothing</a>
	                            </li>
	                          
	                        </ul>
	                    </li>
	                  
	                </ul>
	            </li>
	            
				<li>
	                <a href="javascript:;">
	                    <span class="title">Men</span>
	                </a>
	                <!-- Level Two-->
	                <ul>
						<li>
	                        <a href="/mens-running-shoes-and-clothing">All Men</a>
	                    </li>
	                    <li>
	                        <a href="javascript:;">
	                            Running Shoes						
	                        </a>
	                        <!-- Level Three-->
	                        <ul>
								<li>
	                                <a href="/mens-running-shoes">All Men's Running Shoes</a>
	                            </li>
	                            <li>
	                                <a href="/mens-neutral-running-shoes">Neutral Running</a>
	                                <p>Superior cushioning for runners that don't need added support.</p>
	                            </li>
	                            <li>
	                                <a href="/mens-support-running-shoes">Support Running</a>
	                                <p>Superior cushioning and support features for runners that overpronate (roll inward).</p>
	                            </li>
	                            <li>
	                                <a href="/mens-lightweight-running-shoes">Lightweight Running</a>
	                                <p>Lightweight and low profile running shoes.</p>
	                            </li>
	                            <li>
	                                <a href="/mens-competition-running-shoes">Competition Running</a>
	                                <p>Fast and built for speed, on the road or track.</p>
	                            </li>
								<li>
                            		<a href="/mens-trail-running-shoes">Trail Running</a>
                                </li>
                                <!-- <li>
                                    <a href="/mens-cross-training-shoes">Cross-Training</a>
                                </li> -->
                                <li>
                                    <a href="/mens-walking-shoes">Walking</a>
                                </li>
                        		<li class="sale">
                                    <a href="/mens-running-shoes-sale">Sale Shoes</a>
                                </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="javascript:;">
	                            Best Selling Shoes
	                        </a>
							<ul>
	                            <li>
	                                <a href="/footwear/men/best_selling">Best Sellers</a>
	                            </li>
								<li>
									<a class="name-link" href="/brooks-running-shoes-ravenna-10-mens/110298_082.html" title="Ravenna 10">Ravenna 10</a> 
								</li>
								<li>
									<a class="name-link" href="/brooks-running-shoes-ghost-11-mens/110288_038.html" title="Ghost 11">Ghost 11</a> 
								</li>
								<li>
									<a class="name-link" href="/glycerin-16-mens-running-shoes/110289_071.html" title="Glycerin 16">Glycerin 16</a> 
								</li>
								<li>
									<a class="name-link" href="/levitate-2-mens-running-shoes/110290_689.html" title="Levitate 2">Levitate 2</a> 
								</li>
								<li>
									<a class="name-link" href="/brooks-running-shoes-revel-2-mens/110292_061.html" title="Revel 2">Revel 2</a> 
								</li>
								<li>
									<a class="name-link" href="/brooks-running-shoes-adrenaline-gts-19-mens/110294_010.html" title="Adrenaline GTS 19">Adrenaline GTS 19</a> 
								</li>
								<li>
									<a class="name-link" href="/brooks-running-shoes-launch-6-mens/110297_419.html" title="Launch 6">Launch 6</a> 
								</li>
								<li>
									<a class="name-link" href="/brooks-running-shoes-transcend-6-mens/110299_419.html" title="Transcend 6">Transcend 6</a> 
								</li>
	                        </ul>
	                    </li>
						<li>
	                        <a href="javascript:;">
							Clothing
	                        </a>
							<ul>
	                            <li>
	                                <a href="/mens-running-clothes">All Men's Running Clothing</a>
	                            </li>
								<li>
									<a href="/mens-running-shorts">Shorts</a>
	                            </li>
								<li>
									<a href="/mens-running-tops">Tops</a>
	                            </li>
								<li>
									<a href="/mens-running-jackets-vests">Jackets &amp; Vests</a>
	                            </li>
								<li>
									<a href="/mens-running-pants-tights">Tights &amp; Pants</a>
	                            </li>
								<li>
									<a href="/mens-reflective-running-gear">NightLife High-Visibility</a>
	                            </li>
	                            <li>
									<a href="/mens-running-socks">Socks</a>
	                            </li>
	                            <li>
									<a  href="/mens-running-accessories">Accessories</a>
	                            </li>
	                            <li class="sale">
									<a  href="/mens-running-clothes-sale">Sale Clothing</a>
	                            </li>
	                          
	                        </ul>
	                    </li>
	                  
	                </ul>
	            </li>
	            
				<li>
	                <a href="javascript:;">
	                    <span class="title">Shoes</span>
	                </a>
	                <!-- Level Two-->
	                <ul>
	                    <li>
	                        <a href="/neutral-running-shoes">
	                            Neutral Running Shoes                      
	                        </a>
	                        <ul>
							<li>
									<a href="/shoes/aduro">Aduro</a>
								</li>
								<li>
									<a href="/shoes/defyance">Defyance</a>
								</li>
								<li>
									<a href="/shoes/dyad">Dyad</a>
								</li>
								<li>
									<a href="/shoes/ghost">Ghost</a>
								</li>
								<li>
									<a href="/shoes/ghost-gtx">Ghost GTX</a>
								</li>
								<li>
									<a href="/shoes/glycerin">Glycerin</a>
								</li>
								<li>
									<a href="/shoes/launch">Launch</a>
								</li>
								<li>
									<a href="/shoes/levitate">Levitate</a>
								</li>
								<li>
									<a href="/shoes/neuro">Neuro</a>
								</li>
								<li>
									<a href="/shoes/pureflow">PureFlow</a>
								</li>
								<li>
									<a href="/shoes/revel">Revel</a>
								</li> 
								<li>
									<a href="/shoes/ricochet">Ricochet</a>
								</li>
	                        </ul>
	                    </li> 
	                    <li>
	                        <a href="/support-running-shoes">
	                            Support Running Shoes
	                        </a>
	                        <ul>
							<li>
								<a href="/shoes/addiction">Addiction</a>
							</li>
							<li>
								<a href="/shoes/adrenaline-gts">Adrenaline GTS</a>
							</li>
							<li>
								<a href="/shoes/ariel">Ariel</a>
							</li>
							<li>
								<a href="/shoes/beast">Beast</a>
							</li>
							<li>
								<a href="/shoes/bedlam">Bedlam</a>
							</li>
							<li>
								<a href="/shoes/pureCadence">PureCadence</a>
							</li>
							<li>
								<a href="/shoes/ravenna">Ravenna</a>
							</li>
							<li>
								<a href="/shoes/transcend">Transcend</a>
							</li>
							<li>
								<a href="/shoes/vapor">Vapor</a>
							</li>
							
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="/trail-running-shoes">
	                            Trail Running Shoes                       
	                        </a>
	                        <ul>
							<!-- <li>
								 <a href="/shoes/adrenaline-asr">Adrenaline ASR</a> 
							</li> -->
							<li>
								<a href="/shoes/caldera">Caldera</a>
							</li>
							<li>
								<a href="/shoes/cascadia">Cascadia</a>
							</li>
							<li>
								<a href="/shoes/cascadia-gtx">Cascadia GTX</a>
							</li>
							<li>
								<a href="/shoes/mazama">Mazama</a>
							</li>
							<li>
								<a href="/shoes/puregrit">PureGrit</a>
							</li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="/competition-running-shoes">
	                            Competition Running Shoes
	                        </a>
	                        <ul>
							<li>
								<a href="/shoes/asteria">Asteria</a>
							</li>
							<li>
								<a href="/shoes/hyperion">Hyperion</a>
							</li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="/cross-trainer-shoes">
	                            Cross Training Shoes                      
	                        </a>
	                        <ul>
							<li>
								<a href="/shoes/liberty">Liberty</a>
							</li>
							<li>
								<a href="/shoes/maximus">Maximus</a>
							</li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="/walking-shoes">
	                            Walking Shoes
	                        </a>
	                        <!-- Level Three-->
	                        <ul>
							<li>
								<a href="/shoes/addiction-walker">Addiction Walker</a>
							</li>
							<li>
								<a href="/shoes/dyad-walker">Dyad Walker</a>
							</li>
	                        </ul>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="javascript:;">
	                    <span class="title">Meet Brooks</span>
	                </a>
	                <!-- Level Two-->
	                <ul>
	                    <li>
	                        <a href="javascript:;">
	                            ABOUT US                         
	                        </a>
	                        <!-- Level Three-->
	                        <ul>
	                            <li>
	                                <a href="/meet_brooks/what-makes-us-tick">
										What Makes Us Tick
	                                </a>
	                            </li>
								<li>
	                                <a href="/meet_brooks/run-happy-is">
										Run Happy is
	                                </a>
	                            </li>
								<li>
	                                <a href="/meet_brooks/technology">
									Technology
	                                </a>
	                            </li>
								<li>
	                                <a href="/meet_brooks/run-signature">
									Run Signature
	                                </a>
	                            </li>
	                        </ul>
	                    </li>

						<li>
	                        <a href="javascript:;">
								RUN HAPPY                        
	                        </a>
	                        <!-- Level Three-->
	                        <ul>
	                            <li>
	                                <a href="/meet_brooks/competition/rh_competition">
									Competition
	                                </a>
	                            </li>
								<li>
	                                <a href="/meet_brooks/enewsletter">
									E-Newsletter
	                                </a>
	                            </li>
								<li>
	                                <a href="/meet_brooks/training-tips">
									Training Tips
	                                </a>
	                            </li>
								<li>
	                                <a href="/meet_brooks/injury-prevention">
									Injury Prevention
	                                </a>
	                            </li>
	                        </ul>
	                    </li>

						<li>
	                        <a href="javascript:;">
							COMMUNITY                   
	                        </a>
	                        <!-- Level Three-->
	                        <ul>
	                            <li>
	                                <a href="/events">
									Event Calendar
	                                </a>
	                            </li>
								<li>
	                                <a href="http://talk.brooksrunning.com/au">
									Brooks Blog
	                                </a>
	                            </li>
	                        </ul>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="javascript:;">
	                    <span class="title">Sale</span> 
	                </a>
	                <!-- Level Two-->
	                <ul>
	                    <li>
	                        <a href="javascript:;">
	                            Women's Sale                         
	                        </a>
	                        <!-- Level Three-->
	                        <ul>
	                            <li>
	                                <a href="/womens-running-shoes-sale">
	                                    Sale Shoes
	                                </a>
	                            </li>
	                            <li>
	                                <a href="/womens-running-clothes-sale">
	                                    Sale Clothing
	                                </a>
	                        </ul>
	                    </li>
						<li>
	                        <a href="javascript:;">
	                            Men's Sale                         
	                        </a>
	                        <!-- Level Three-->
	                        <ul>
	                            <li>
	                                <a href="/mens-running-shoes-sale">
	                                    Sale Shoes
	                                </a>
	                            </li>
	                            <li>
	                                <a href="/mens-running-clothes-sale">
	                                    Sale Clothing
	                                </a>
	                            </li>
	                        </ul>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="/shoefinder">
	                    <span class="title">Shoe Finder</span>
	                </a>
	            </li>
	            <li>
	                <a href="/info/contact-us">
	                 <span class="title">Help</span>
	                </a>
	            </li>
	            <li>
	                <a href="javascript:;">
	                    <span class="title">My Account</span>
	                </a>
	                <!-- Level Two-->
	                <ul class="header-utality">
						@if(auth()->user())
							<li>
                                <a href="/home">Dashboard</a>
                            </li>
							<li>
								<a href="/account-order-history">My Orders</a>
							</li>
							
							<li>
								<a href="{{ route('logout') }}">Logout</a>
							</li>
						@else
							<li>
								<a href="/login">Log in</a>
							</li>
							
							<li>
								<a href="/register">Register</a>
							</li>
						@endif
	                </ul>
	            </li>
	            <li>
	                <a href="/meet_brooks/enewsletter">
	                    <span class="title">Email Sign Up - The Run down</span>
	                </a>
	            </li>
	        </ul>
	    </nav>
	</header>
<!-- /Header for Mobile -->