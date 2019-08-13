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
		@if(isset($xml_promo_st) && $xml_promo_st!='')
			<CartDetail>		
				<SkuId>{{$xml_promo_st->skuid}}</SkuId>
				<Quantity>{{$xml_promo_st->qty}}</Quantity>
			</CartDetail>
		@endif
    </CartDetails>
</Cart>