<?php 
/*email validation*/
require_once(__DIR__.'../../../inc/emailValidation.php');

/*modal*/
require_once(__DIR__.'../../../inc/modal.php');


function sendMail($type) { 

	if ($type=="verify") {

	  	$_SESSION['verifyCode'] = mt_rand(10000,99999);
	  	$_SESSION['email'] = $_POST['email'];
	  	//Send Email 
		$to             = $_POST['email'];
        $mail_subject   = 'TUTU.COM | VERIFICATION CODE : ' .$_SESSION['verifyCode'];

        //$email_body   	= 'THIS IS VERIFICATION CODE FOR REGISTATION<br>'.$_SESSION['verifyCode'];

        $email_body		= '
	  <html xmlns="http://www.w3.org/1999/xhtml"><head>                                    
    <title>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <style type="text/css">body, html {
      margin: 0px;
      padding: 0px;
      -webkit-font-smoothing: antialiased;
      text-size-adjust: none;
      width: 100% !important;
    }
      table td, table {
      }
      #outlook a {
        padding: 0px;
      }
      .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
        line-height: 100%;
      }
      .ExternalClass {
        width: 100%;
      }
      @media only screen and (max-width: 480px) {
         table tr td table.edsocialfollowcontainer {width: auto !important;} table, table tr td, table td {
          width: 100% !important;
        }
        img {
          width: inherit;
        }
        .layer_2 {
          max-width: 100% !important;
        }
        .edsocialfollowcontainer table {
          max-width: 25% !important;
        }
        .edsocialfollowcontainer table td {
          padding: 10px !important;
        }
      }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
  </head><body style="padding:0; margin: 0;background: #efefef">                                        
    <table style="height: 100%; width: 100%; background-color: rgb(239, 239, 239);" align="center">        
      <tbody>            
        <tr>                
          <td id="dbody" data-version="2.31" valign="top" style="width: 100%; padding-top: 30px; padding-bottom: 30px; background-color: rgb(239, 239, 239);">
            <!--[if (gte mso 9)|(IE)]><table align="center" style="max-width:600px" width="600" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
            <!--[if (gte mso 9)|(IE)]><table style="width:600px" width="600" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->                    
            <table class="layer_1" align="center" border="0" cellpadding="0" cellspacing="0" style="max-width: 600px; box-sizing: border-box; width: 100%; margin: 0px auto;">                        
              <tbody>                            
                <tr>                                
                  <td class="drow" align="center" valign="top" style="box-sizing: border-box; font-size: 0px; text-align: center; background-color: rgb(255, 255, 255);">                                    
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
                    <div class="layer_2" style="max-width: 224px; display: inline-block; vertical-align: top; width: 100%;">    
                      <table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%">        
                        <tbody>
                          <tr>            
                            <td valign="top" class="edimg" style="padding: 22px; box-sizing: border-box; text-align: center;">
                              <img src="https://alexlanka.com/demo/images/tutu/tutu-logo.png" alt="Image" width="148" style="border-width: 0px; border-style: none; max-width: 148px; width: 100%;">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                    <!--[if (gte mso 9)|(IE)]></td><td valign="top"><![endif]-->
                    <div class="layer_2" style="max-width: 376px; display: inline-block; vertical-align: top; width: 100%;">                                        
                      <table class="edcontent" style="border-collapse: collapse;width:100%" border="0" cellpadding="0" cellspacing="0">                                            
                        <tbody>                                                
                          <tr>                                                    
                            <td class="edimg" valign="top" style="padding: 0px; box-sizing: border-box; text-align: center;">                                                        
                              <img style="border-width: 0px; border-style: none; max-width: 376px; width: 100%;" alt="Image" src="https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/3x_stripe_up.png" width="376">                                   
                            </td>                               
                          </tr>                           
                        </tbody>                       
                      </table>                   
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->               
                  </td>           
                </tr>                                                        
                <tr>                                
                  <td class="drow" align="center" valign="top" style="box-sizing: border-box; font-size: 0px; text-align: center; background-color: rgb(255, 255, 255);">                                    
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
                    <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">                                        
                      <table class="edcontent" style="border-collapse: collapse;width:100%" border="0" cellpadding="0" cellspacing="0">                                            
                        <tbody>                                                
                          <tr>                                                    
                            <td class="edtext" valign="top" style="padding: 20px; text-align: left; color: rgb(95, 95, 95); font-size: 12px; font-family: &quot;Trebuchet MS&quot;, Helvetica, sans-serif; direction: ltr; box-sizing: border-box;">
                              <p style="margin: 0px; padding: 0px;">                                                            
                                <span style="font-size: 20px;">VERIFICATION CODE : '.$_SESSION['verifyCode'].'</span>
                                <br>
                              </p>
                              <p style="margin: 0px; padding: 0px;">
                                <br>
                              </p>                                                                                                                
                              <p style="margin: 0px; padding: 0px;">Please do not let anyone else get your verification code. If so he will be able to use your TUTU account. You must take care not to give this code to anyone else. Please note that TUTU ION is not responsible if this hack goes to someone else and gets your account.                                   
                              </p>
                            </td>                               
                          </tr>                           
                        </tbody>                       
                      </table>                   
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->               
                  </td>           
                </tr>
                                        
                <tr>
                  <td class="drow" align="center" valign="top" style="box-sizing: border-box; font-size: 0px; text-align: center; background-color: rgb(255, 255, 255);">
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
                    <div class="layer_2" style="max-width: 422px; display: inline-block; vertical-align: top; width: 100%;">    
                      <table class="edcontent" style="border-collapse: collapse;width:100%" border="0" cellpadding="0" cellspacing="0">        
                        <tbody>
                          <tr>            
                            <td class="edimg" valign="top" style="padding: 0px; box-sizing: border-box; text-align: center;">
                              <img alt="Obraz" src="https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/3x_stripe_down.png" style="border-width: 0px; border-style: none; max-width: 423px; width: 100%;" width="423">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                    <!--[if (gte mso 9)|(IE)]></td><td valign="top"><![endif]-->
                    <div class="layer_2" style="max-width: 178px; display: inline-block; vertical-align: top; width: 100%;">    
                      <table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%">        
                        <tbody>
                          <tr>            
                            <td valign="top" class="emptycell" style="padding: 20px;">
                            </td>    
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>                            
                <tr>                                
                  <td class="drow" align="center" valign="top" style="box-sizing: border-box; font-size: 0px; text-align: center; background-color: rgb(255, 255, 255);">                                    
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
                    <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">                                        
                      <table class="edcontent" style="border-collapse: collapse; width: 100%; background-color: #000000;" border="0" cellpadding="0" cellspacing="0">                                            
                        <tbody>                                                
                          <tr>                                                    
                            <td class="edtext" valign="top" style="padding: 10px; text-align: left; color: rgb(95, 95, 95); font-size: 12px; font-family: &quot;Trebuchet MS&quot;, Helvetica, sans-serif; direction: ltr; box-sizing: border-box;">
                              <p style="text-align: center; font-size: 11px; margin: 0px; padding: 0px;">                                                            
                                <span style="color: #ffffff;">Copyright © 2022 <a href="https://alexlanka.com/" target="_blank" style="color: #FFFFFF;">Alex Lanka</a></span>
                              </p>
                            </td>                               
                          </tr>                           
                        </tbody>                       
                      </table>                   
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->               
                  </td>           
                </tr>                                                        
              </tbody>   
            </table>               
            <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
  </body></html>';

        $header        	= "From: {$_POST['email']}\r\nContent-Type: text/html;";
        $send_mail_result = mail($to, $mail_subject, $email_body, $header);

        //echo $email_body;

        ModalC("verify");

	}

}

