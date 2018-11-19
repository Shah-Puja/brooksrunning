<!DOCTYPE html> 
<html>
    <head>
        <title>Order Notification to Admin</title> 
    </head>
    <body>
        <div style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
            <center>
                <table width="700" border="0" cellspacing="0" cellpadding="0" style="font-family:Helvetica, Arial, sans-serif; font-size:12px; line-height:16px;color:#6d665f;">
                    <tr>
                        <td>
                            <img src="http://www.brooksrunning.com.au/images/order_header.jpg" alt="Brooks Running Australia" width="700" border="0" />
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <p style="font-size:16px; font-weight:bold;line-height:18px;margin:15px 25px;">Hi {{ $order->address->b_fname }} {{ $order->address->b_lname }},<br />
                                Thank you for shopping at brooksrunning.com.au<br />
                                Please retain these details for enquiries regarding your order.</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <p style="font-weight:bold;font-size:24px;padding:5px 10px; margin:10px 0 15px 25px;">Customer Order Number: BRN-{{ $order->order_no }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table width="92%" border="0" cellspacing="5" cellpadding="0" style="font-family:Helvetica, Arial, sans-serif; font-size:14px;line-height:16px;color:#6d665f;margin-left:-12px;">
                                <tr>
                                    <th width="55%" align="left" style="background:#f4f3ee;padding:10px;">Product</th>
                                    <th width="15%" style="background:#f4f3ee;padding:10px;">Quantity</th>
                                    <th width="15%" style="background:#f4f3ee;padding:10px;">Unit Price</th>
                                    <th width="15%" style="background:#f4f3ee;padding:10px;">Total</th>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>  
                                @if (! $order->orderItems->isEmpty() ) 
                                $coup_discount = 0;
                                @foreach($order->orderItems as $item)
                                    $promo_code = $item->promo_code;
                                    $coup_discount += ($item->discount!=0) ? $item->discount : 0;
                                    $coup_discount = number_format($coup_discount, 2);
                                <tr>
                                    <td valign="top">
                                        <table width="95%" border="0" cellspacing="0" cellpadding="0" style="font-family:Helvetica, Arial, sans-serif;font-size:16px;line-height:22px;color:#6d665f;">
                                            <tr>
                                                <td width="45%">
                                                    <img src="{{ $item->variant->product->image->image1Medium() }}" alt=""> 
                                                </td>
                                                <td width="55%">
                                                    <span>{{ $item->variant->product->stylename }}</span><br />
                                                    <span>Code: </span>
                                                    <span> {{ $item->variant->product->style }} </span><br />
                                                    <span>Colour: </span>
                                                    <span>{{$item->variant->product->color_code}}  {{ $item->variant->product->color_name}}</span><br />
                                                    <span>Width:</span><span>{{ $item->variant->width_code }} {{ $item->variant->width_name }}</span><br />
                                                    <span>Size: </span><span>{{ $item->variant->size }}</span><br />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center" valign="top"><p style="background:#f4f3ee;padding:5px 8px;">{{ $item->qty }}</p></td>
                                    <td valign="top" align="left">
                                        <p style="background:#f4f3ee;padding:5px 8px;">
                                        @if($item->variant->price_sale < $item->variant->price)
                                                <del>$ {{ number_format($item->variant->price, 2) }}</del> 
                                                $ {{ number_format($item->variant->price_sale, 2) }}
                                                @else 
                                                $ {{ number_format($item->variant->price_sale, 2) }}
                                        @endif
                                        </p>
                                    </td>
                                    <td valign="top" align="left"><p style="background:#f4f3ee;padding:5px 8px;">@if($item->variant->price_sale == 0)
                                            $ {{ number_format($item->variant->price * $item->qty, 2) }}
                                            @else
                                            $ {{ number_format($item->variant->price_sale * $item->qty, 2) }}
                                            @endif </p>
                                    </td>
                                </tr> 
                                @endforeach
                                @endif 
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                <tr>
                                    <td valign="top" width="60%" align="left">
                                        <p style="font-size:16px;font-weight:bold;line-height:18px;margin:0 25px;color:#6d665f;">
                                            Promo String : {{$promo_code}}<br><br>
                                            If you have an enquiry regarding your order and <br />would like to contact Brooks, please email us at <br />
                                            <a href="mailto:shop@brooksrunning.com.au" style="color:#eb7f14;">shop@brooksrunning.com.au</a>
                                        </p>
                                    </td>
                                    
                                    <td width="40%">
                                        <table width="85%" border="0" cellspacing="0" cellpadding="8" style="font-family:Helvetica, Arial, sans-serif;font-size:16px;line-height:16px;color:#6d665f;background:#f4f3ee;padding:10px;">
                                            <tr> 
                                                <td width="60%" align="left">Subtotal:</td>
                                                <td width="40%" align="left">$ {{  @number_format($order->total, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td align="left">Delivery:</td>
                                                <td align="left">$ {{  @number_format($order->freight_cost, 2) }}</td>
                                            </tr> 

                                            @if (!empty($promo_code) && $promo_code != '')
                                            <tr>
	                                            <td align="left">Coupon Discounts:</td>
	                                            <td align="left">$ {{  $coup_discount }}</td>
	                                        </tr>
                                            @endif

                                            @if(isset($order->gift_amount) && $order->gift_amount!="")
                                            <tr>
	                                            <td align="left">Gift Discounts:</td>
	                                            <td align="left">$ {{  @number_format($order->gift_amount, 2) }}</td>
	                                        </tr>
                                            @endif

                                            <tr>
                                                <td style="font-weight:bold;" align="left">Order Total:</td>
                                                <td style="font-weight:bold;" align="left">$ {{  @number_format($order->grand_total, 2) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="http://www.brooksrunning.com.au/images/order_footer.jpg" alt="Brooks Running Australia" width="700" border="0" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="text-align:center;font-size:13px;padding:15px 0;">Please Note: The payment for this order will appear from Fit Chain Pty. Ltd. on your credit card statement.<br />
                                Brooks Australia, 30 Tullamarine Park Rd. Tullamarine, Vic. 3043 Australia. Ph.1300 735 099</p>
                        </td>
                    </tr>
                </table>
            </center>
        </div> 
    </body>
</html>