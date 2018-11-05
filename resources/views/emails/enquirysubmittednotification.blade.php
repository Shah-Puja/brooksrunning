<!DOCTYPE html>
<html>
<head>
  <title>Enquiry Notification</title>
  <style>
      body{
          background-color: #e8e8e8;
          font-family: 'Verdana','Helvetica','Arial',sans-serif;
          font-size: 15px;
          line-height: 1.5;
          margin: 0;
      }
      html {
        font-family: 'Verdana','Helvetica','Arial',sans-serif;
        line-height: 1.5;
        font-size: 15px;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }
  </style>
</head> 
<body>
 <!-- New Template -->
 
<table border="0" cellpadding="0" bgcolor="#ffffff"  cellspacing="0" width="800" style="border: 1px solid #e8e8e8; border-radius: 3px; padding: 50px; margin: 10px auto; padding:0; font-family:'Verdana','Helvetica','Arial',sans-serif;">
  <tr>
    <td align="center">
      <table width="700" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" width="250" style="vertical-align: bottom;">
            <img src="{{ config('app.url') }}/images/brooks-running-logo.png" alt="Brooks Logo" style="max-width: 220px;height: auto; margin: 10px 0 11px;">
          </td>
        </tr>
      </table>
      <table width="700" bgcolor="#1678bd" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" style="padding: 8px 10px; text-transform: uppercase;color: #fff;">
            <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-size: 20px; margin: 0;">Enquiry Notification</p>
          </td>
        </tr>
      </table>
      <table width="700" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" style="padding: 25px 13px;" > 
            <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-size: 15px; line-height: 1.5;margin: 0;">Hi Admin,</p>
            <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-size: 15px; line-height: 1.5;margin: 0;"><br />{{ $enquiry->fname .' '.$enquiry->lname }} submitted and enquiry. Please find details below:</p>
          </td>
        </tr>
      </table>
      <table width="700" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td style="padding-bottom: 15px;">
              <table width="700" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left" width="300" style="vertical-align: top; padding: 15px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-weight: 600;margin: 0;">Customer Name:</p>
                    </td>
                    <td align="left" width="400" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif;margin: 0;">{{ $enquiry->fname .' '.$enquiry->lname }} </p>
                    </td>
                </tr>
              </table>
              <table width="700" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left" width="300" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-weight: 600;margin: 0;">Customer Contact:</p>
                    </td>
                    <td align="left" width="400" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif;margin: 0;">{{ $enquiry->phone }}</p>
                    </td>
                </tr>
              </table>
              <table width="700" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left" width="300" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-weight: 600;margin: 0;">Customer email:</p>
                    </td>
                    <td align="left" width="400" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif;margin: 0;">{{ $enquiry->email }}</p>
                    </td>
                </tr>
              </table>
              <table width="700" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left" width="300" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-weight: 600;margin: 0;">Subject:</p>
                    </td>
                    <td align="left" width="400" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif;margin: 0;">{{ $enquiry->subject }}</p>
                    </td>
                </tr>
              </table>
               <table width="700" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left" width="300" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-weight: 600;margin: 0;">Category:</p>
                    </td>
                    <td align="left" width="400" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif;margin: 0;">{{ $enquiry->category }}</p>
                    </td>
                </tr>
              </table>
              @if($enquiry->order_no!='')
              <table width="700" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left" width="300" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; font-weight: 600;margin: 0;">Order no:</p>
                    </td>
                    <td align="left" width="400" style="vertical-align: top; padding: 10px 15px 0;">
                        <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif;margin: 0;">{{ $enquiry->order_no }}</p>
                    </td>
                </tr>
              </table>
              @endif
          </td>
        </tr>
      </table>
      <table width="700" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; margin: 0 0 13px; color: #716e6e; font-size: 15px;">Brooks Running 30 Tullamarine Park Rd., Tullamarine, Vic 3043, Australia.</p>
            </td>
        </tr>
      </table>
      <table width="700" border="0" bgcolor="#000000" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
        <tr>
          <td align="left" width="350" style="color:#ffffff;">
            <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif; margin: 0; padding: 8px 15px; font-size: 20px;">
              <!-- <b><a href="mailto:contact@skatersnetwork.com.au" style="color:#ffffff;text-decoration:none;">contact@skatersnetwork.com.au</a></b></p> -->
          </td>
          <td align="right" width="350" style="color:#ffffff;">
              <p style="font-family: 'Verdana','Helvetica','Arial',sans-serif;margin: 0; font-size: 12px; padding: 7px 15px;">&copy;Brooksrunning.com.au</p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
        