@extends('customer.layouts.master')
@section('content')
<div class="create-account--header">
	<div class="wrapper">
		<div class="row">
			<div class="col-12">
				<h1 class="br-mainheading">Title of the page</h1>
			</div>
		</div>
	</div>
</div>
<section class="create-account wrapper">
	<div class="row">
		<div class="col-9">
			<div class="create-account--left contact-us--container">
				<h3 class="br-heading">Main Heading</h3>

				<p class="br-info">Body Copy Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat </p>

				<p class="br-info"><span class="bold">Sub heading</span> <br/>non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

				<ul class="br-info">
					<li>Bullet point</li>
					<li>Bullet point</li>
					<li>Bullet point</li>
					<li>Bullet point</li>
					<li>Bullet point</li>
					<li>Bullet point</li>
					<li>Bullet point</li>
				</ul>

				<p class="br-info"><a href="#" class="link">Link Text</a></p>
			</div>
		</div>
		<div class="col-3 contact-details--right">
			<div class="info-wrapper">
				<div class="icon">
					<img src="images/brooks_aus_icons_email.svg" alt="">
				</div>
				<div class="info">
					<h3 class="br-heading">Email us</h3>
				
					<p><a href="http://brooks.syginteractive.com/contact-us"><u>Fill in our email support form</u></a> and we'll get back to you shortly.</p>
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