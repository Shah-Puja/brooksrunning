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
    <section class="create-account wrapper">
        <div class="row">
            <div class="tab-4">
                <div class="create-account--homepage">
                    <div class="icon-img">
                        <img src="images/accounts/icon-account-details.png" alt="">
                    </div>
                    <h3 class="br-heading">Personal Details</h3>
                    <div class="br-info">Manage your name, email and password</div>
                    <a href="account-personal" class="primary-button">View Details</a>
                </div>
            </div>
            <div class="tab-4">
                <div class="create-account--homepage">
                    <div class="icon-img">
                        <img src="images/accounts/icon-order-history.png" alt="">
                    </div>
                    <h3 class="br-heading">Order History</h3>
                    <div class="br-info">Manage your name, email and password</div>
                    <a href="account-order-history" class="primary-button">View Order History</a>
                </div>
            </div>
            <div class="tab-4">
                <div class="create-account--banner">
                    <img src="images/accounts/account-banner.png" alt="">
                </div>
            </div>
            <div class="tab-4">
                <div class="create-account--homepage shoefinder">
                    <div class="icon-img">
                         <img src="/images/br-shoefinder-logo.png" alt="">
                    </div>
                    <h3 class="br-heading">Need help choosing a shoe?</h3>
                    <div class="br-info">Uses your biomechanics, preferences and running science to find the ideal shoe for you.</div>
                    <a href="/shoefinder" class="primary-button">Try the Shoe Finder</a>
                </div>
            </div>
        </div>
    </section>
@endsection
