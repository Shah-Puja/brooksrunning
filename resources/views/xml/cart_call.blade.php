<Cart>
	<PersonId>115414</PersonId>
	<Contacts>
	</Contacts>
	<CartDetails>
        @foreach ($cart->cartItems as $item)
            <CartDetail>		
				<SkuId>{{$item->variant_id}}</SkuId>
				<Quantity>{{$item->qty}}</Quantity>
			</CartDetail>
        @endforeach
    </CartDetails>
</Cart>