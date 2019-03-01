<!DOCTYPE html>
<html>
    <head>
        <title>Enquiry Notification</title>
    </head> 
    <body>
        <!-- New Template -->
        @php  $date = date("d M Y H:s:i");  @endphp
        An Inquiry has been made at {{ env('APP_URL') }}
        <br />
        Date: {{ $date }}
        <br />
        Name : {{ $enquiry->fname .' '.$enquiry->lname }} <br />
        Email : {{ $enquiry->email }}<br />
        Phone : {{ $enquiry->phone }}<br />
        Subject : {{ $enquiry->subject }}<br />
        Category: {{ $enquiry->category }}<br />
        Question: {{ $enquiry->message }} <br>
        @if($enquiry->order_no!='') 
        Order Number: {{ $enquiry->order_no }}
        @endif
    </body>
</html>
