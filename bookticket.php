<?php
include('dbconnection.php');
$conn=getConnection();

//Checking connection

if($conn->connect_error){
 die("Connection failed:" . $conn->connect_error);
}
$id="";
$name = mysqli_real_escape_string($conn, $_GET['name']);
$age = mysqli_real_escape_string($conn, $_GET['age']);
$email = mysqli_real_escape_string($conn, $_GET['mail']);
$number = mysqli_real_escape_string($conn, $_GET['number']);
$ref_det = mysqli_real_escape_string($conn, $_GET['ref_det']);
$no_tick = mysqli_real_escape_string($conn, $_GET['no_tick']);
$refby = mysqli_real_escape_string($conn, $_GET['refby']);
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


$sql = "INSERT INTO `next`(`name`, `age`, `mail`, `number`, `ref_det`, `no_tick`, `refby`,`otp`) VALUES ('$name','$age','$email','$number','$ref_det','$no_tick','$refby','$random')";
if($conn->query($sql) === TRUE){
    $result=mysqli_query($conn,"SELECT * FROM `next` WHERE `name` = '$name' and `mail` = '$email' and `otp`='$random'");
    $num_rows = mysqli_num_rows($result);

    if($num_rows>0){	
        /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
    $id=$row['id'];
        }
    }
  // include phpmailer class
  require_once 'mailer/class.phpmailer.php';
  // creates object
  $mail = new PHPMailer(true);
  $full_name=$name;
  $tonumber = $number;
  $from="Test";
  $req="Test";
      $subject    = "Your NEXT Think Tank tickets have been confirmed";
      $text_message    = "Hello ".$full_name.", <br /><br /> ";			   
      $user=$full_name;
      $link="abv";
      // HTML email starts here
      
      $message  = '<head>
      <title>NEXT Think Tank 2017 Tickets</title> <!--tag shows on email notifications on Android 4.4. -->
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
    color:#f9a2bf;
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
            background: #f9a2bf;
            }
              
      </style>
    </head>
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#ffffff" style="margin:0; padding:0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;">
    <table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" bgcolor="#eeeeee" id="bodyTable" style="border-collapse: collapse;table-layout: fixed;margin:0 auto;"><tr><td>
    
        <!-- Hidden Preheader Text : BEGIN -->
        <div style="display:none; visibility:hidden; opacity:0; color:transparent; height:0; width:0;line-height:0; overflow:hidden;mso-hide: all;">
    Your neXt Tickets have been Confirmed
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
                  <img src="https://www.kanris.biz/images/emailresources/nextthinktank.jpg" alt="Ticket Confirmed" width="100%" border="0" style="display: block;">
                </td>
              </tr>
            </table>
            <!-- Logo Left, Nav Right : END -->
      
            <table margin-top:"-25px;" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
          
              <!-- Logo Centered + Vertical Padding : BEGIN -->
    
              <!-- Single Fluid Image, No Crop : END -->
    
              <!-- Full Width, Fluid Column : BEGIN -->
              <tr>
                <td style="padding: 40px; font-family: sans-serif; font-size: 20px; line-height: 0px; color: #666666;">Dear '.$user.',<br>
                </td>
              <tr>
                <td>
                      <!-- 2 x 2 grid : BEGIN -->
                  <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                      <td valign="top" width="50%" style="padding: 10px 20px; font-family: sans-serif; font-size: 16px; line-height: 24px; color: #666666; text-align: left;">
      <p style="color:#555;">Your Tickets for NEXT Think Tank 2017 have been confirmed.</p>
      <p><span style="color:#27a5f5;font-size:18px;">Name</span><br/>
      <span style="color:555">'. $full_name .'</span>
      </p>

      <p><span style="color:#27a5f5;font-size:18px;">No of Seats</span><br/>
      <span style="color:555">'. $no_tick .'</span>
      </p>

      <p><span style="color:#27a5f5;font-size:18px;">Age</span><br/>
      <span style="color:555">'. $age .'</span>
      </p>
      <p><span style="color:#27a5f5;font-size:18px;">Timing</span><br/>
      <span style="color:555">09 AM<br/>9<sup>th</sup> December 2017</span>
      </p>
      <p><span style="color:#27a5f5;font-size:18px;">Venue:</span><br/>
			<span style="color:555">Shubh Mangal Hall,<br/>Near Dombivili Station<br/>Dombivli (E) - 421201<br/></span>
			<a href="https://www.google.co.in/maps/place/Shubha+Mangal+Hall/@19.2202311,73.0708369,14z/data=!4m17!1m11!4m10!1m3!2m2!1d73.0969294!2d19.2187723!1m5!1m1!1s0x3be7958abda17893:0x2650c9acab5567ec!2m2!1d73.0886923!2d19.2187856!3m4!1s0x3be7958abda17893:0x2650c9acab5567ec!8m2!3d19.2187856!4d73.0886923" style="color: #222222; font-family: sans-serif; font-size: 16px; line-height: 14px; text-align: center; text-decoration: none; display: block; padding: 12px 15px; border: 1px solid #27a5f5; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;width:100px;">
			View Location
		</a>
      <center>
      <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$id.'">
      <p style="color:#444;font-size:10px;">(Show this at Registration Desk)</p>
      </center>
      <p><br/><span style="color:555">Regards,</span><br/><span style="color:#27a5f5;font-size:18px;">Team Rotaract Club of Dombivli Suncity</span><br/>
      </p>
      <img src="https://www.kanris.biz/images/emailresources/rtrsun.jpg" alt="Ticket Confirmed" width="60%" border="0" style="display: block;">
      <p>
      
