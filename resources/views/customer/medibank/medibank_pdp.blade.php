@if(Session::get('medibank_gateway')=='Yes')
<link rel="stylesheet" href="/css/medibank-styles.css">
<div class="pdp-container--medibank" id="disclaimer-link-top">
        <!-- <p>Earn 15 Live Better Points for every $1 spent on full price Brooks Runners and 10 for every $1 spent on discounted Brooks Runners purchased online at <a href="http://livebetter.brooks.com.au/" style="text-decoration:underline; color:#fff;">livebetter.brooksrunning.com.au</a>, with Medibank Live Better. Available to Medibank members with hospital or extras cover.*</p> -->
        <p>Earn 15 Live Better Points for every $1 spent on full price Brooks Runners and 10 Live Better Points for every $1 spent on discounted Brooks Runners purchased online at <a href="http://livebetter.brooks.com.au/" style="text-decoration:underline; color:#fff;">livebetter.brooksrunning.com.au</a>, with Medibank Live Better. Available to Medibank members with hospital or extras cover.* </p>
        <a href="#disclaimer" class="disclaimer-link">For full terms and conditions, please see below.</a>
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