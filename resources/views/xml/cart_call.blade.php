<Cart>
	<PersonId>115414</PersonId>
	<Contacts>
	</Contacts>
	<CartDetails>\n\t
        @foreach ($cart->cartItems as $item)
            <CartDetail>		
				<SkuId>{{$item->variant_id}}</SkuId>
				<Quantity>{{$item->qty}}</Quantity>
			</CartDetail>\n\t
        @endforeach
    </CartDetails>
</Cart>