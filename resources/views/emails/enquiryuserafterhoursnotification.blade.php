<!DOCTYPE html>
<html>
    <head>
        <title>Enquiry Notification</title>
    </head> 
    <body>
        <!-- New Template -->
        Hi {{ $enquiry->fname .' '.$enquiry->lname }},
        <br /><br/>
        Thanks for your email enquiry!
        <br /><br />
        We are working on your request and will respond to your email on the next business day. We are open Monday – Friday (9am to 5pm).
        <br /><br />
        Team Brooks
        <br />
        <a href="{{ env('APP_URL') }}">www.brooksrunning.com.au</a>
        <br/><br/>
        ----
        <br/><br/>
        Some quick links:
        <br/>
        - <a href ="{{ env('APP_URL').'info/shipping-information' }}">Shipping Information</a>
        <br/>
        - <a href ="{{ env('APP_URL').'info/returns-exchange' }}">Returns & Exchanges</a>
        <br/>
        - <a href ="{{ env('APP_URL').'shoefinder' }}">Find Your Perfect Shoe</a>
    </body>
</html>
