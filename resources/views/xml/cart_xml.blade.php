<Cart>
	<PersonId>115414</PersonId>
	<Contacts>
	</Contacts>
	<CartDetails>
        @foreach ($caritems as $item)
            <CartDetail>		
				<SkuId>{{$item->variant_id}}</SkuId>
				<Quantity>{{$item->qty}}</Quantity>
			</CartDetail>
        @endforeach
		
    </CartDetails>
</Cart>