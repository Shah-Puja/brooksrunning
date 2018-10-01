<!-- Header for desktop -->
<header class="header-desktop hidden-mob">
    <div class="wrapper">
        <div class="row">
            <div class="col-3 tab-3 header-desktop--left">
                <a href="#">
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
                                <li>
                                    <a href="#">Log in</a>
                                </li>
                                <li>
                                    <a href="#">My Orders</a>
                                </li>
                                <li>
                                    <a href="#">Register</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Store Locator</a></li>
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
                        <li class="main"><a href="javascript:void(0)" class="main-nav">Women</a>
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-4">
                                                    <li class="submenu-main">
                                                        <a href="https://www.brooksrunning.com.au/womens-running-shoes">Women's Running Shoes</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-neutral-running-shoes">Neutral Running</a>
                                                        <p>Superior cushioning for runners that don't need added support.</p>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-support-running-shoes">Support Running</a>
                                                        <p>Superior cushioning and support features for runners that overpronate (roll inward).</p>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-lightweight-running-shoes">Lightweight Running</a>
                                                        <p>Lightweight and low profile running shoes.</p>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-competition-running-shoes">Competition Running</a>
                                                        <p>Fast and built for speed, on the road or track.</p>
                                                    </li>
                                                </ul>
                                                <ul class="tab-2 sub-menu-margin">
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-trail-running-shoes">Trail Running</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-cross-training-shoes">Cross-Training</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-walking-shoes">Walking</a>
                                                    </li>
                                                    <li class="sale">
                                                        <a href="https://www.brooksrunning.com.au/womens-running-shoes-sale">Sale Shoes</a>
                                                    </li>
                                                </ul>
                                                <ul class="tab-2 sub-menu-margin">
                                                    <li class="submenu-main">
                                                        <a href="https://www.brooksrunning.com.au/footwear/women/best_selling">All Best Sellers</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/adrenaline-gts-18-womens-running-shoes/120268_516.html" title="Adrenaline GTS 18">Adrenaline GTS 18</a> 
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/glycerin-16-womens-running-shoes/120278_070.html" title="Glycerin 16">Glycerin 16 </a> 
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/ghost-11-womens-running-shoes/120277_493.html" title="Ghost 11">Ghost 11</a> 
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/ravenna-9-womens-running-shoes/120269_027.html" title="Ravenna 9">Ravenna 9 </a> 
                                                    </li>
                                                </ul>
                                                <ul class="tab-4 border-left">
                                                    <li class="submenu-main">
                                                        <a href="https://www.brooksrunning.com.au/womens-running-clothes">Women's Running Clothing</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-sports-bras">Sports Bras</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-running-shorts">Shorts</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-running-tops">Tops</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-running-jackets-vests">Jackets &amp; Vests</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-running-pants-tights">Tights &amp; Pants</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-reflective-running-gear">NightLife High-Visibility</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-running-socks">Socks</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/womens-running-accessories">Accessories</a>
                                                    </li>
                                                    <li class="sale">
                                                        <a href="https://www.brooksrunning.com.au/womens-running-clothes-sale">Sale Clothing</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="header-menu--btn">
                                                        <p>Not sure which shoe is right for you?</p>
                                                        <a href="#" class="primary-button">Use our shoe finder</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main"><a href="javascript:void(0)" class="main-nav">Men</a>
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-4">
                                                    <li class="submenu-main">
                                                        <a href="https://www.brooksrunning.com.au/mens-running-shoes">Men's Running Shoes</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-neutral-running-shoes">Neutral Running</a>
                                                        <p>Superior cushioning for runners that don't need added support.</p>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-support-running-shoes">Support Running</a>
                                                        <p>Superior cushioning and support features for runners that overpronate (roll inward).</p>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-lightweight-running-shoes">Lightweight Running</a>
                                                        <p>Lightweight and low profile running shoes.</p>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-competition-running-shoes">Competition Running</a>
                                                        <p>Fast and built for speed, on the road or track.</p>
                                                    </li>
                                                </ul>
                                                <ul class="tab-2 sub-menu-margin">
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-trail-running-shoes">Trail Running</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-cross-training-shoes">Cross-Training</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-walking-shoes">Walking</a>
                                                    </li>
                                                    <li class="sale">
                                                        <a href="https://www.brooksrunning.com.au/mens-running-shoes-sale">Sale Shoes</a>
                                                    </li>
                                                </ul>
                                                <ul class="tab-2 sub-menu-margin">
                                                    <li class="submenu-main">
                                                        <a href="https://www.brooksrunning.com.au/footwear/men/best_selling">Best Sellers</a>
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="https://www.brooksrunning.com.au/adrenaline-gts-18-mens-running-shoes/110271_438.html" title="Adrenaline GTS 18">Adrenaline GTS 18</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="https://www.brooksrunning.com.au/glycerin-16-mens-running-shoes/110289_069.html" title="Glycerin 16">Glycerin 16 </a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="https://www.brooksrunning.com.au/ghost-11-mens-running-shoes/110288_093.html" title="Ghost 11">Ghost 11</a> 
                                                    </li>
                                                    <li>
                                                        <a class="name-link" href="https://www.brooksrunning.com.au/beast-18-mens-running-shoes/110282_015.html" title="Beast 18">Beast 18 </a> 
                                                    </li>
                                                </ul>
                                                <ul class="tab-4 border-left">
                                                    <li class="submenu-main">
                                                        <a href="https://www.brooksrunning.com.au/mens-running-clothes">Men's Running Clothing</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-running-shorts">Shorts</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-running-tops">Tops</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-running-jackets-vests">Jackets &amp; Vests</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-running-pants-tights">Tights &amp; Pants</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-reflective-running-gear">NightLife High-Visibility</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-running-socks">Socks</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.brooksrunning.com.au/mens-running-accessories">Accessories</a>
                                                    </li>
                                                    <li class="sale">
                                                        <a href="https://www.brooksrunning.com.au/mens-running-clothes-sale">Sale Clothing</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main"><a href="javascript:void(0)" class="main-nav">Shoe Finder</a>
                        </li>
                        <li class="main"><a href="#" class="main-nav">Meet Brooks</a>
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-3">
                                                    <li class="submenu-main">
                                                        <a href="#">About Us</a>
                                                    </li>
                                                    <li><a href="https://www.brooksrunning.com.au/meet_brooks/what_makes_us_tick">What Makes Us Tick</a></li>
                                                    <li><a href="https://www.brooksrunning.com.au/meet_brooks/run_happy_is">Run Happy is</a></li>
                                                    <li><a href="https://www.brooksrunning.com.au/meet_brooks/technology">Technology</a></li>
                                                    <li><a href="https://www.brooksrunning.com.au/runsignature">Run Signature</a></li>
                                                </ul>
                                                <ul class="tab-3">
                                                    <li class="submenu-main">
                                                        <a href="#">Run Happy</a>
                                                    </li>
                                                    <li><a href="https://www.brooksrunning.com.au/meet_brooks/competition/rh_competition">Competition</a></li>
                                                    <li><a href="https://www.brooksrunning.com.au/meet_brooks/enewsletter">E-Newsletter</a></li>
                                                    <li><a href="https://www.brooksrunning.com.au/meet_brooks/trainingtips">Training Tips</a></li>
                                                    <li><a href="https://www.brooksrunning.com.au/meet_brooks/injury_prevention">Injury Prevention</a></li>
                                                </ul>
                                                <ul class="tab-3">
                                                    <li class="submenu-main">
                                                        <a href="#">Community</a>
                                                    </li>
                                                    <li><a href="https://www.brooksrunning.com.au/events">Event Calendar</a></li>
                                                    <li><a href="http://talk.brooksrunning.com/au/">Brooks Blog</a></li>
                                                </ul>
                                                <div class="tab-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main"><a href="javascript:void(0)" class="main-nav">Sale</a>
                            <div class="desktop-navigation--sub">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row nav-wrapper">
                                                <ul class="tab-2">
                                                    <li class="submenu-main">
                                                        Women's Sale
                                                    </li>
                                                    <li><a href="https://www.brooksrunning.com.au/womens-running-shoes-sale">Sale Shoes</a></li>
                                                    <li><a href="https://www.brooksrunning.com.au/womens-running-clothes-sale">Sale Clothing</a></li>
                                                </ul>
                                                <ul class="tab-10">
                                                    <li class="submenu-main">
                                                       Men's Sale
                                                    </li>
                                                    <li><a href="https://www.brooksrunning.com.au/mens-running-shoes-sale">Sale Shoes</a></li>
                                                    <li><a href="https://www.brooksrunning.com.au/mens-running-clothes-sale">Sale Clothing</a></li>
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
            <form role="search" action="#" method="get">
                <input type="search" name="q" id="q" class="o-header__search small valid" placeholder="SEARCH PRODUCTS" itemprop="query-input" autocomplete="off">
                <button type="submit"><i class="icon-next-arrow"></i></button>
            </form>
        </div>
    </div>
</header>
<!-- /Header for desktop -->