</p>
      <p>
      
</p>

    
                        <table cellspacing="0" cellpadding="0" border="0" align="center" width="60%" class="button">
                          <tr>
                            <td style="-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:#dddddd ; background-position: top left; background-repeat: repeat-x; background-color: #ffffff; text-align: center;">
                            <span style="font-size:12px;"></span><br>
                              
                              
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
    <img src="https://www.kanris.biz/images/emailresources/kanris_infotech.png" alt="KANRIS Infotech Pvt Ltd" width="150px" border="0" style="display: block;"></img></center>
            .<unsubscribe style="color: #444444; padding: 0;text-decoration: underline">.</unsubscribe>.<br>
           <span style="color:#888;"><br>3, Bharat Nagar, Nr Dombivli Gymkhana<br>Mumbai - 421 201 <br><span class="mobile_link">9821 344 250 | <a href="mailto:info@kanris.biz" style="color:#888888;text-decoration:none;">info@kanris.biz</a></span><br><br>
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
      
      // HTML email ends here
      
      try
      {
          $mail->IsSMTP(); 
          $mail->isHTML(true);
          $mail->SMTPDebug  = 0;                     
          $mail->SMTPAuth   = true;                  
          $mail->SMTPSecure = "ssl";                 
          $mail->Host       = "hostname";      
          $mail->Port       = 465;             
          $mail->AddAddress($email);
          $mail->Username   ="next@kanris.biz";  
          $mail->Password   ="password";            
          $mail->SetFrom('next@kanris.biz','neXt Tickets');
          $mail->AddReplyTo("next@kanris.biz");
          $mail->Subject    = $subject;
          $mail->Body 	  = $message;
          $mail->AltBody    = $message;
              
          if($mail->Send())
          {
              /* ----------------------Send Text MEssage with Reference ID------------------------------- */
              error_reporting (E_ALL ^ E_NOTICE);
                          $username="";
                              $password ="";
                              $number=$tonumber;
                              $sender="KANRIS";
                              $message="Hello, ".$full_name."\r\n Your tickets for neXt 2017 have been confirmed \r\n Booking ID : ".$id."\r\n \r\n " . $no_tick . " seat for Next Think Tank 2017 on Sun, 9 Dec 2017. \r\n 09 AM Onwards at Shubh Mangal Hall, Dombivili \r\n Please carry your cell phones which was used for booking tickets and show this SMS at registration Desk \r\n \r\n Warm Regards, \r\n Rotaract Club of Dombivli Suncity.";
                              $url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
                              $ch = curl_init($url);
                              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                              echo $curl_scraped_page = curl_exec($ch);
                              curl_close($ch); 
                      $msg="1";
                      echo $msg;
              
          }
      }
      catch(phpmailerException $ex)
      {
          $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
          echo $msg;
      }
        
}
else
{
 echo "Error" . $sql . "<br/>" . $conn->error;
}

   
$conn->close();
?>