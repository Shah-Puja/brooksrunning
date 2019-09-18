System Received an error code while working with AP21 API <br> Details are listed below -<br>

API - {{ $data['api'] }}<br>
URL - {{ $data['url'] }}<br>
HTTP Error - {{ (isset($data['http_error'])) ? $data['http_error'] :'' }}<br>
Error Response - {{ $data['error_response'] }}<br>		
Error Type-  {{ $data['error_type'] }} <br>
Parameters - {{ (isset($data['body'])) ? $data['body'] :'' }}<br>		
		
<br> - Brooks
					