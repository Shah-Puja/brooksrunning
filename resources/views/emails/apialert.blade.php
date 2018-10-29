System Received an error code while working with AP21 API <br> Details are listed below -<br>
                    System Order Id - {{ $order->id }}
@if($order->order_no!='')
    Order No -{{ $order->order_no }}<br>
@endif

API - {{ $data['api_name'] }}<br>
URL - {{ $data['URL'] }}<br>
Result - {{ $data['Result'] }}<br>
Parameters - {{ $data['Parameters'] }}<br>					
<br> - Brooks
					