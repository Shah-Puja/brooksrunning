@extends('customer.layouts.master')
@section('content')
<div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="br-mainheading">Shipping Information</h1>
			</div>
		</div>
	</div>
</div>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-9">
			<div class="create-account--left contact-us--container">
				<!-- <h3 class="br-info">Main Heading</h3> -->
                <!-- <h3 class="br-info">PLEASE NOTE: This policy is only valid for online purchases of footwear, clothing and accessories via brooksrunning.com.au.</p> -->
				<h3 class="br-heading">EXPRESS </h3>
                <p class="br-info">1-3 Business Days</p>
                <p class="br-info">Please note Express Shipping is available in Australia at a Flat Rate of $15.</p>

                <h3 class="br-heading">STANDARD </h3>
                <p class="br-info">2-10 Business Days</p>
                <p class="br-info">Free delivery on all Australian orders above $50. All other orders will incur a flat rate of $10 for delivery. </p>
               
                <h3 class="br-heading">NEW ZEALAND SHIPPING</h3>
                <p class="br-info">2-10 Business Days</p>
				<p class="br-info">We offer shipping to New Zealand at a flat rate of AU $25. </p>
				<p class="br-info">New Zealand customers are responsible for duties or import costs, if any, that may be incurred in New Zealand. Please note: that the Courier has the sole discretion to pay these costs where applicable without prior notification to the customer. The customer will be responsible for reimbursing the Courier any costs incurred.</p>

                <h3 class="br-heading">INTERNATIONAL SHIPPING</h3>
                <p class="br-info">Unfortunately we do not ship outside of Australia and New Zealand. </p>
               
                <h3 class="br-heading">Important information about delivery times </h3>
				<ul class="br-info">
					<li>Pease note that all orders placed after 3pm will be despatched the next business day.</li>
					<li>Our warehouse is based in Victoria and does not operate on Victorian Public Holidays. Please be aware that there may be some delay to your order if placed during these periods.  </li>
					<li>Once your order has been dispatched from Brooks we are unable to change the delivery address or redirect it to another address.</li>
					<li>All orders should include a daytime delivery address and contact details.</li>
					<li>Delivery times may vary, particularly for remote locations. The delivery times mentioned are an indicative time for delivery from when your order ships from Brooks.</li>
					<li>All delivery times are indications only (as provided by the individual delivery service), and indicate the time it would normally take for delivery once the goods are dispatched from Brooks. Delays in shipment may occur if a product is out of stock or temporarily unavailable from our suppliers. You will be advised via email of any substantial delay. In the event of some items on your order being in stock and some items being substantially delayed we will contact you with the option to split your shipment. Additional freight charges may apply.</li>
				</ul>
				<p class="br-info">This policy is only valid for online purchases of footwear, clothing and accessories via brooksrunning.com.au.</p>
				<p class="br-info">All payments from this online store will appear on your credit card statement from Brooks Running / Fit Chain Pty Ltd.</p>
				<h3 class="br-heading">What if I am not home to accept the delivery?</h3>
                <p class="br-info">Signature is required on delivery with most of our orders. Where possible, we suggest having your purchases delivered to a work address or a location with someone available to sign for the parcel. If no one is present when a delivery is made a card is left detailing where to collect your parcel or to arrange a redelivery. </p>
				<!-- <p class="br-info"><i>Last Updated: 20th June 2017</i></p> -->
			</div>
		</div>
		<div class="col-3 contact-details--right">
			<div class="info-wrapper">
				<div class="icon">
					<img src="images/brooks_aus_icons_email.svg" alt="">
				</div>
				<div class="info">
					<h3 class="br-heading">Email us</h3>
					<p>Fill in our support form or if you prefer you can email us your enquiry and we'll get back to you shortly</p>
				</div>
			</div>
			<div class="info-wrapper">
				<div class="icon">
					<img src="images/brooks_aus_icons_phone.svg" alt="">
				</div>
				<div class="info">
					<h3 class="br-heading">Call us</h3>
					<p>Australia: 1300 735 099 <br/>New Zealand: 08 0061 3502 <br/>We're available to help you 
						<br/>Mon - Fri 9am - 5pm AEST</p>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection