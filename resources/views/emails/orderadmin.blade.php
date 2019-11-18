<!DOCTYPE html>
<html>
    <head>
        <title>Order Notification to Admin</title> 
    </head>
    <body>
        <div style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">
            <center>
                <table width="620" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:16px;">
                    <tr>
                        <td align="left"> 
                        @if($order->order_type == 'medibank-user')
                            Customer Order Number: 7BRN-{{ $order->order_no }}
                        @else         
                            Customer Order Number: BRN-{{ $order->order_no }}
                        @endif
                        </td>
                        <td align="right">Date: {{ date("D j M Y G:i:s T") }}
                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:16px;">
                                <tr>
                                    <th style="text-align: left;" colspan="2"><h3 style ="background: none repeat scroll 0 0 #57A7D7; color: #FFFFFF; font-size: 16px; font-weight: normal; height: 30px; line-height: 30px; padding: 0 10px;">Billing Information</h3></th>
                                </tr>
                                <tr>
                                    <td align="left">Customer name</td>
                                    <td align="left">{{ $order->address->b_fname }} {{ $order->address->b_lname }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Company</td>
                                    <td align="left">Address:{{ $order->address->b_add1 }} {{ $order->address->b_add2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">City</td><td align="left">{{ $order->address->b_city }}</td>
                                </tr>
                                <tr>
                                    <td align="left">State/Province</td>
                                    <td align="left">{{ $order->address->b_state }}</td></tr>
                                <tr>
                                    <td align="left">Zip Code</td>
                                    <td align="left">{{ $order->address->b_postcode }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Country</td>
                                    <td align="left">{{ $order->address->b_country }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Phone Number</td>
                                    <td align="left">{{ $order->address->b_phone }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Email</td>
                                    <td align="left">{{ $order->address->email }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="2">

                            <table width="100%" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:16px;">
                                <tr>
                                    <th style="text-align: left;" colspan="2"><h3 style ="background: none repeat scroll 0 0 #57A7D7; color: #FFFFFF; font-size: 16px; font-weight: normal; height: 30px; line-height: 30px; padding: 0 10px;">Shipping Address</h3></th>
                                </tr>
                                <tr>
                                    <td align="left">Customer name</td>
                                    <td align="left">{{ $order->address->b_fname }} {{ $order->address->b_lname }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Company</td>
                                    <td align="left">Address: {{ $order->address->s_add1 }} {{ $order->address->s_add2 }}</td>
                                </tr>
                                <tr>
                                    <td align="left">City</td>
                                    <td align="left">{{ $order->address->s_city }}</td>
                                </tr>
                                <tr>
                                    <td align="left">State/Province</td>
                                    <td align="left">{{ $order->address->s_state }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Zip Code</td>
                                    <td align="left">{{ $order->address->s_postcode }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Country</td>
                                    <td align="left">{{ $order->address->s_country }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Phone Number</td>
                                    <td align="left">{{ $order->address->s_phone }}</td>
                                </tr>
                                <tr>
                                    <td align="left">Email</td>
                                    <td align="left">{{ $order->address->email }}</td>
                                </tr> 
                                <tr>
                                    <td align="left">Order Details</td>
                                    <td align="left">{{ (($order->address->order_info!="") ? $order->address->order_info : "-") }}</td>
                                </tr> 
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="800" cellspacing="0" cellpadding="3" border="0" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:16px;">
                                <tbody>
                                    <tr>
                                        <td style="border-bottom: 1px dashed rgb(0, 0, 0); margin: 10px 0px;" width="10%"><strong>Quantity</strong></td>
                                        <td style="border-bottom: 1px dashed rgb(0, 0, 0); margin: 10px 0px;" width="45%"><strong>Product</strong></td>
                                        <td style="border-bottom: 1px dashed rgb(0, 0, 0); margin: 10px 0px;" width="20%"><strong>Code</strong></td>
                                        <td style="border-bottom: 1px dashed rgb(0, 0, 0); margin: 10px 0px;" width="10%" align="left"><strong>Price $</strong></td>
                                        <td style="border-bottom: 1px dashed rgb(0, 0, 0); margin: 10px 0px;" width="15%" align="left"><strong>Total $</strong></td>
                                    </tr>

                                    @php $coup_discount = 0; @endphp
                                    @if (! $order->orderItems->isEmpty() ) 
                                    @foreach($order->orderItems as $item)
                                    @php $coup_discount += ($item->discount > 0) ? $item->discount : 0;
                                    $coup_discount = number_format($coup_discount, 2); 
                                    @endphp
                                    <tr>
                                        <td>{{ $item->qty }}</td>
                                        <td align='left'>
                                            {{ $item->variant->product->stylename }}
                                            <br /><span>Product Code : </span><span> {{ $item->variant->product->style }} </span>
                                            <br /><span>Colour : </span><span> {{$item->variant->product->color_code}}  {{ $item->variant->product->color_name}}  </span> 
                                            <br /><span>Width : </span><span>{{ $item->variant->width_code }} {{ $item->variant->width_name }}</span>
                                            <br /><span>Size : </span><span>{{ $item->variant->size }}</span>
                                            @if(isset($item->variant->product->cart_blurb) && $item->variant->product->cart_blurb!='')
                                            <br /><span style="color: red;">{{ $item->variant->product->cart_blurb }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->variant->style }}</td>
                                        <td align='left'> @if($item->variant->price_sale == 0)
                                            ${{ number_format($item->variant->price, 2) }}
                                            @endif
                                            @if (($item->variant->price_sale > 0) && ($item->variant->price_sale < $item->variant->price))
                                            <del>${{ number_format($item->variant->price, 2) }}</del> 
                                            ${{ number_format($item->variant->price_sale, 2) }} 
                                            @endif  </td>
                                        <td align='left'>
                                            @if($item->variant->price_sale == 0)
                                            ${{ number_format($item->variant->price * $item->qty, 2) }}
                                            @else
                                            ${{ number_format($item->variant->price_sale * $item->qty, 2) }}
                                            @endif </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                    <tr>
                                    @php 
                                        $subtotal = 0;
                                    @endphp
                                    
                                    @if(isset($coup_discount) && $coup_discount > 0)
                                    @php $subtotal =  @number_format(($order->total + $coup_discount), 2);  @endphp
                                    @else
                                    @php $subtotal =  @number_format($order->total, 2);  @endphp
                                    @endif

                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align='right'><b>Subtotal</b></td>
                                        <td align='left'><b> 
                                                ${{ $subtotal }}
                                            </b></td>
                                    </tr> 

                                    @if(isset($coup_discount) && $coup_discount > 0)
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align='right'><b>Discounts</b></td> 
                                        <td align='left' style="color:red;"><b>-${{  $coup_discount }}</b></td> 
                                    </tr>
                                    @endif

                                    @if(isset($order->gift_amount) && $order->gift_amount!="")
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align='right'><b>Gift Discounts</b></td> 
                                        <td align='left' style="color:red;"><b>-${{  @number_format($order->gift_amount, 2) }}</b></td>
                                    </tr>
                                    @endif

                                    <tr>
                                    @php 
                                        $delivery_type =  (strpos($order->delivery_type, '_') !== false) ? str_replace("_", " ", ucfirst($order->delivery_type)) : ucfirst($order->delivery_type);
                                    @endphp
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align='right' colspan='2'><b>Freight {{ ucwords($delivery_type) }}</b></td>
                                        <td align='left'><b>${{  @number_format($order->freight_cost, 2) }} </b></td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align='right' colspan='2'><b>GST</b></td>
                                        <td align='left'>
                                        <b>
                                        @if(isset($order->gift_amount) && $order->gift_amount!="")
                                            ${{ @number_format(((($order->total + $order->freight_cost) - $order->gift_amount) / 11), 2) }}
                                        @else
                                            ${{ @number_format((($order->total + $order->freight_cost) / 11), 2) }}
                                        @endif
                                        </b></td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align='right'><b>Total</b></td>
                                        <td align='left'><b>${{  @number_format($order->grand_total, 2) }}</b></td>
                                    </tr>

                            </table><br/>
                        </td>
                    </tr>

                    @if(isset($order->giftcert_ap21code) && $order->giftcert_ap21code!="")
                    <tr>
                        <td>Gift Voucher: {{ $order->giftcert_ap21code }}</td>
                        <td>&nbsp;</td> 
                    </tr>
                    @endif

                    @if(isset($order->coupon_code) && $order->coupon_code!="")
                    <tr>
                        <td>Promo String: {{ $order->coupon_code }}</td>
                        <td>&nbsp;</td> 
                    </tr>
                    @endif
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="left">
                            <h3 style ="background: none repeat scroll 0 0 #57A7D7; color: #FFFFFF; font-size: 16px; font-weight: normal; height: 30px; line-height: 30px; padding: 0 10px;">Order Processing Info:</h3>
                            <p>
                                TRANSACTIONID: {{ $order->transaction_id }}<br />
                                ORDERTIME:  {{ date("Y-m-d H:i:s", strtotime($order->created_at)) }}<br />
                                AMT: ${{  @number_format($order->grand_total, 2) }}<br />
                                PAYMENTSTATUS: {{ $order->transaction_status }}<br />
                            </p>
                        </td>
                        <td>&nbsp;</td>
                    </tr>

                </table>
            </center>
        </div>  
    </body>
</html>