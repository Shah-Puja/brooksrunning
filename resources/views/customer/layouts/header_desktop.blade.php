<!-- Header for desktop -->
@php //echo "<pre>";print_r($cart->item_count);die;@endphp
<header class="header-desktop hidden-mob">
    <!-- header banner-->
    @include('customer.header_banner')
    <div class="wrapper">
        <div class="row">
            <div class="col-3 tab-3 header-desktop--left">
                <a href="/"> 
                    <div class="logo">
                        <!-- <img src="/images/brooks-running-logo.png" alt="Brooks Running Aus"> -->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 220 30" enable-background="new 0 0 220 30" xml:space="preserve" width="220" height="30" class="icon icon-logo" >
                                <style type="text/css">
                                    .st0{fill:#0363F7;}
                                </style>
                                <g id="Brooks_Logo_-_Horizontal_4_">
                                    <g>
                                        <path  id="Brooks_Logo" fill="#ffffff" class="st0" d="M18.6,1.3c0,0,0-0.1,0.5-0.1c4.3,0.2,14.8,0.9,26.4,3.9c15.1,3.9,20.9,7.4,16.1,8.4
                                            c-4.8,1-23.3,0.5-43.1,13.1c-1.4,0.9-3.4,2-8.6,0.4c-2-0.6-4.4-1.4-7.2-2.9c-12.2-6.3,21.8-10.6,27.8-11.5
                                            c6.9-0.9,13.8-1.5,7.6-4.9c-1.5-0.8-5.4-3-19-6.2C19.1,1.6,18.5,1.5,18.6,1.3z"/>
                                    </g>
                                    <g>
                                        <g>
                                            <path class="st0"  id="Brooks_Logo" fill="#ffffff" d="M99.5,3.9c0.4-1.2,1-1.8,3.6-1.8l6.9,0c4.3,0,7.1,0.8,8.6,2.4c1,1.1,1.4,2.5,1.2,4.3
                                                c-0.4,4.4-2.7,6.9-7.6,8.5l-0.2,0.1l3.4,9c0.1,0.3-0.1,0.6-0.4,0.6h-4.2c-1.2,0-2.2-0.7-2.5-1.7l-2.6-6.7l-4.2,0L99,26.2
                                                c-0.1,0.3-0.5,0.6-0.8,0.6H93c-0.3,0-0.5-0.3-0.4-0.5L99.5,3.9z M105.1,6.8l-2.1,6.8l4,0c3.1,0,5.8,0,6.2-4
                                                c0.1-0.8-0.1-1.3-0.5-1.8c-0.7-0.7-2-1-4.2-1L105.1,6.8z"/>
                                            <path class="st0" id="Brooks_Logo" fill="#ffffff" d="M154.4,27.2c-3.3,0-6.2-1.2-7.7-3.2c-1.2-1.6-1.5-3.6-0.9-5.8l1.3-4.5c2.5-8.8,6.5-12,15.3-12l0.4,0
                                                c3.3,0,6.2,1.2,7.7,3.2c1.2,1.6,1.5,3.6,0.9,5.8l-1.3,4.5c-2.5,8.8-5.2,12-15.3,12L154.4,27.2z M160.9,7
                                                c-3.7,0.1-5.9,2.1-7.2,6.5l-1.1,4.1c-0.2,0.6-0.2,1.2-0.2,1.7c0.2,1.7,1.5,2.5,3.8,2.6c3.7-0.1,5.9-2.1,7.2-6.5l1.1-4.1
                                                c0.2-0.6,0.2-1.2,0.2-1.7C164.6,7.9,163.3,7,160.9,7L160.9,7L160.9,7z"/>
                                            <path class="st0" id="Brooks_Logo" fill="#ffffff" d="M175,26.8c0.4,0,0.7-0.3,0.8-0.6l3.1-9.9c0.3,0,0.6,0.2,0.8,0.5l4.4,8.5c0.5,1,1.5,1.5,2.5,1.5h4.5
                                                c0.3,0,0.5-0.3,0.4-0.6L186,15.5c-0.1-0.3-0.1-0.6,0.1-0.8l13.2-12.2c0.2-0.2,0.1-0.5-0.2-0.5l-5.3,0c-0.9,0-1.8,0.4-2.4,1
                                                L181,12.8c-0.3,0.3-0.7,0.4-1,0.4l3.3-10.6c0.1-0.3-0.1-0.6-0.4-0.6l-5.2,0c-0.4,0-0.7,0.2-0.8,0.6l-7.3,23.7
                                                c-0.1,0.3,0.1,0.5,0.4,0.5H175z"/>
                                            <path class="st0" id="Brooks_Logo" fill="#ffffff" d="M215,6.9l-5.3,0c-2,0-3.8,0.3-4.1,2.6c-0.1,1,0.6,1.4,2.1,2l4.4,1.6c2.5,0.9,3.8,2.9,3.5,5.4
                                                c-0.8,6.9-5.8,8.3-13.1,8.3l-8.2,0c-0.3,0-0.6-0.3-0.6-0.7c0.5-4.3,4.9-4.2,4.9-4.2l5.4,0c2.9,0,4.5-1.1,4.7-3.3
                                                c0.1-1.1-0.5-1.9-2.1-2.6l-4.4-1.6c-2.4-1-3.6-2.7-3.4-4.8c0.7-6.4,5.3-7.7,12.5-7.7l8.1,0c0.3,0,0.6,0.3,0.5,0.6
                                                C219.7,4,218.7,6.9,215,6.9z"/>
                                            <path class="st0" id="Brooks_Logo" fill="#ffffff" d="M128.3,27.2c-3.3,0-6.2-1.2-7.7-3.2c-1.2-1.6-1.5-3.6-0.9-5.8l1.3-4.5c2.5-8.8,6.5-12,15.3-12l0.4,0
                                                c3.3,0,6.2,1.2,7.7,3.2c1.2,1.6,1.5,3.6,0.9,5.8l-1.3,4.5c-2.5,8.8-5.2,12-15.3,12L128.3,27.2z M134.9,7
                                                c-3.7,0.1-5.9,2.1-7.2,6.5l-1.1,4.1c-0.2,0.6-0.2,1.2-0.2,1.7c0.2,1.7,1.5,2.5,3.8,2.6c3.7-0.1,5.9-2.1,7.2-6.5l1.1-4.1
                                                c0.2-0.6,0.2-1.2,0.2-1.7C138.5,7.9,137.2,7,134.9,7L134.9,7L134.9,7z"/>
                                            <path class="st0" id="Brooks_Logo" fill="#ffffff" d="M86.1,2.1c3.7,0,6.4,0.8,7.8,2.4C94.8,5.4,95.1,6.6,95,8c-0.3,3-1.7,4.6-5.2,6l-0.4,0.2l0.4,0.2
                                                c1.5,0.9,2.3,2.6,2.1,4.4c-0.8,8-7.5,8-14.6,8l-5.8,0c-1.3,0-2.7,0.1-3.2-0.4c-0.7-0.7-0.3-1.9-0.3-1.9l6.4-20.6
                                                c0.4-1.2,1-1.8,3.6-1.8L86.1,2.1z M80,22.1c2.4,0,5.3,0.2,5.5-3c0.1-0.8-0.1-1.4-0.6-1.9c-0.6-0.6-1.7-0.9-3.2-0.9l-4.7,0
                                                l-1.8,5.7L80,22.1z M78.4,12h4.7c3,0,5-0.4,5.3-2.9c0.1-0.6,0-1.1-0.4-1.5c-0.6-0.7-2-0.8-4.8-0.8l-3.3,0L78.4,12z"/>
                                        </g>
                                    </g>
                                </g>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="col-9 tab-9 header-desktop--right">
                <div class="top clearfix">
                    <div class="offer-info">Free shipping on all orders over &dollar;50. Australia Wide</div>
                    <ul class="header-utality">
                        @if(Session::get('medibank_gateway')!='Yes')
                        <li>
                            <a href="javascript:void(0)">My Account <span class="icon-down-arrow"></span></a>
                            <ul class="header-utality__submenu">
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
                        @endif
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
                        <li class="main sm-navigation--menu" data="women"><a href="/womens-running-shoes-and-clothing" class="main-nav">Women</a>
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
                                                        <a href="/brooks-running-shoes-ravenna-10-womens/120286_006.html" title="Ravenna 10">Ravenna 10</a> 
                                                    </li>
                                                    <li>
                                                        <a href="/brooks-running-shoes-ghost-12-womens/120305_413.html" title="Ghost 12">Ghost 12 </a> 
                                                    </li>
                                                    <li>
                                                        <a href="/brooks-running-shoes-glycerin-17-womens/120283_070.html" title="Glycerin 17">Glycerin 17</a> 
                                                    </li>
                                                    <li>
                                                        <a href="/brooks-running-shoes-levitate-2-womens/120279_596.html" title="Levitate 2">Levitate 2</a> 
                                                    </li>
                                                    <li>
                                                        <a href="/brooks-running-shoes-revel-3-womens/120302_012.html" title="Revel 3">Revel 3</a> 
                                                    </li>
                                                    <li>
                                                        <a href="/adrenaline-gts-20-womens-running-shoes/120296_073.html" title="Adrenaline GTS 20">Adrenaline GTS 20 </a> 
                                                    </li>
                                                    <li>
                                                        <a href="/brooks-running-shoes-launch-6-womens/120285_027.html" title="Levitate 2">Launch 6</a> 
                                                    </li>
                                                    <li>
                                                        <a href="/brooks-running-shoes-transcend-6-womens/120287_531.html" title="Transcend 6">Transcend 6</a> 
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
                        <li class="main sm-navigation--menu" data="men"><a href="/mens-running-shoes-and-clothing" class="main-nav">Men</a>
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
                                                        <a class="name-link" href="/brooks-running-shoes-ravenna-10-mens/110298_082.html" title="Ravenna 10">Ravenna 10</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/brooks-running-shoes-ghost-12-mens/110316_489.html" title="Ghost 12">Ghost 12</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/brooks-running-shoes-glycerin-17-mens/110296_015.html" title="Glycerin 17">Glycerin 17</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/levitate-2-mens-running-shoes/110290_689.html" title="Levitate 2">Levitate 2</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/brooks-running-shoes-revel-3-mens/110314_088.html" title="Revel 3">Revel 3</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/adrenaline-gts-20-mens-running-shoes/110307_051.html" title="Adrenaline GTS 20">Adrenaline GTS 20</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/brooks-running-shoes-launch-6-mens/110297_419.html" title="Launch 6">Launch 6</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="/brooks-running-shoes-transcend-6-mens/110299_419.html" title="Transcend 6">Transcend 6</a> 
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
                        <li class="main sm-navigation--menu" data="shoefinder"><a href="/shoefinder" class="main-nav">Shoe Finder</a>
								<div class="desktop-navigation--sub">
									<div class="wrapper">
										<div class="row">
											<div class="col-12">
												<div class="row nav-wrapper">
													<ul class="tab-3">
														<li class="submenu-main">
		                                                    <a href="/neutral-running-shoes">Neutral Running Shoes</a>
		                                                </li>
		                                                <!-- <li>
                                                            <a href="/shoes/aduro">Aduro</a>
                                                        </li> -->
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
	                                                    </li>
                                                        <li>
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
								    					<h3 class="bold-font">Which shoe is right for you?</h3>
								    					<!-- <a href="/shoefinder" class="shoe-button">Shoe Finder</a> -->
								    					<a href="/shoefinder" class="primary-button">Try the shoe finder</a>
								    				</div>
								    			</div>
								    			<div class="tab-5">
								    				<div class="shoe-finder--logo">
								    					<img src="/images/home/hp_menu_shoefinder_logo.png" alt=""> 
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>
								</div>
							</li>
                        <li class="main sm-navigation--menu" data="meetbrooks">
                            @if(rand(0,1)==1)
                            <a href="javascript:;" class="main-nav" id='nav-meetbrooks'>Meet Brooks</a>
                            @else 
                            <a href="javascript:;" class="main-nav" id='nav-about'>About</a>							
                            @endif
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-3">
                                                    <li class="submenu-main">
                                                        <a href="/info/about-us">About Us</a>
                                                    </li>
                                                    <li><a href="/meet_brooks/our_history">Our History</a></li>
                                                    <li><a href="/meet_brooks/our_purpose">Our Purpose</a></li>
                                                    <li><a href="/meet_brooks/technology/running-shoes-technology">Technology</a></li>
                                                    <li><a href="/meet_brooks/run-signature">Run Signature</a></li>
                                                </ul>
                                                <ul class="tab-3">
                                                    <li class="submenu-main">
                                                        <a href="/meet_brooks/our_purpose">Run Happy</a>
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
                        <li class="main sm-navigation--menu" data="sale"><a href="/running-shoes-and-apparel-sale" class="main-nav">Sale</a>
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
                <input type="search" name="q" id="q" class="o-header__search small valid" placeholder="SEARCH PRODUCTS" itemprop="query-input" autocomplete="off" required>
                <button type="submit"><i class="icon-next-arrow"></i> <img src="/images/bx_loader.gif" alt="loading" style="display:none"/></button>
            </form>
            <div class="search-product-content"></div>

        </div>
    </div>
     
</header>
<!-- /Header for desktop -->


