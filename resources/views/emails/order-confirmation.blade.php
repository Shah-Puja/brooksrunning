<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brooks Emailers</title>
    <style>
  
        /* A simple css reset */
        @media screen {
                @font-face {
            font-family: 'ProximaNova-Regular';
            src: url('../webfonts/ProximaNova-Regular.eot');
            src: url('../webfonts/ProximaNova-Regular.eot?#iefix') format('embedded-opentype'),
                url('../webfonts/ProximaNova-Regular.woff2') format('woff2'),
                url('../webfonts/ProximaNova-Regular.woff') format('woff'),
                url('../webfonts/ProximaNova-Regular.ttf') format('truetype'),
                url('../webfonts/ProximaNova-Regular.svg#ProximaNova-Regular') format('svg');
            font-weight: normal;
            font-style: normal;
                }
                @font-face {
                    font-family: 'ProximaNova-Bold';
                    src: url('../webfonts/ProximaNova-Bold.eot');
                    src: url('../webfonts/ProximaNova-Bold.eot?#iefix') format('embedded-opentype'),
                        url('../webfonts/ProximaNova-Bold.woff2') format('woff2'),
                        url('../webfonts/ProximaNova-Bold.woff') format('woff'),
                        url('../webfonts/ProximaNova-Bold.ttf') format('truetype'),
                        url('../webfonts/ProximaNova-Bold.svg#ProximaNova-Bold') format('svg');
                    font-weight: bold;
                    font-style: normal;
                    }
            }
        body{ font-family: "ProximaNova-Regular", "Helvetica", "Arial", sans-serif; }
        body,table,thead,tbody,tr,td, img{
            padding: 0;
            margin: 0;
            border: none;
            border-spacing: 0px;
            border-collapse: collapse;
            vertical-align: top;
        }
       table[align="center"] {
            margin: 0 auto;
        }

        /* Add some padding for small screens */
        .wrapper {
            padding-left: 10px;
            padding-right: 10px;
        }

        h1,h2,h3,h4,h5,h6,p {
            margin: 0;
            padding: 0;
            padding-bottom: 20px;
            line-height: 1.6;
        }

        img {
            width: 100%;
            display: block;
        }
        .name-link{
            text-decoration: none;
            color: #000;
            font-family: "ProximaNova-Bold", "Helvetica", "Arial", sans-serif;
            text-align: center !important;
            font-size: 14px;
        }
        .mailto{
            text-decoration: none;
            font-family: "ProximaNova-Bold", "Helvetica", "Arial", sans-serif;
            color: #005cfb;
            font-size: 14px;
        }
        .title{
            font-size: 1em;
        }
        .br-header{
            text-align:justify; font-family: "ProximaNova-Bold", "Helvetica", "Arial", sans-serif; color: #005cfb; line-height: 0.4;
        }
        .br-item-total{
            font-family: "ProximaNova-Bold", "Helvetica", "Arial", sans-serif; color: #005cfb;
        }
        .padd_top{
            padding-top: 12px;
        }

        @media only screen and (max-width: 620px) {
            .centered-table{
                margin: 0 auto;
                display: table-cell;
                height: 100%;
                width:600px;
                text-align: center;
                line-height: 2;
            }
            .name-link{
                font-size: 16px;
            }

            .wrapper .section {
                width: 100%;
            }
            .fb-logo{
                width: 12px;
            }
                 
            .wrapper .full-width {
                width: 100%;
                display: block;
            }
            .thumbnail tr:last-child {  display: block;}
            .hidden-mob{display: none !important;}
        }
    </style>
</head>

