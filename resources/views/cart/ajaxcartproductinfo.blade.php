@if ( $cart )
@foreach($cart->cartItems as $cartItem)  
@php //echo "<pre>";print_r($cartItem);die;
            $price_sale = (isset($cartItem->price_sale) && ($cartItem->price_sale != $cartItem->variant->price) && $cartItem->price_sale != 0) ? $cartItem->price_sale : $cartItem->variant->price;
        @endphp
		<div class="shoppingcart-products" data-main-sku="{{ $cartItem->variant->id }}">
						<div class="row cp-details__wrapper">
							<div class="col-3 tab-6">
								<div class="shopping-img"> 
									<img src="{{ $cartItem->variant->product->image->image1Medium() }}" alt="">
								</div>
							</div>
							<div class="col-3 tab-6">
								<div class="product-info">
									<h3 class="bold-font">{{ $cartItem->variant->product->stylename }}</h3>
									<p>Item # {{ $cartItem->variant->product_id }}</p>
									<p>Color: {{ $cartItem->variant->product->color_name }}</p>
									<p>Size: {{ $cartItem->variant->size }}</p>
									@if($cartItem->variant->width_name!="")
									<p> {{ ($cartItem->variant->product->gender == 'M') ? "Mens" : "Womens" }} Width: {{ $cartItem->variant->width_name }}</p>
									@endif
									<!-- <div class="edit" data-id="{{ $cartItem->variant->id }}">
										<a href="JavaScript:Void(0);" id="edit_{{ $cartItem->variant->id }}" class="bold-font edit-cart--handle" >EDIT DETAILS</a>
									</div> -->
								</div>
							</div>
							<div class="col-2 tab-12">
								<div class="product-info quantity clearfix">
									<div class="quantity-heading">
										<p class="bold-font">Quantity:</p>
									</div>
									<div class="input-wrapper">
									<input type="text" class="input-field cart_qty_update" name='qty' value="{{ $cartItem->qty }}" data-qty="{{ $cartItem->qty }}"> 
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
                                                                                    @if($cartItem->price_sale == 0 || $cartItem->price_sale==$cartItem->variant->price)
                                                                                    &dollar;{{ number_format($cartItem->variant->price, 2) }}
                                                                                     @endif
                                                                    @if (($cartItem->price_sale > 0) && ($cartItem->price_sale < $cartItem->variant->price))
                                                                                    <del>&dollar;{{ number_format($cartItem->variant->price, 2) }}</del> 
                                                                    &dollar;{{ number_format($cartItem->price_sale, 2) }} 
                                                                    @endif
                                                                                    </p>
										</div>
									</div>
									
									@if (!empty($cartItem->discount_detail) && $cartItem->discount_detail != 0) 
									<div class="row price">
                                                                            <div class="mob-5"><p>Discount:</p></div>
                                                                            <div class="mob-7"><p class="right" style="color:red;">-&dollar;{{ number_format($cartItem->discount_detail, 2) }}
                                                                            </div>
									</div>
                                                                        @endif

									<div class="row price">
										<div class="mob-5"><p>Item Total:</p></div>
										<div class="mob-7">
										@php 
											$total = 0;  
											if($cartItem->discount_detail!=0.00 && ($cartItem->discount_price!=0.00) && $cartItem->discount_price!= $price_sale && $cartItem->discount_price < $price_sale * $cartItem->qty){
												$total = $cartItem->discount_price;
											} else {
												$total = $cartItem->qty * $price_sale;
											}
										@endphp
											<p class="right"> &dollar;{{ number_format($total, 2) }} </p>
                                    </div>
									</div>
								</div>
							</div>
						</div>
						@if(isset($cartItem->variant->product->cart_blurb) && $cartItem->variant->product->cart_blurb!='')
						<p style="padding-right: 210px; text-align: center; color: red;">{{ $cartItem->variant->product->cart_blurb }}</p>
						@endif
					</div>  
        @endforeach
@else
 <h3>YOUR SHOPPING CART DOES NOT HAVE ANY PRODUCTS.</h3>
@endif