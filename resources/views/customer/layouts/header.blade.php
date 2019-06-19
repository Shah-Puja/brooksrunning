<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link href="/images/favicon.ico" rel="shortcut icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
       

        @switch(Request::segment(1))
            @case("shoefinder")
                <title>Brooks Running Shoe Finder | Brooks Running Australia</title>
                @break;
            @case("womens-sports-bras")
                <title>Brooks Sports Bras | Brooks Running Australia</title>
                @break;
            @case("womens-running-shoes")
                <title>Brooks Running Women's Running Shoes</title>
                @break;
            @case("mens-running-shoes")
                <title>Brooks Running Men's Running Shoes</title>
                @break;
            @case("womens-running-shoes-sale")
                <title>Brooks Running Women's Running Shoes Sale</title>
                @break;
            @case("mens-running-shoes-sale")
                <title>Brooks Running Men's Running Shoes Sale</title>
                @break;
            @case("healthcare-shoes-for-nurses")
                <title>Nursing Shoes | Buy Brooks Shoes For Nurses</title>
                @break;
            @case("meet_brooks")
                @if(Request::segment(2) == "competition" && Request::segment(3) == "hbfrunforareasoncomp")
                    <title>Win a $1000 Running Kit!</title>
                    <meta name="description" content="Get prepared for HBF Run for a Reason">
                @else
                    <title>Brooks Running Shoes, Clothing & Sports Bras | Brooks Running</title>
                @endif
                @break;
            @default
                <title>Brooks Running Shoes, Clothing & Sports Bras | Brooks Running</title>
                @break;
        @endswitch
        <!-- lightslider file -->
        <link rel="stylesheet" href="/css/lightslider.css"> 
        <!-- common file -->
        <link rel="stylesheet" href="/css/common.css?v={{ Cache::get('css_version_number') }}">
        <script src="/js/jquery-2.2.4.min.js"></script>
        @yield('head')
        @include('digitalmarketingsnippets.gtm')
    </head>
    <body>
        @include('digitalmarketingsnippets.gtmnoscript')
        @include('customer.layouts.header_desktop')
        @include('customer.layouts.header_mobile')
        @include('customer.medibank.medibank_header')
