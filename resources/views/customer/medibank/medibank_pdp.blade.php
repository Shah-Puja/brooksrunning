@if(Session::get('medibank_gateway')=='Yes')
<link rel="stylesheet" href="/css/medibank-styles.css">
<div class="pdp-container--medibank" id="disclaimer-link-top">
    @if($product->price_sale < $product->price)
        <h3>For every $1 on spent on sale Brooks items, receive xx Live Better Points.</h3>
    @else
        <!-- <h3>For every $1 spent at Brooks on full price items, receive xx Live Better points</h3> -->
        <p>Earn 15 Live Better Points for every $1 spent on full price Brooks Runners and 10 for every $1 spent on discounted Brooks Runners purchased online at <a href="http://livebetter.brooks.com.au/" style="text-decoration:underline; color:#fff;">livebetter.brooksrunning.com.au</a>, with Medibank Live Better. Available to Medibank members with hospital or extras cover.*</p>
        <a href="#disclaimer" class="disclaimer-link">For full terms and conditions, please see below.</a>
    @endif
</div>
<script>
$(document).ready(function(){
    $( "a.disclaimer-link" ).click(function( event ) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top - 50 }, 500);
    });
});
</script>
@endif