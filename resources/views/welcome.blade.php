<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div>
            @foreach ($styles as $style)
        <p>{{ $style->style }} {{ $products->where('style', $style->style)->unique('color_code')->pluck('color_code') }}</p>
            @endforeach
        </div>
    </body>
</html>
