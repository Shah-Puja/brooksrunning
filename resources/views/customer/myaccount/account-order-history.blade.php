@extends('customer.layouts.master')
@section('content')
<div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="br-mainheading">Welcome, Meagan!</h1>
				<p>Not Meagan? <a href="#">Logout</a></p>
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
					<div class="shoppingcart-products">
						<div class="row">
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>13220</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>Meagan James<br/>30 Tullamarine Park Rd<br/>Tullamarine<br/>Australia 3043</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>Meagan James<br/>30 Tullamarine Park Rd<br/>Tullamarine<br/>Australia 3043</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>24 July 2017</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>&dollar;239.95</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<div class="edit">
										<a href="JavaScript:Void(0);" class="bold-font edit-order--handle" >View Order</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="shoppingcart-products">
						<div class="row">
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>13220</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>Meagan James<br/>30 Tullamarine Park Rd<br/>Tullamarine<br/>Australia 3043</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>Meagan James<br/>30 Tullamarine Park Rd<br/>Tullamarine<br/>Australia 3043</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>24 July 2017</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>&dollar;239.95</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<div class="edit">
										<a href="JavaScript:Void(0);" class="bold-font edit-order--handle" >View Order</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="shoppingcart-products">
						<div class="row">
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>13220</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>Meagan James<br/>30 Tullamarine Park Rd<br/>Tullamarine<br/>Australia 3043</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>Meagan James<br/>30 Tullamarine Park Rd<br/>Tullamarine<br/>Australia 3043</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>24 July 2017</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<p>&dollar;239.95</p>
								</div>
							</div>
							<div class="col-2 tab-4">
								<div class="product-info">
									<div class="edit">
										<a href="JavaScript:Void(0);" class="bold-font edit-order--handle" >View Order</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div id="edit-order--popup" class="popup-container edit-cart--popup">
	<div class="popup-container--wrapper">
		<div class="popup-container--info">
			<div class="close-me"><span class="icon-close-icon edit-order--close"></span></div>
			<div class="cart-left--container account-order-popup">
				<div class="heading">
					<h3 class="br-heading">Order Information</h3>
				</div>
				<button class="pdp-button pdp-proceed-mob visible-mob">Proceed to Purchase</button>
				<div class="shopping-heading">
					<div class="row">
						<div class="col-6 hidden-tab hidden-mob"><p>Product</p></div>
						<div class="col-3 hidden-tab hidden-mob"><p>Quantity</p></div>
						<div class="col-3 hidden-tab hidden-mob"><p>Price</p></div>
					</div>
				</div>
				<div class="shoppingcart-wrapper">
					<div class="shoppingcart-products">
						<div class="row">
							<div class="col-3 tab-6">
								<div class="shopping-img">
									<img src="/images/apparel/apparel1-details.jpg" alt="">
								</div>
							</div>
							<div class="col-3 tab-6">
								<div class="product-info">
									<h3 class="bold-font">Adrenaline GTS 18</h3>
									<p>Item # 110241</p>
									<p>Color: 033</p>
									<p>Size: 7.5</p>
									<p>Mens Width: D-Normal</p>
								</div>
							</div>
							<div class="col-3 tab-12">
								<div class="product-info quantity clearfix">
									<div class="quantity-heading">
										<p class="bold-font">Quantity:</p>
									</div>
									<div class="input-wrapper">
										<input type="text" class="input-field">
									</div>
								</div>
							</div>
							<div class="col-3 tab-12">
								<div class="product-info">
									<div class="row price">
										<div class="mob-5"><p class="bold-font blue">Unit Price:</p></div>
										<div class="mob-7"><p class="bold-font blue right"><del>&dollar;239.95</del> &dollar;169.95</p></div>
									</div>
									<div class="row price">
										<div class="mob-5"><p>Item Total:</p></div>
										<div class="mob-7"><p class="right">&dollar;169.95</p></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="cart-right--container footer-order">
					<div class="row">
						<div class="col-8"></div>
						<div class="col-4">
							<div class="order">
								<h3 class="br-heading">Order Summary</h3>
								<div class="order-info">
								    <div class="row">
								    	<div class="mob-7">
								    		<p>Subtotal</p>
								    	</div>
								    	<div class="mob-5">
								    		<p class="right">$ 399.90</p>
								    	</div>
								    </div>
								    <div class="row">
								    	<div class="mob-7">
								    		<p>Standard Delivery</p>
								    	</div>
								    	<div class="mob-5">
								    		<p class="right">$ 0.0</p>
								    	</div>
								    </div>
								    <div class="row total">
								    	<div class="mob-7">
								    		<p class="bold-font blue">Order Total:</p>
								    	</div>
								    	<div class="mob-5">
								    		<p class="bold-font blue right">$ 399.90</p>
								    	</div>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection