<?xml version="1.0"?>
<markers>
	@foreach ($stores as $store)
	<marker id="{{ $store->id }}" name="{{ $store->name }}" address="{{ $store->address }}" lat="{{ $store->lat }}" lng="{{ $store->lng }}" distance="{{ $store->distance }}"/>
	@endforeach
</markers>