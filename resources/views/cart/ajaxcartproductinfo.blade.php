@if ( $cart )
@foreach($cart->cartItems as $cartItem)  
@php //echo "<pre>";print_r($cartItem->variant);die; @endphp
		<div class="shoppingcart-products">
						<div class="row cp-details__wrapper">
							<div class="col-3 tab-6">
								<div class="shopping-img"> 
									<img src="{{ $cartItem->variant->product->media->image1Medium() }}" alt="">
								</div>
							</div>
							<div class="col-3 tab-6">
								<div class="product-info">
									<h3 class="bold-font">{{ $cartItem->variant->product->stylename }}</h3>
									<p>Item # {{ $cartItem->variant->product_id }}</p>
									<p>Color: {{ $cartItem->variant->product->color_name }}</p>
									<p>Size: {{ $cartItem->variant->size }}</p>
									<p>Mens Width: {{ $cartItem->variant->width }}</p>
									<div class="edit">
										<a href="JavaScript:Void(0);" class="bold-font edit-cart--handle" >EDIT DETAILS</a>
									</div>
								</div>
							</div>
							<div class="col-2 tab-12">
								<div class="product-info quantity clearfix">
									<div class="quantity-heading">
										<p class="bold-font">Quantity:</p>
									</div>
									<div class="input-wrapper">
									<input type="text" class="input-field" name='qty' value="{{ $cartItem->qty }}" data-qty="{{ $cartItem->qty }}"> 
									</div>
									<div class="mob-btn">
									 <button type="submit" data-cart-page="Yes" data-action="update" data-sku="{{ $cartItem->variant->id }}" class="bold-font action">Update</button>
	                                    <button type="submit" data-cart-page="Yes" data-action="remove" data-sku="{{ $cartItem->variant->id }}" class="bold-font action">Remove</button>
									</div>
								</div>
							</div>
                                                    
							<div class="col-4 tab-12">
								<div class="product-info">
									<div class="row price">
										<div class="mob-5"><p class="bold-font blue">Unit Price:</p></div>
										<div class="mob-7">
										<p class="bold-font blue right">
								@if (($cartItem->variant->price_sale > 0) && ($cartItem->variant->price_sale < $cartItem->variant->price))
										<del>&dollar;{{ number_format($cartItem->variant->price, 2) }}</del>
								@endif
								&dollar;{{ number_format($cartItem->variant->price_sale, 2) }} 
										</p>
										</div>
									</div>
									<div class="row price">
										<div class="mob-5"><p>Item Total:</p></div>
										<div class="mob-7"><p class="right">&dollar;{{ number_format($cartItem->variant->price_sale * $cartItem->qty, 2) }}</p></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					 
					 
        
        @endforeach
@else
 <h3>YOUR SHOPPING CART DOES NOT HAVE ANY PRODUCTS.</h3>
@endif