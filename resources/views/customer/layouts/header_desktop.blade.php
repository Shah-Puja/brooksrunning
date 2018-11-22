<!-- Header for desktop -->
@php //echo "<pre>";print_r($cart->item_count);die;@endphp
<header class="header-desktop hidden-mob">
    <div class="wrapper">
        <div class="row">
            <div class="col-3 tab-3 header-desktop--left">
                <a href="/"> 
                    <div class="logo">
                        <img src="/images/brooks-running-logo.png" alt="Brooks Running Aus">
                    </div>
                </a>
            </div>
            <div class="col-9 tab-9 header-desktop--right">
                <div class="top clearfix">
                    <div class="offer-info">Free shipping on all orders over &dollar;50. Australia Wide</div>
                    <ul class="header-utality">
                        <li>
                            <a href="javascript:void(0)">My Account <span class="icon-down-arrow"></span></a>
                            <ul class="header-utality__submenu">
                                @if(auth()->user())
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
                        <li><a href="/info/contact-us">Help</a> 
                        </li>
                        <li><a href="/store-locator">Store Locator</a></li>
                        <li class="cart">
                            <a href="/cart">Cart
                                <span class="icon-shopping-cart icon-cart"></span>
                                <span class="cart-count">{{ $cart->items_count > 0 ? $cart->items_count : 0 }}</span>
                            </a>
                        </li>
                        <!-- product cart popup desktop -->
                        <div class="cart-popup-desktop" style="display: none;">
                            <div class="cart-popup-info">
                                <div class="cart-close">
                                    <i class="icon-close"></i>
                                </div>
                                <div class="ajax_cart_popup">@include('cart.ajaxpopupcart')</div> 
                            </div>
                        </div>
                    </ul>
                </div>
                <div class="bottom clearfix">
                    <ul class="desktop-navigation" id="desktop-navigation">
                        <li class="main"><a href="/womens-running-shoes-and-clothing" class="main-nav">Women</a>
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-4">
                                                    <li class="submenu-main">
                                                        <a href="/womens-running-shoes">Women's Running Shoes</a>
                                                    </li>
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
                                                </ul>
                                                <ul class="tab-2 sub-menu-margin">
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
                                                <ul class="tab-2">
                                                    <li class="submenu-main">
                                                        <a href="/footwear/women/best_selling">Best Sellers</a>
                                                    </li>
                                                    <li>
                                                        <a href="/adrenaline-gts-18-womens-running-shoes/120268_516.html" title="Adrenaline GTS 18">Adrenaline GTS 18</a> 
                                                    </li>
                                                    <li>
                                                        <a href="/glycerin-16-womens-running-shoes/120278_070.html" title="Glycerin 16">Glycerin 16 </a> 
                                                    </li>
                                                    <li>
                                                        <a href="/ghost-11-womens-running-shoes/120277_493.html" title="Ghost 11">Ghost 11</a> 
                                                    </li>
                                                    <li>
                                                        <a href="/ravenna-9-womens-running-shoes/120269_027.html" title="Ravenna 9">Ravenna 9 </a> 
                                                    </li>
                                                </ul>
                                                <ul class="tab-4 border-left">
                                                    <li class="submenu-main">
                                                        <a href="/womens-running-clothes">Women's Running Clothing</a>
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
                                                        <a href="/womens-running-jackets-vests">Jackets &amp; Vests</a>
                                                    </li>
                                                    <li>
                                                        <a href="/womens-running-pants-tights">Tights &amp; Pants</a>
                                                    </li>
                                                    <li>
                                                        <a href="/womens-reflective-running-gear">NightLife High-Visibility</a>
                                                    </li>
                                                    <li>
                                                        <a href="/womens-running-socks">Socks</a>
                                                    </li>
                                                    <li>
                                                        <a href="/womens-running-accessories">Accessories</a>
                                                    </li>
                                                    <li class="sale">
                                                        <a href="/womens-running-clothes-sale">Sale Clothing</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="header-menu--btn">
                                                        <p>Not sure which shoe is right for you?</p>
                                                        <a href="/shoefinder" class="primary-button">Use our shoe finder</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main"><a href="/mens-running-shoes-and-clothing" class="main-nav">Men</a>
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-4">
                                                    <li class="submenu-main">
                                                        <a href="/mens-running-shoes">Men's Running Shoes</a>
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
                                                </ul>
                                                <ul class="tab-2 sub-menu-margin">
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
                                                <ul class="tab-2">
                                                    <li class="submenu-main">
                                                        <a href="/footwear/men/best_selling">Best Sellers</a>
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/adrenaline-gts-18-mens-running-shoes/110271_438.html" title="Adrenaline GTS 18">Adrenaline GTS 18</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/glycerin-16-mens-running-shoes/110289_069.html" title="Glycerin 16">Glycerin 16 </a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/ghost-11-mens-running-shoes/110288_093.html" title="Ghost 11">Ghost 11</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/beast-18-mens-running-shoes/110282_015.html" title="Beast 18">Beast 18 </a> 
                                                    </li>
                                                </ul>
                                                <ul class="tab-4 border-left">
                                                    <li class="submenu-main">
                                                        <a href="/mens-running-clothes">Men's Running Clothing</a>
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
                                                        <a href="/mens-running-accessories">Accessories</a>
                                                    </li>
                                                    <li class="sale">
                                                        <a href="/mens-running-clothes-sale">Sale Clothing</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="header-menu--btn">
                                                        <p>Not sure which shoe is right for you?</p>
                                                        <a href="/shoefinder" class="primary-button">Use our shoe finder</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main"><a href="/shoefinder" class="main-nav">Shoe Finder</a>
								<div class="desktop-navigation--sub">
									<div class="wrapper">
										<div class="row">
											<div class="col-12">
												<div class="row nav-wrapper">
													<ul class="tab-3">
														<li class="submenu-main">
		                                                    <a href="/neutral-running-shoes">Neutral Running Shoes</a>
		                                                </li>
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
													<ul class="tab-3">
													    <li class="submenu-main">
		                                                    <a href="/support-running-shoes">Support Running Shoes</a>
		                                                </li>
                                                        <li>
                                                            <a href="/shoes/addiction">Addiction</a>
                                                        </li>
                                                        <li>
                                                            <!-- <a href="/shoes/adrenaline-gts">Adrenaline GTS</a> -->
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
                                                            <a href="/shoes/purecadence">PureCadence</a>
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
													<ul class="tab-3">
														<li class="submenu-main">
	                                                        <a href="/trail-running-shoes">Trail Running Shoes</a>
	                                                    </li>
                                                        <li>
                                                            <a href="/shoes/adrenaline-asr">Adrenaline ASR</a>
                                                        </li>
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
													<ul class="tab-3">
														<li class="submenu-main">
	                                                        <a href="/competition-running-shoes">Competition Running Shoes</a>
	                                                    </li>
	                                                    <li>
                                                            <a href="/shoes/asteria">Asteria</a>
                                                        </li>
                                                        <li>
                                                            <a href="/shoes/hyperion">Hyperion</a>
                                                        </li>
                                                        <!-- <li class="submenu-main">
	                                                        <a href="/cross-trainer-shoes">Cross Training Shoes</a>
	                                                    </li> -->
                                                        <!-- <li>
                                                            <a href="/shoes/liberty">Liberty</a>
                                                        </li>
                                                        <li>
                                                            <a href="/shoes/maximus">Maximus</a>
                                                        </li> -->
                                                        <li class="submenu-main">
	                                                        <a href="/walking-shoes">Walking Shoes</a>
	                                                    </li>
                                                        <li>
                                                            <a href="/shoes/addiction-walker">Addiction Walker</a>
                                                        </li>
                                                        <li>
                                                            <a href="/shoes/dyad-walker">Dyad Walker</a>
                                                        </li>
													</ul> 
												</div>
											</div>
										</div>
								    </div>
								    <div class="menu-shoe--finder">
								    	<div class="wrapper">
								    		<div class="row">
								    			<div class="tab-7">
								    				<div class="find-out">
								    					<h3 class="bold-font">Find out which shoe is right for you.</h3>
								    					<a href="/shoefinder" class="shoe-button">Shoe Finder</a>
								    				</div>
								    			</div>
								    			<div class="tab-5">
								    				<div class="shoe-finder--logo">
								    					<img src="/images/brooks-shoes--logo.png" alt="">
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>
								</div>
							</li>
                        <li class="main"><a href="javascript:;" class="main-nav">Meet Brooks</a>
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-3">
                                                    <li class="submenu-main">
                                                        <a href="/info/about-us">About Us</a>
                                                    </li>
                                                    <li><a href="/meet_brooks/what-makes-us-tick">What Makes Us Tick</a></li>
                                                    <li><a href="/meet_brooks/run-happy-is">Run Happy is</a></li>
                                                    <li><a href="/meet_brooks/technology">Technology</a></li>
                                                    <li><a href="/meet_brooks/run-signature">Run Signature</a></li>
                                                </ul>
                                                <ul class="tab-3">
                                                    <li class="submenu-main">
                                                        <a href="/meet_brooks/run-happy-is">Run Happy</a>
                                                    </li>
                                                    <li><a href="/meet_brooks/competition/rh_competition">Competition</a></li>
                                                    <li><a href="/meet_brooks/enewsletter">E-Newsletter</a></li>
                                                    <li><a href="/meet_brooks/training-tips">Training Tips</a></li>
                                                    <li><a href="/meet_brooks/injury-prevention">Injury Prevention</a></li>
                                                </ul>
                                                <ul class="tab-3">
                                                    <li class="submenu-main">
                                                        <a href="/events">Community</a>
                                                    </li>
                                                    <li><a href="/events">Event Calendar</a></li>
                                                    <li><a href="http://talk.brooksrunning.com/au/">Brooks Blog</a></li>
                                                </ul>
                                                <div class="tab-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main"><a href="/running-shoes-and-apparel-sale" class="main-nav">Sale</a>
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-2">
                                                    <li class="submenu-main">
                                                        Women's Sale
                                                    </li>
                                                    <li><a href="/womens-running-shoes-sale">Sale Shoes</a></li>
                                                    <li><a href="/womens-running-clothes-sale">Sale Clothing</a></li>
                                                </ul>
                                                <ul class="tab-10">
                                                    <li class="submenu-main">
                                                       Men's Sale
                                                    </li>
                                                    <li><a href="/mens-running-shoes-sale">Sale Shoes</a></li>
                                                    <li><a href="/mens-running-clothes-sale">Sale Clothing</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="bottom-utality--right">
                        <span class="icon-search search-header--popup"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-container" id="header-search--popup">
        <div class="search-wrapper">
            <div class="close"><i class="icon-close"></i></div>
            <form name="searchproduct" role="search" method="get" onsubmit="return search_product()">
                <input type="search" name="q" id="q" class="o-header__search small valid" placeholder="SEARCH PRODUCTS" itemprop="query-input" autocomplete="off">

                <button type="submit"><i class="icon-next-arrow"></i> <img src="/images/bx_loader.gif" alt="loading" style="display:none"/></button>
            </form>
            <div class="search-product-content"></div>

        </div>
    </div>
</header>
<!-- /Header for desktop -->
