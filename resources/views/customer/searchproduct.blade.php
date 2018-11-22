@if($styles!='' && count($styles) >0)
<section class="search--container">
    <div class="wrapper homepage-new--arrival">
        <div class="new-arrival--container">
				<!-- <div class="close hidden-col hidden-tab visible-mob"><i class="icon-close"></i></div> -->
            <span class="icon-style icon-back-arrow prev"></span>
            <div class="owl-carousel">
            @foreach($styles as $style)
                 @foreach($products as $product)
                    @if($product->style== $style->style)
                            @php $colors_option[$style->style][] = $product; @endphp
                    @endif
                @endforeach

                @php
                    $price_sale = $style->variants->max('price_sale');
                    $price = $style->variants->max('price');
                    $max_price = collect($colors_option[$style->style])->transform(function ($product) {
                                        return $product->variants->pluck('price');
                                    })->flatten()->max();
                    $max_price_sale = collect($colors_option[$style->style])->transform(function ($product) {
                                        return $product->variants->pluck('price_sale');
                                    })->flatten()->max();
                    $min_price = collect($colors_option[$style->style])->transform(function ($product) {
                                        return $product->variants->pluck('price');
                                    })->flatten()->min();
                    $min_price_sale = collect($colors_option[$style->style])->transform(function ($product) {
                                        return $product->variants->pluck('price_sale');
                                    })->flatten()->min();
                @endphp
                <div class="item">
                    <a href="/{{$style->seo_name}}/{{$style->style}}_{{$style->color_code}}.html">
                        <div class="product_arrive">
                            <div class="prd_img">
                                <img src="{{ $style->image->image1Medium() }}">
                            </div>
                            <div class="prd_caption">
                                <h3> {{ ($style->gender!='' && $style->gender=='M')? "Men's" : "Women's" }} {{ $style->stylename }}</h3>
                                <div class="price">
                                    @if($min_price==$max_price && $min_price_sale==$max_price_sale && $min_price==$min_price_sale && $max_price==$max_price_sale)
                                        <span class="black price_text">&dollar;{{ $min_price_sale }}</span>
                                    @elseif($min_price==$max_price && $min_price_sale==$max_price_sale && $min_price!=$min_price_sale && $max_price!=$max_price_sale)
                                        <del><span class="black">&dollar;{{ $max_price }}</span></del>
                                        <span class="red price_text">&dollar;{{ $min_price_sale }}</span>
                                    @elseif($min_price==$min_price_sale && $max_price==$max_price_sale)
                                        <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                    @elseif($min_price==$max_price && $min_price_sale!=$max_price_sale)
                                    <del><span class="black">&dollar;{{ $max_price }}</span></del>
                                    <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                    @elseif($min_price!=$max_price && $min_price_sale==$max_price_sale)
                                    <del><span class="black">&dollar;{{ $min_price }} - &dollar;{{ $max_price }}</span></del>
                                    <span class="red price_text">&dollar;{{ $min_price_sale }}</span>
                                    @else
                                    <del><span class="black">&dollar;{{ $min_price }} - &dollar;{{ $max_price }}</span></del>
                                    <span class="black price_text">&dollar;{{ $min_price_sale }} - &dollar;{{ $max_price_sale }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <span class="icon-style icon-next-arrow next"></span>
        </div>
    </div>
</section>
@else
  <h2>WE'RE SORRY, NO PRODUCTS WERE FOUND FOR YOUR SEARCH</h2>
@endif
