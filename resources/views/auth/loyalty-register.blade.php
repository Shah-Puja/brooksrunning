@extends('customer.layouts.master')

@section('head')
<META NAME="robots" CONTENT="noindex">
@endsection

@section('content')
<div class="create-account--header loyalty-header">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <h1 class="br-heading">Brooks Staff Purchase Program</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="create-account wrapper">
        <div class="row">
            <div class="col-9">
                @include('auth.loyalty-form')                
            </div>
            <div class="col-3">
                <div class="create-account--right temp_class loyalty_right">
                    <div class="header">					
                        <h3>Welcome to the Brooks Staff Purchase Program. </h3>
                    </div>
                    <div class="row">
                        <div class="tab-12 col-12 marginTop_0">
                            <div class="info">
                                <p>This program recognises the important role that staff of our retail partners play in getting Brooks onto the feet of their customers. It's goal is to help these staff experience the performance of our products for themselves by providing an exclusive offer on our current range. </p>
                            </div>
                        </div>
                        <div class="tab-12 col-12 marginTop_0">
                            <div class="info">
                                <p> *Please note that due to the significant discount on offer, some verifications steps are required to ensure the program is restricted to approved users only.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection
