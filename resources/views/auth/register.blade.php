@extends('customer.layouts.master')
@section('content')
<div class="create-account--header">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <h1 class="br-mainheading">Create an Account</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="create-account wrapper">
        <div class="row">
            <div class="col-9">
                @include('auth.form')                
            </div>
            <div class="col-3">
                <div class="create-account--right">
                    <div class="header">
                        <div class="icon-img">
                            <img src="images/accounts/icon-profile.png" alt="">
                        </div>					
                        <h3>Why Create An Account?</h3>
                    </div>
                    <div class="row">
                        <div class="tab-4 col-12">
                            <div class="info">
                                <h4>Faster Checkout</h4>
                                <p>Save your billing and shipping information to make it easier to buy your favourite gear.</p>
                            </div>
                        </div>
                        <div class="tab-4 col-12">
                            <div class="info">
                                <h4>Order History</h4>
                                <p>Look up important information about your current and past orders.</p>
                            </div>
                        </div>
                        <div class="tab-4 col-12">
                            <div class="info">
                                <h4>News and Exclusive Offers</h4>
                                <p>Sign up to receive email updates on special promotions, new product announcements, gift ideas, and more.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection
