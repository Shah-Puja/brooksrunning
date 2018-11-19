<div class="product-wrapper">
    @if ( $cart->items_count > 0 )
    @foreach($cart->cartItems as $cartItem)
    @php //echo "<pre>";print_r($cartItem->variant->product->image); @endphp
    <div class="product clearfix">
        <div class="product-img">
            <img src="{{ $cartItem->variant->product->image->image1Small() }}" />
        </div>
        <div class="product-info">
            <p class="blue">{{ $cartItem->variant->product->stylename }}</p>
            <p>Colour: {{ $cartItem->variant->product->color_name }}</p>
            <p>Size: {{ $cartItem->variant->size }}</p>
            @if($cartItem->variant->width_name!="")
            <p>{{ ($cartItem->variant->product->gender == 'M') ? "Mens" : "Womens" }} Width: {{ $cartItem->variant->width_name }}</p>
            @endif
            <p>Qty: {{ $cartItem->qty }}</p>
            <p>Price: @if (($cartItem->variant->price_sale > 0) && ($cartItem->variant->price_sale < $cartItem->variant->price))
		<del>&dollar;{{ number_format($cartItem->variant->price, 2) }}</del>
		@endif
		&dollar;{{ number_format($cartItem->variant->price_sale, 2) }} </p>
             <button type="submit" data-sku="{{ $cartItem->variant->id }}"  data-cart-page="{{ Request::is('cart') ? "Yes" : "No" }}" data-action="remove" class="btn blue bold-font action">Remove</button>							
        </div>
    </div>
    @endforeach
    @endif
</div>

<div class="total clearfix">
    <div class="left">
        <p>Order Subtotal</p>
    </div>
    <div class="right">
        <p class="blue">&dollar;{{ isset($cart) ? number_format($cart->total, 2) : number_format(0, 2) }}</p>
    </div>
</div>
<a href="/cart" class="primary-button action">Checkout</a>
<button class="primary-btn secondary-button2 action close-cart--popup">continue shopping</button> 