@extends('customer.layouts.master')

@section('content')
<div class="create-account--header">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <h1>Welcome to the Team Brooks Staff Purchase Program</h1>
                    <!-- <p>Not {{ auth()->user()->first_name }} ? <a href="{{ route('logout') }}">Logout</a></p> -->
                </div>
            </div>
        </div>
    </div>


<!-- New Section Staff Purchase -->
<div class="create-account--staff-purchase-header">
  <div class="wrapper">
    <div class="row">
      <div class="tab-7">
           
            <p>This program is exclusively available to the staff of The Athlete's Foot. You will receive a discount of up to 70% on our current range of products.</p>
      </div>
      <div class="tab-5">
      	 <div class="staffpurchased--logo">
               <img src="/images/staff-purchase-program/TAF_Horizontal.png" alt="">
               <!-- <img src="/images/staff-purchase-program/rebel_pos_black.png" alt=""> -->
      	 </div>
      </div>
    </div>
  </div>
</div>
<!-- End staff purchase -->
<!-- New Section for staff purchase -->
<div class="create-account wrapper">
    <div class="headerloyalty-terms">
        <div class="row">
           
            <div class="col-9 tab-9">
            <p class="br-heading terms">Please note:</p>
            <p class="info">Orders can only be shipped to the address of your nominated store of employment.</p>
            <p class="info">There is a limit of 2 pairs per staff member per season.</p>    
            <p class="info">Shoes are strictly for personal use only - shoes must not be onsold, resold, or bought on behalf of someone else.</p>
            <p class="info"> Texas Peak reserves the right to cancel an order if an applicant is deemed ineligible.</p>
            <p class="info">Please refer to our standard <a href="">terms and conditions</a>, <a href="">returns policy</a> or <a href="">delivery information</a>.</p>
            </div>
            <div class="col-3 tab-3">
                &nbsp;
            </div>
        </div>
    </div>
    <!-- <div class="footerloyalty-info">
        <div class="row">
            <div class="col-12 tab-12">
            <h1>Would you like a product information session or resources for your clinic?</h1>
            <p class="info"> <a href="mailto:info@brooksrunning.com.au">Click here</a> to contact a Technical representative. </p>
            </div>
        </div>
    </div> -->
</div>

<div class="wrapper">
	<div class="staff-purchase">
		
		<div class="row">
			<div class="tab-6">
				<div class="staff-purchase--wrapper bg1">
					
					<img src="/images/staff-purchase-program/S20_APR_LA_20190428_Brooks_00251.png" alt="">
					<div class="btn-wrapper clearfix">
						<a href="/mens-running-shoes" class="primary-button">Shop men's</a>
					</div>
				</div>
			</div>
			<div class="tab-6">
				<div class="staff-purchase--wrapper bg2">
				
					<img src="/images/staff-purchase-program/S20_APR_LA_20190430_Brooks_01256.png" alt="">
					<div class="btn-wrapper clearfix">
						<a href="/womens-running-shoes" class="primary-button">Shop women's</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
    <!-- <section class="create-account wrapper">
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
    </section> -->

<!-- New Section for Loyalty -->

<!-- <div class="create-account--loyaltybanner">
    <picture>
            <source media="(max-width: 595px)" srcset="/images/accounts/PPP/F19_APR_LA_00714.png">
            <img src="/images/accounts/PPP/F19_APR_LA_00714@2x.png" alt="shoes">
    </picture>
</div> -->
@endsection
