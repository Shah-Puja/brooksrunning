@if(Session::get('medibank_gateway')=='Yes')
<link rel="stylesheet" href="/css/medibank-styles.css">
<div class="pdp-container--medibank">
    @if($product->price_sale < $product->price)
        <h3>For every $1 on spent on sale Brooks items, receive xx Live Better Points.</h3>
    @else
        <!-- <h3>For every $1 spent at Brooks on full price items, receive xx Live Better points</h3> -->
        <h3>Earn [X] Live Better Points for every $1 spent^ on full price Brooks Runners and [Y] for every $1 spent on discounted Brooks Runners purchased at <a href="livebetter.brooks.com.au" style="color:#fff;">livebetter.brooks.com.au</a>. Available to Medibank members with hospital or extras cover.*</h3>
        <a href="#disclaimer" class="disclaimer-link">For full terms and conditions, please see below.</abs>
    @endif
</div>
@endif