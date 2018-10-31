<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Brooks Running</title>
        <!-- lightslider file -->
        <link rel="stylesheet" href="/css/lightslider.css">
        <!-- common file -->
        <link rel="stylesheet" href="/css/common.css">
        <script src="/js/jquery-2.2.4.min.js"></script>
    </head>
    <body>
        @include('customer.layouts.header_desktop')
        @include('customer.layouts.header_mobile')

