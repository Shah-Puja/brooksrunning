@extends('customer.layouts.master')

@section('content')
<div class="create-account--header">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <h1 class="br-mainheading">Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}!</h1>
                    <p>Not {{ auth()->user()->first_name }} ? <a href="{{ route('logout') }}">Logout</a></p>
                </div>
            </div>
        </div>
    </div>

<!-- New Section for Loyalty -->
<div class="create-account wrapper">
    <div class="footerloyalty-terms">
        <div class="row">
            <div class="col-4 tab-4">
                <p class="br-heading">The Brooks<sup>&reg;</sup> Professional Purchase Program enables Sports Medicine practitioners to purchase Brooks products for their personal use at exclusive member pricing. </p>
                <p class="br-heading">We believe practitioners are an integral part of the footwear industry and have created this program in recognition of this role and to enable you to experience our products. </p>
            </div>
            <div class="col-8 tab-8">
            <p class="br-heading terms">Terms and Conditions:</p>
            <p class="info">Professional Purchase Program Members are entitled to $800 in purchases per year at program discounted rates.</p>
            <p class="info">Shoes are strictly for personal use only. Shoes must not be onsold, resold, or bought on behalf of someone else.</p>    
            <p class="info">Texas Peak reserves the right to cancel an order if an applicant is deemed ineligible. </p>
            <p class="info"> Please refer to our standard terms and conditions, returns policy or delivery information. </p>
            </div>
        </div>
    </div>
    <div class="footerloyalty-info">
        <div class="row">
            <div class="col-12 tab-12">
            <h1>Would you like a product information session or resources for your clinic?</h1>
            <p class="info"> <a href="mailto:info@brooksrunning.com.au">Click here</a> to contact a Technical representative. </p>
            </div>
        </div>
    </div>
</div>
    <section class="create-account wrapper">
        <div class="row">
            <div class="tab-4">
                <div class="create-account--homepage loyalty-details">
                    <div class="icon-img">
                        <img src="images/accounts/icon-account-details.png" alt="">
                    </div>
                    <h3 class="br-heading">Personal Details</h3>
                    <div class="br-info">View and update your account details.</div>
                    <a href="loyalty-account-personal" class="primary-button">View Details</a>
                </div>
            </div>
            <div class="tab-4">
                <div class="create-account--homepage loyalty-details">
                    <div class="icon-img">
                        <img src="images/accounts/icon-order-history.png" alt="">
                    </div>
                    <h3 class="br-heading">Order History</h3>
                    <div class="br-info">View your current or past orders.</div>
                    <a href="account-order-history" class="primary-button">View Order History</a>
                </div>
            </div>
            <!-- <div class="tab-4">
                <div class="create-account--banner">
                    <img src="images/accounts/account-banner.png" alt="">
                </div>
            </div> -->
            @if($shoefinder_user_details && $shoefinder_user_details->status=='Y')
            <div class="tab-4">
            <div class="create-account--homepage loyalty-shoefinder-section loyalty-details">
                    <div class="horizontal-shoe-finder">
                        <div class="horizontal-shoefinder-logo">
                            <img src="/images/shoes/shoe-lp-shoefinder-logo-hzl.png" alt="" class="foot-logo">
                            <img src="/images/shoes/shoe-lp-shoefinder-magnifylogo.png" alt="" class="magnify-logo">
                        </div>
                        <p class="br-heading hidden-mob loyalty-shoefinder-heading">Shoe Finder</p>
                        <p class="br-heading-mob visible-mob"><span class="finder-heading-mob">Shoe Finder</span> </p>
                        <div class="br-info loyalty-shoefinder-info">View your shoe finder results, or retake <br class="hidden-tab"/>the shoe finder. <br class="hidden-tab"/><br class="hidden-tab"/></div>
                    
                        <div class="horizontal-shoefinder-btn">
                            <a class="primary-button" href="/shoefinder">View Shoes</a>
                        </div>
		            </div>
                </div>
            </div>
            @else
            <div class="tab-4">
                <!-- <div class="create-account--homepage shoefinder">
                    <div class="icon-img">
                         <img src="/images/br-shoefinder-logo.png" alt="">
                    </div>
                    <h3 class="br-heading">Need help choosing a shoe?</h3>
                    <div class="br-info">Uses your biomechanics, preferences and running science to find the ideal shoe for you.</div>
                    <a href="/shoefinder" class="primary-button">Try The Shoe Finder</a>
                </div> -->
                <div class="create-account--homepage loyalty-shoefinder-section loyalty-details">
                    <div class="horizontal-shoe-finder">
                        <div class="horizontal-shoefinder-logo">
                            <img src="/images/shoes/shoe-lp-shoefinder-logo-hzl.png" alt="" class="foot-logo">
                            <img src="/images/shoes/shoe-lp-shoefinder-magnifylogo.png" alt="" class="magnify-logo">
                        </div>
                        <p class="br-heading hidden-mob">Need help choosing a shoe?</p>
                        <p class="br-heading-mob visible-mob"><span class="finder-heading-mob">Need help choosing a shoe?</span> </p>
                        <div class="br-info"> Our shoe finder uses your biomechanics, preferences and running science to find the ideal shoe for you. </div>
                    
                        <div class="horizontal-shoefinder-btn">
                            <a class="primary-button" href="/shoefinder">Try the shoe finder</a>
                        </div>
		            </div>
                </div>
            </div>
            @endif
        </div>
    </section>

<!-- New Section for Loyalty -->

<div class="create-account--loyaltybanner">
    <picture>
            <source media="(max-width: 595px)" srcset="/images/accounts/PPP/F19_APR_LA_00714.png">
            <img src="/images/accounts/PPP/F19_APR_LA_00714@2x.png" alt="shoes">
    </picture>
</div>
@endsection