/*User Register*/
if (isset($_POST['Register'])) {
	$RegisterErrors = array();
	//Check Valid Phone number
	//$_POST['phone'];

	if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
		
		$RegisterErrors[] = 'Email address is empty';
		ModalC("signup");

	} 

	if (empty($RegisterErrors)) {

		if (!is_email($_POST['email'])) {
	    $RegisterErrors[] = 'Email address is invalid.';
	    ModalC("signup");

	}

	if (empty($RegisterErrors)) {

	    $query = "SELECT * FROM users WHERE email = '{$_POST['email']}' LIMIT 1";
	    $result_set = mysqli_query($connection, $query);

	    if ($result_set) {
	        if (mysqli_num_rows($result_set) == 1) {
		        $RegisterErrors[] = 'Email Addres is already exists';
		        ModalC("signup");
	       }
	    }
	 } 

	if (empty($RegisterErrors)) {

		$_SESSION['startSession'] = "Register";
        sendMail("verify");

	  	}
	}
}
/*Verify Users*/
if (isset($_POST['verify'])) {

	$verifyError   = '';

	if (empty($_POST['verifyCode'])) {
		$verifyError = 'Please Enter Verification Code';
		ModalC("verify");
	} else {
		if ($_SESSION['verifyCode']==$_POST['verifyCode']) {
			//header('Location: chat.php');

			$UID = uniqid();

			$device = sha1($_SERVER['HTTP_USER_AGENT']."-".$UID);

			/*register*/

			if ($_SESSION['startSession']=="Register") {
				//Insert In to table
			    $query = "INSERT INTO users (email, uniqid, device, last_login)";
			    $query .= " VALUES ";
			    $query .= '("'.$_SESSION['email'].'", "'.$UID.'", "'.$device.'", "'.$nowTime.'")';
			    $result = mysqli_query($connection, $query);

			    if ($result) { 
			    	ModalC("showSucess");
			    	//Set Cookies for save user browser
			    	setcookie('sessionID', $UID, time()+60*60*24*60);
			    	//Clear Sessions
			    	$_SESSION['verifyCode'] = '';
			    	$_SESSION['email']      = '';
			    	$_SESSION['startSession'] = '';

			    } else {
			    	ModalC("showError");
			    }
			}
			/*Login*/
			if ($_SESSION['startSession']=="Login") {

				/*Update*/

				$query = "UPDATE users SET uniqid = '{$UID}', device = '{$device}', last_login = '{$nowTime}' WHERE email = '{$_SESSION['email']}' LIMIT 1 ";
				$result_set = mysqli_query($connection, $query);

				if ($result_set) {

			    	ModalC("showSucess");
			    	//Set Cookies for save user browser
			    	setcookie('sessionID', $UID, time()+60*60*24*60);
			    	//Clear Sessions
			    	$_SESSION['verifyCode'] = '';
			    	$_SESSION['email']      = '';
			    	$_SESSION['startSession'] = '';
			    } else {
			    	ModalC("showError");

			    	echo $query;
			    }

			}


		} else {
			$verifyError = 'Invalid Code, Please Try Again';
			ModalC("verify");
		}

	}

}
/*Login*/

if (isset($_POST['login'])) {

	$loginErrors = array();	

	if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
		
		$loginErrors[] = 'Email address is empty';
		ModalC("login");

	} 

	if (empty($loginErrors)) {

			if (!is_email($_POST['email'])) {
		    $loginErrors[] = 'NOT Email address';
		    ModalC("login");

		}
	}

	if (empty($loginErrors)) {

		$query = "SELECT * FROM users WHERE email = '{$_POST['email']}' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 1) { 

        	$_SESSION['startSession'] = "Login";
			sendMail("verify");

        } else {

        	$loginErrors[] = 'Email address is invalid. Please Try Again';
		    ModalC("login");
        }
		
	}

}

?>