<body>
    <table width="100%">
        <tbody>
            <tr>
                <td class="wrapper padd_top" width="600" align="center">
                    <!-- Header logo -->
                    <table class="section" cellpadding="0" cellspacing="0" width="600">
                        <tr>
                            <td class="column">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                                <img src="/images/emailers/Brooks-logo.jpg" alt="logo" style="width:200px;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style=" padding-top: 12px;">
                                                <p style="text-align:justify;">Hi, #Firstname,</p>
                                                <p style="text-align:justify;">Thank you for shopping with Brooks Running! We're pleased to confirm that your order has been successfully placed. You will receive a shipping confirmation once your order ships.
                                                </p>
                                                <p style="text-align:justify;">In the meantime, here is a summary of your order: </p>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td align="center">
                                                <hr style="background-color: #e1e1e1; height: 2px; border: 0;"/>
                                                <h2><span style="color:#005cfb;">Order Number</span> BRN-000000</h2> 
                                                <h3 style="line-height: 0.2px; font-weight: normal;">Order Date : DD/MM/YY</h3>
                                                <hr style="background-color: #e1e1e1; height: 2px; border: 0;"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- Two columns -->
                    <table class="section" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="column" width="270" valign="top">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <h2 class="title">Shipping Address</h2>
                                                <p style="text-align:justify;">Address Line1 <br/>
                                                    Address Line 2 <br/>
                                                    Address Line 3 <br/>
                                                    Address Line 4
                                                </p>
                                                <p style="text-align:justify;">
                                                <a href="#" class="mailto">customeremail@gmail.com</a>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="column" width="20" valign="top">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td> &nbsp; </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="column" width="310" valign="top">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <h2 class="title">Payment Method</h2>
                                                <p style="text-align:justify;">List Payment Type</p>
                                                <p style="text-align:justify; font-size: 14px;">All charges will appear as Fit Chain Pty.Ltd.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="column" colspan="3" valign="top">
                                <hr style="background-color: #e1e1e1; height: 2px; border: 0;"/>
                            </td>
                        </tr>
                    </table>
                      <table class="section header" cellpadding="0" cellspacing="0" width="600">
                        <tr>
                            <td class="column">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <h2>Item Details</h2>
                                            </td>
                                        </tr>
                                        <!-- Product Info Start -->
                                         <tr>
                                            <td align="left">
                                                <p style="text-align:justify;  font-weight: bold">Women's Adrenaline GTS 18</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <!-- Three columns -->
                                            <table class="section thumbnail" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="column" width="190" valign="top">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left">
                                                                        <img src="/images/emailers/apparel1-details.jpg" alt="picsum" width="300" />
                                                                        
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                      <td class="column" width="15" valign="top">
                                                         <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td> &nbsp; </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="column" width="190" valign="top">
                                                         <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left">
                                                                        <p style="text-align:justify;">
                                                                            Item #000000
                                                                            <br/>
                                                                            Colour: 000
                                                                            <br/>
                                                                            Size: 7.5
                                                                            <br/>
                                                                            Width: B
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="column full-width" width="15" valign="top">
                                                         <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td> &nbsp; </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="column full-width" width="190" valign="top">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left">
                                                                        <p style="text-align:justify;">
                                                                            Qty 00
                                                                            <br/>
                                                                            Unit price- $000.00
                                                                            <br/>
                                                                            Discount- $000.00
                                                                            <br/>
                                                                            <span class="br-item-total">Item Total-</span> $000.00
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>

                                                </tr>
                                            </table>
                                            <!-- Three columns end -->
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="column" colspan="3" valign="top">
                                                <hr style="background-color: #e1e1e1; height: 2px; border: 0;"/>
                                            </td>
                                        </tr>
                                        <!-- Product Info End -->
                                        <!-- Product Info Start -->
                                         <tr>
                                            <td align="left">
                                                <p style="text-align:justify; font-weight: bold">Women's Adrenaline GTS 18</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <!-- Three columns -->
                                            <table class="section thumbnail" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="column" width="190" valign="top">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left">
                                                                        <img src="/images/emailers/apparel1-details.jpg" alt="picsum" width="300" />
                                                                        
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                      <td class="column" width="15" valign="top">
                                                         <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td> &nbsp; </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="column" width="190" valign="top">
                                                         <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left">
                                                                        <p style="text-align:justify;">
                                                                            Item #000000
                                                                            <br/>
                                                                            Colour: 000
                                                                            <br/>
                                                                            Size: 7.5
                                                                            <br/>
                                                                            Width: B
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="column full-width" width="15" valign="top">
                                                         <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td> &nbsp; </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="column full-width" width="190" valign="top">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left">
                                                                        <p style="text-align:justify;">
                                                                            Qty 00
                                                                            <br/>
                                                                            Unit price- $000.00
                                                                            <br/>
                                                                            Discount- $000.00
                                                                            <br/>
                                                                            <span class="br-item-total">Item Total-</span> $000.00
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>

                                                </tr>
                                            </table>
                                            <!-- Three columns end -->
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="column" colspan="3" valign="top">
                                                <hr style="background-color: #e1e1e1; height: 2px; border: 0;"/>
                                            </td>
                                        </tr>
                                        <!-- Product Info End -->


                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                     <!-- Two columns -->
                    <table class="section " cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="column full-width" width="290" valign="top">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <h2>Your Order Summary</h2>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="column full-width" width="120" valign="top">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td> &nbsp; </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="column full-width" width="170" valign="top">
                                    <table>
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                    <table class="section" style="margin-top: 12px">
                                                        <tbody>
                                                            <tr>
                                                                <td><p style="text-align:justify; line-height: 0.4; font-weight: bold; ">Subtotal:</p></td>
                                                                <td><p style="text-align:justify; line-height: 0.4;">$000.00</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p style="text-align:justify; line-height: 0.4; font-weight: bold; ">Discount:</p></td>
                                                                <td><p style="text-align:justify; line-height: 0.4;">-$000.00</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p style="text-align:justify; line-height: 0.4; font-weight: bold; ">Shipping:</p></td>
                                                                <td><p style="text-align:justify; line-height: 0.4;">$00.00</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p style="text-align:justify; line-height: 0.4; font-weight: bold; ">GST:</p></td>
                                                                <td><p style="text-align:justify; line-height: 0.4;">$000.00</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p class="br-header">Order Total:</p></td>
                                                                <td><p style="text-align:justify; font-weight: bold; color: #005cfb; line-height: 0.4;">$0000.00</p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>
            <tr>
                <td class="wrapper" width="600" align="center">
                     <!-- Header image -->
                    <table class="section header" cellpadding="0" cellspacing="0" width="600">
                        <tr>
                            <td class="column">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                <p style="text-align:justify;">To find out more about our shipping policy <a href="#">click here</a>.</p>
                                                <p style="text-align:justify;">For more information on our returns and exchanges policy <a href="#">click here</a>.
                                                </p>
                                                <p style="text-align:justify;">Unfortunately we are unable to make changes to your shipping information once your order is dispatched.</p>
                                                <p style="text-align:justify;">If you have any questions regarding your order, please send them to <a href="#">shoptibrooksrunning.com.au</a> quoting your order number stated above.</p>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td align="left">
                                                <h3>Thank you again for your purchase,
                                                <br/>
                                                Team Brooks.
                                                </h3>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                  </td>
            </tr>
            <tr>
                <td class="wrapper"  align="center" >                 
                        <table class="section" width="600" cellpadding="0" cellspacing="0" style="background-color:#005cfb;">
                            <tr>
                                <td align="center" colspan="6">
                                    <h2><span style="color:#fff; line-height: 65px; letter-spacing: 3px; text-transform: uppercase;">Run Happy With Us</span> </h2> 
                                        
                                </td>
                            </tr>
                             <!-- Three columns -->
                            <tr>
                                <td class="column" width="80" valign="top">
                                     <table>
                                        <tbody>
                                            <tr>
                                                <td> &nbsp; </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="column" width="20" valign="top">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td align="left" >
                                                    <img src="/images/emailers/insta_logo.png" alt="insta"  />
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="column" width="40" valign="top">
                                     <table>
                                        <tbody>
                                            <tr>
                                                <td> &nbsp; </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="column" width="60" valign="top">
                                     <table>
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                <img src="/images/emailers/facebook_logo.png" alt="fb" class="fb-logo" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="column" width="20" valign="top">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                <img src="/images/emailers/twitter_logo.png" alt="twitter"  />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="column" width="80" valign="top">
                                     <table>
                                        <tbody>
                                            <tr>
                                                <td> &nbsp; </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- Three columns end -->
                            <tr>
                                <td align="center" colspan="6">
                                    <div style="padding:10px;"></div>
                                </td>
                            </tr>

                        </table>

                       <!-- Three columns -->
                    <table class="section centered-table" cellpadding="0" width="600" cellspacing="0">
                         <tr>
                            <td colspan="5">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td class="full-width" width="55" valign="top">
                                 <table>
                                    <tbody>
                                        <tr>
                                            <td> &nbsp; </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="full-width" width="150" valign="top" style="text-align:center">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                                <a href="#" class="name-link">Shipping Info</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                           
                            <td class="full-width" width="150" valign="top" style="text-align:center">
                                 <table>
                                    <tbody>
                                        <tr>
                                            <td align="center" >
                                                <a href="#" class="name-link">Returns &amp; Exchange</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="full-width hidden-mob" width="55" valign="top" style="text-align:center">
                                 <table>
                                    <tbody>
                                        <tr>
                                            <td> &nbsp; </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="full-width" width="190" valign="top" style="text-align:center">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                               <a href="#" class="name-link">Contact us</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="5">
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                    <!-- Three columns end -->  
                </td>
            </tr>

        </tbody>
    </table>
</body>
</html>