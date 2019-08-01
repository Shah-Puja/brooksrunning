System Received an error code while working with AP21 API <br> Details are listed below -<br>
@if(isset($order) && $order!='')      
    System Order Id - {{$order->id }}
    @if($order->order_no!='')
        Order No -{{ $order->order_no }}<br>
    @endif
@endif

API - {{ $data['api_name'] }}<br>
URL - {{ $data['URL'] }}<br>
Result - {{ $data['Result'] }}<br>
Parameters - {{ $data['Parameters'] }}<br>					
<br> - Brooks
					