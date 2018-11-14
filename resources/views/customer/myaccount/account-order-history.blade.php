@extends('customer.layouts.master')
@section('content')
<div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="br-mainheading">Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}!</h1>
				<p>Not {{ auth()->user()->first_name }}? <a href="/logout">Logout</a></p>
			</div>
		</div>
	</div>
</div>
<section class="cart-container wrapper">
	<div class="row">
		<div class="col-12">
			<div class="cart-left--container account-order--history">
				<div class="heading">
					<h3 class="br-heading">Order History</h3>
					<p>Your Information</p>
				</div>
				<div class="shopping-heading">
					<div class="row">
						<div class="col-2 tab-4"><p>Order No</p></div>
						<div class="col-2 tab-4"><p>Billing Address</p></div>
						<div class="col-2 tab-4"><p>Delivery Address</p></div>
						<div class="col-2 tab-4"><p>Date</p></div>
						<div class="col-2 tab-4"><p>Amount</p></div>
						<div class="col-2 tab-4"><p>Action</p></div>
					</div>
				</div>
				<div class="shoppingcart-wrapper">
				@foreach($user_order_details as $order_details)
					<div class="shoppingcart-products"> 
						<div class="row">
							<div class="col-2 tab-4">
								<div class="product-info">
								@php //echo "<pre>";print_r($order_details);die; @endphp
								<p>{{ $order_details->order_no }}</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>{{ $order_details->address->b_fname }} {{ $order_details->address->b_lname }}<br/>{{ $order_details->address->b_add1 }}<br/>{{ $order_details->address->b_add2 }}<br/>{{ $order_details->address->b_city }}<br/>{{ $order_details->address->b_state }} {{ $order_details->address->b_postcode }}</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>{{ $order_details->address->s_fname }} {{ $order_details->address->s_lname }}<br/>{{ $order_details->address->s_add1 }}<br/>{{ $order_details->address->s_add2 }}<br/>{{ $order_details->address->s_city }}<br/>{{ $order_details->address->s_state }} {{ $order_details->address->s_postcode }}</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p> {{ date('d F Y', strtotime($order_details->created_at)) }} </p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>&dollar;{{ number_format($order_details->grand_total, 2) }}</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<div class="edit">
										<a href="JavaScript:Void(0);" id="view_{{ $order_details->id }}" class="bold-font edit-order--handle" >View Order</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<div id="edit-order--popup" class="popup-container edit-cart--popup">
	
</div>

@endsection