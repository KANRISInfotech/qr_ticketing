<?php
include('dbconnection.php');
$conn=getConnection();

//Checking connection

if($conn->connect_error){
 die("Connection failed:" . $conn->connect_error);
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$mail = mysqli_real_escape_string($conn, $_POST['mail']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$ref_det = mysqli_real_escape_string($conn, $_POST['ref_det']);
$no_tick = mysqli_real_escape_string($conn, $_POST['no_tick']);
$refby = mysqli_real_escape_string($conn, $_POST['refby']);
$website="";
function rand_string( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str = "";
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		
		return $str;
	}
$random = rand_string( 5 );


$sql = "INSERT INTO `next`(`name`, `age`, `mail`, `number`, `ref_det`, `no_tick`, `refby`,`otp`) VALUES ('$name','$age','$mail','$number','$ref_det','$no_tick','$ref_by','$random')";
if($conn->query($sql) === TRUE){
        $user = $name;
$to = $email;
$id= "45" ;
$link="https://www.goclic.world";

$from = 'neXt <verify@goclick.world>';
$subject = 'Dear '.$user.',  Your ticket for neXt ';
 
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n";

$message='

<head>
  <meta charset="utf-8"> <!-- utf-8 works for most cases -->
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
  <title>neXt | Your Tickets </title> <!--tag shows on email notifications on Android 4.4. -->
  <style type="text/css">

  	/* ensure that clients dont add any padding or spaces around the email design and allow us to style emails for the entire width of the preview pane */
		body,
		#bodyTable {
			height:100% !important;
			width:100% !important;
			margin:0;
			padding:0;
		}
		
		/* Ensures Webkit- and Windows-based clients dont automatically resize the email text. */
		body,
		table,
		td,
		p,
		a,
		li,
		blockquote {
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
a{
color:#27a5f5;
}
		/* Forces Yahoo! to display emails at full width */
		.thread-item.expanded .thread-body .body,
		.msg-body {
			width: 100% !important;
			display: block !important;
		}

    /* Forces Hotmail to display emails at full width */
    .ReadMsgBody,
    .ExternalClass {
			width: 100%;
			background-color: #f4f4f4;
    }

    /* Forces Hotmail to display normal line spacing. */
		.ExternalClass,
		.ExternalClass p,
		.ExternalClass span,
		.ExternalClass font,
		.ExternalClass td,
		.ExternalClass div {
			line-height:100%;
    }

    /* Resolves webkit padding issue. */
    table {
			border-spacing:0;
    }

    /* Resolves the Outlook 2007, 2010, and Gmail td padding issue, and removes spacing around tables that Outlook adds. */
    table,
    td {
			border-collapse:collapse;
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
    }
    
    /* Corrects the way Internet Explorer renders resized images in emails. */
    img {
    	-ms-interpolation-mode: bicubic;
    }
    
    /* Ensures images dont have borders or text-decorations applied to them by default. */
    img,
    a img {
    	border:0;
    	outline:none;
    	text-decoration:none;	    
    }

    /* Styles Yahoos auto-sensing link color and border */
    .yshortcuts a {
			border-bottom: none !important;
    }
    
    /* Styles the tel URL scheme */
    a[href^=tel],
		.mobile_link,
		.mobile_link a {
	    color:#222222 !important;
			text-decoration: underline !Important;
    }
  
  
		/* Apple Mail doesnt support max-width, so we use media queries to constrain the email container width. */
		@media only screen and (min-width: 601px) {
			.email-container {
				width: 600px !important;
			}
		}
		.email-container{
		background: #aec948;
		}
          
  </style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#ffffff" style="margin:0; padding:0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;">
<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" bgcolor="#eeeeee" id="bodyTable" style="border-collapse: collapse;table-layout: fixed;margin:0 auto;"><tr><td>

	<!-- Hidden Preheader Text : BEGIN -->
	<div style="display:none; visibility:hidden; opacity:0; color:transparent; height:0; width:0;line-height:0; overflow:hidden;mso-hide: all;">
Verify Registered Email for GoClick Subscription                                                                                                                                       .
	</div>
	<!-- Hidden Preheader Text : END -->

  <!-- Outlook and Lotus Notes dont support max-width but are always on desktop, so we can enforce a wide, fixed width view. -->
  <!-- Beginning of Outlook-specific wrapper : BEGIN -->
	<!--[if (gte mso 9)|(IE)]>
  <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td>
  <![endif]-->
  <!-- Beginning of Outlook-specific wrapper : END -->

  <!-- Email wrapper : BEGIN -->
  <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px;margin: auto;" class="email-container">
    <tr>
    	<td>

        <!-- Logo Left, Nav Right : BEGIN -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td height="40" style="font-size: 0; line-height: 0;">&nbsp;</td>
          </tr>
          <tr>
            <td valign="middle" style="padding:0px;text-align: left;">
              <img src="https://www.kanris.biz/images/emailresources/verifymailheader.jpg" alt="Welcome to the world of business" width="100%" border="0" style="display: block;">
            </td>
            <td valign="middle" style="padding:0px;text-align: right;">
              
            </td>
          </tr>
        </table>
        <!-- Logo Left, Nav Right : END -->
  
        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
      
          <!-- Logo Centered + Vertical Padding : BEGIN -->

          <!-- Single Fluid Image, No Crop : END -->

          <!-- Full Width, Fluid Column : BEGIN -->
          <tr>
            <td style="padding: 40px; font-family: sans-serif; font-size: 20px; line-height: 27px; color: #666666;">Dear '.$user.',<br>
<span style="padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 27px; color: #666666;">Here are your tickets for neXt 2017</span>
            </td>
          <tr>
            <td>
          		<!-- 2 x 2 grid : BEGIN -->
              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                <tr>
                  <td valign="top" width="50%" style="padding: 40px 20px; font-family: sans-serif; font-size: 18px; line-height: 24px; color: #666666; text-align: center;">
                  <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data='.$id.'">

                    <table cellspacing="0" cellpadding="0" border="0" align="center" width="60%" class="button">
                      <tr>
                        <td style="-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:#dddddd ; background-position: top left; background-repeat: repeat-x; background-color: #ffffff; text-align: center;">
                        <span style="font-size:12px;"> Clicking on button below</span><br>
                          <a href="'. $link .'" style="color: #111111; font-family: sans-serif; font-size: 18px; line-height: 15px; text-align: center; text-decoration: none; display: block; padding: 15px 20px; border: 1px solid #aec948; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;">
														Verify email
                          </a>
                          <p>OR<br><span style="font-size:12px;line-height:13px;"> Copy and Paste the below link in your browser</span><br>
                          <a href="'. $link .'" style="color:#aec948;text-decoration:none;font-size:12px;">'.$link.'</a></p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
          		<!-- 2 x 2 grid : END -->
						</td>
		      </tr>
          <!-- Full Width, Fluid Column : END -->
				
        </table>
      </td>
		</tr>
    
    <!-- Footer : BEGIN -->
    <tr>
      <td style="text-align: center;padding: 40px 0;font-family: sans-serif; font-size: 12px; line-height: 18px;color: #888888;background-color:#fff;border-top:2px solid #ddd;">
<br>
<center>
<img src="https://www.kanris.biz/images/emailresources/kanris_logo_1080.png" alt="KANRIS Infotech Pvt Ltd" width="100px" border="0" style="display: block;"></img></center>
        .<unsubscribe style="color: #444444; padding: 0;text-decoration: underline">.</unsubscribe>.<br>
        KANRIS Infotech Pvt Ltd<br>3, Bharat Nagar, Nr Dombivli Gymkhana<br>Mumbai - 421 201 <br><span class="mobile_link">9821 344 250 | <a href="mailto:info@kanris.biz" style="color:#888888;text-decoration:none;">info@kanris.biz</a></span><br><br>
        <br>
        <span style="font-size:11px">&bull;<i>This is a System generated email. Please do not respond to it </i>&bull;</span>
      </td>
    </tr>
    <!-- Footer : END -->
        
  </table>
  <!-- Email wrapper : END -->

  <!-- End of Outlook-specific wrapper : BEGIN -->
	<!--[if (gte mso 9)|(IE)]>
      </td>
    </tr>
  </table>
  <![endif]-->
  <!-- End of Outlook-specific wrapper : END -->

</td></tr></table>
</body>';
 
// Sending email
if (mail($to, $subject, $message, $headers)){
    echo 'sent';
} else{
    echo 'failed';
}
}
else
{
 echo "Error" . $sql . "<br/>" . $conn->error;
}

   
$conn->close();
?>