@extends('customer.layouts.master')

@section('head')
<META NAME="robots" CONTENT="noindex">
@endsection

@section('content')
<div class="create-account--header loyalty-header">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <h1 class="br-heading">Register for the Brooks Professional Purchase Program</h1>
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
                        <h3>What is the Brooks Professional Purchase Program? </h3>
                    </div>
                    <div class="row">
                        <div class="tab-12 col-12 marginTop_0">
                            <div class="info">
                                <p>The Brooks<sup>&reg;</sup> Professional Purchase Program enables Sports Medicine practitioners<sup>*</sup> to purchase Brooks products for their personal use at exclusive member pricing. </p>
                            </div>
                        </div>
                        <div class="tab-12 col-12 marginTop_0">
                            <div class="info">
                                <p>We believe practitioners are an integral part of the footwear industry and have created this program in recognition of this role and to enable you to experience our products. </p>
                            </div>
                        </div>
                        <div class="tab-12 col-12 marginTop_0">
                            <div class="info">
                                <p>* <i>This program is open to currently practicing, registered Podiatrists and Sports Muscoskeletol Physiotherapists. Sports Chiropractors and Sports Osteopaths.</i> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection
