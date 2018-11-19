<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link href="/images/favicon.ico" rel="shortcut icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Brooks Running</title>
        <!-- lightslider file -->
        <link rel="stylesheet" href="/css/lightslider.css">
        <!-- common file -->
        <link rel="stylesheet" href="/css/common.css">
        <script src="/js/jquery-2.2.4.min.js"></script>
        @yield('head')
        @include('digitalmarketingsnippets.gtm')
    </head>
    <body>
        @include('digitalmarketingsnippets.gtmnoscript')
        @include('customer.layouts.header_desktop')
        @include('customer.layouts.header_mobile')

