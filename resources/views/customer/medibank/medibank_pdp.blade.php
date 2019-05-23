@if(Session::get('medibank_gateway')=='Yes')
<link rel="stylesheet" href="/css/medibank-styles.css">
<div class="pdp-container--medibank">
    @if($product->price_sale < $product->price)
        <h3>For every $1 on spent on sale Brooks items, receive xx Live Better Points</h3>
    @else
        <h3>For every $1 spent at Brooks on full price items, receive xx Live Better points</h3>
    @endif
</div>
@endif