<?php 

/*email validation*/
require_once(__DIR__.'../../../inc/emailValidation.php');

/*modal*/
require_once(__DIR__.'../../../inc/modal.php');

/*Add new friend*/
if (isset($_POST['addFriend'])) {

	$addFriends = array();	

	if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
		
		$addFriends[] = 'Email address is empty';
		ModalC("addfriend");

	} 
	/*Check it is and email address*/
	if (empty($addFriends)) {

			if (!is_email($_POST['email'])) {
		    $addFriends[] = 'NOT Email address';
		    ModalC("addfriend");

		}
	}
	/*check this email is section user*/
	if (empty($addFriends)) {
		if ($user['email']==$_POST['email']) {
			
			$addFriends[] = 'This is your email address, Please check and try again';
			ModalC("addfriend");

		}
	}

	/*Check User in register in our TUTU data base*/
	if (empty($addFriends)) {

		$query = "SELECT * FROM users WHERE email = '{$_POST['email']}' LIMIT 1";
        $Chekresult = mysqli_query($connection, $query);
        $Sendrqu = mysqli_fetch_assoc($Chekresult);

        if (mysqli_num_rows($Chekresult)==0) {
        	$addFriends[] = $_POST['email'].' is Not TUTU User';
			ModalC("addfriend");
        }
	}


	/*Chek alreeady Friend*/
	if (empty($addFriends)) {

		$query = "SELECT * FROM friends WHERE user1 = '{$user['user_id']}' AND user2 = '{$Sendrqu['user_id']}' AND is_accept = 1 LIMIT 1";
        $Check_Already_Friend = mysqli_query($connection, $query);

        /*$Already_friend = mysqli_fetch_assoc($Check_Already_Friend);*/

        if (mysqli_num_rows($Check_Already_Friend)==1) {

        	$addFriends[] = 'Already Friend';
			ModalC("addfriend");

        } 
        
	}

	/*another user frined*/
	if (empty($addFriends)) {

        $query = "SELECT * FROM friends WHERE user1 = '{$Sendrqu['user_id']}' AND user2 = '{$user['user_id']}' AND is_accept = 1 LIMIT 1";
        $Check_Already_Friend1 = mysqli_query($connection, $query);

        if (mysqli_num_rows($Check_Already_Friend1)==1) {
        	$addFriends[] = 'Already Friend';
			ModalC("addfriend");
        } 

    }


	/*Chek alreeady req*/
	if (empty($addFriends)) {

		$query = "SELECT * FROM friends WHERE user1 = '{$user['user_id']}' AND user2 = '{$Sendrqu['user_id']}' AND is_accept = 0 LIMIT 1";
        $Check_Already_requested = mysqli_query($connection, $query);

        /*$Already_friend = mysqli_fetch_assoc($Check_Already_Friend);*/

        if (mysqli_num_rows($Check_Already_requested)==1) {

        	$addFriends[] = 'You are Already Requested. '.$_POST['email'];
			ModalC("addfriend");

        } 
        
	}

	/*another user req*/
	if (empty($addFriends)) {

        $query = "SELECT * FROM friends WHERE user1 = '{$Sendrqu['user_id']}' AND user2 = '{$user['user_id']}' AND is_accept = 0 LIMIT 1";
        $Check_Already_requested1 = mysqli_query($connection, $query);

        if (mysqli_num_rows($Check_Already_requested1)==1) {
        	$addFriends[] = 'Already Requested For You. Please Check Your Request Box';
			ModalC("addfriend");
        } 

    }

    /*Finaly No Errors, Requested send*/
	if (empty($addFriends)) {

		$query = "INSERT INTO friends (user1, user2, is_accept)";
		$query .= " VALUES ";
		$query .= '("'.$user['user_id'].'", "'.$Sendrqu['user_id'].'", "0")';
		$result = mysqli_query($connection, $query);

		if ($result) {
			ModalC("showSucess");
		} else {

			echo $query;
			
		    ModalC("showError");

		}
		
	}
	
} 

/*Accept Friend Requested*/

if (isset($_POST['accept'])) {


	$query = "SELECT friends.*,users.* FROM friends INNER JOIN users ON friends.user1 = users.user_id WHERE user1 = '{$_POST['request']}' AND user2 = '{$user['user_id']}' LIMIT 1";

    $has_requested = mysqli_query($connection, $query);

    $is_requested = mysqli_fetch_array($has_requested);


    if (mysqli_num_rows($has_requested)==1) {
    	
		$query = "UPDATE friends SET is_accept = 1 WHERE user1 = '{$_POST['request']}' AND user2 = '{$user['user_id']}' LIMIT 1 ";
		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			ModalC("showSucess");
		} else {
			ModalC("showError");
		}

    } else {

    	ModalC("showError");
    }

}

/*Delete Friend Requested*/

if (isset($_POST['delete'])) {


	$query = "SELECT friends.*,users.* FROM friends INNER JOIN users ON friends.user1 = users.user_id WHERE user1 = '{$_POST['request']}' AND user2 = '{$user['user_id']}' LIMIT 1";

    $has_requested = mysqli_query($connection, $query);

    if (mysqli_num_rows($has_requested)==1) {
    	
		$query = "DELETE FROM friends WHERE user1 = '{$_POST['request']}' AND user2 = '{$user['user_id']}' LIMIT 1";


		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			ModalC("showSucess");
		} else {
			ModalC("showError");
		}

    } else {

    	ModalC("showError");
    }

}

if (isset($_POST['Submitmsg'])) {

	$msgBoxError = '';
	
	if (!isset($_POST['message']) || strlen(trim($_POST['message'])) < 1 ) {
		
		$msgBoxError = 'This message is Empty';

	} 


	if (empty($msgBoxError)) {


		if ($user['is_asymmetric']==1) {


		//$msgBoxError = 'You are asymmetric user';


		$query = "SELECT public_key FROM users WHERE user_id = '{$_GET['FID']}' AND public_key IS NOT NULL LIMIT 1";
		$Get_Reciver_pub_key = mysqli_query($connection, $query);
		$Reciver_pub_key = mysqli_fetch_array($Get_Reciver_pub_key);

		//$privkey 	=	$symKey['privet_key'];


		//$msgBoxError = mysqli_num_rows($Get_Reciver_pub_key);

		if (mysqli_num_rows($Get_Reciver_pub_key)==1) {

			$pubkey 	=	$Reciver_pub_key['public_key'];
			openssl_public_encrypt($_POST['message'], $encrypted, $pubkey);

			$encrypted_hex_mg = bin2hex($encrypted);


			$query = "INSERT INTO messages (incoming_msg, outgoing_msg, mg)";
			$query .= " VALUES ";
			$query .= '("'.$_GET['FID'].'", "'.$user['user_id'].'", "'.$encrypted_hex_mg.'")';
			$result = mysqli_query($connection, $query);

			if (!$result) {
				$msgBoxError = 'Message Send failed';
				ModalC("showError");
			}


		} else {

			$msgBoxError = 'Your Friend is NOT A Asymmetric User';

		}


		} else {

			if (empty($msgBoxError)) {
				$query = "SELECT * FROM messages WHERE (incoming_msg = '{$user['user_id']}' AND outgoing_msg = '{$_GET['FID']}') OR (incoming_msg = '{$_GET['FID']}' AND outgoing_msg = '{$user['user_id']}') LIMIT 1";
				$conversations = mysqli_query($connection, $query);
				$conversation  = mysqli_fetch_array($conversations);

				if (mysqli_num_rows($conversations)==1) {

					if (empty($conversation['encryption_key'])) {
						$encKey = uniqid();
					} else {
						$encKey = $conversation['encryption_key'];
					}

				} else {
					$encKey = uniqid();
				}
			}

			if (empty($msgBoxError)) {
				  
				// Non-NULL Initialization Vector for encryption
				$encryption_iv = '1234567891011121';
				  
				// Use openssl_encrypt() function to encrypt the data
				$encryption = openssl_encrypt($_POST['message'], $ciphering, $encKey, $options, $encryption_iv);


				$query = "INSERT INTO messages (incoming_msg, outgoing_msg, mg, encryption_key)";
				$query .= " VALUES ";
				$query .= '("'.$_GET['FID'].'", "'.$user['user_id'].'", "'.$encryption.'", "'.$encKey.'")';
				$result = mysqli_query($connection, $query);

				if (!$result) {
					$msgBoxError = 'Message Send failed';
					ModalC("showError");
				}
				
			}

		}

	}

}




if (isset($_POST['saveSettings'])) {
	$SettingErrors = '';

	if (!isset($_POST['userName']) || strlen(trim($_POST['userName'])) < 1 ) {
		
		$SettingErrors = 'User Name Is Empty';
		ModalC("settings");

	} 


	if (isset($_POST['is_asymmetric'])) {

		if ($_POST['is_asymmetric']=='symmetric') {


		$query = "SELECT * FROM users WHERE user_id = '{$user['user_id']}' AND privet_key IS NULL AND public_key IS NULL LIMIT 1";
		$already_has_a_key = mysqli_query($connection, $query);

		if (mysqli_num_rows($already_has_a_key)==1) {

			$is_asymmetric=0; //disable

				$privkey 	=	NULL;
				$pubkey 	=	NULL;

		} else {


			$query = "SELECT * FROM users WHERE user_id = '{$user['user_id']}' LIMIT 1";
			$already_has_a_key = mysqli_query($connection, $query);
			$symKey = mysqli_fetch_array($already_has_a_key);

			$privkey 	=	$symKey['privet_key'];
			$pubkey 	=	$symKey['public_key'];

			$is_asymmetric=0; //disable

		}
			


		} elseif ($_POST['is_asymmetric']=='asymmetric') {

		$query = "SELECT * FROM users WHERE user_id = '{$user['user_id']}' AND privet_key IS NULL AND public_key IS NULL LIMIT 1";
		$already_has_a_key = mysqli_query($connection, $query);


		if (mysqli_num_rows($already_has_a_key)==1) {


			$config = array (

			'config' => 'C:\xampp\htdocs\chat\openssl.cnf',
			'default_mid' => 'sha512',
			'privet_key_bits' => 512, //1024,2048,4096 RSA bits
			'privet_key_type' => OPENSSL_KEYTYPE_RSA,

			);


			$keypair = openssl_pkey_new($config);

			openssl_pkey_export($keypair, $privkey, null, $config);

			$publickey = openssl_pkey_get_details($keypair);

			$pubkey = $publickey['key'];

			$is_asymmetric=1; //enable


		} else {


		$query = "SELECT * FROM users WHERE user_id = '{$user['user_id']}' LIMIT 1";
		$already_has_a_key = mysqli_query($connection, $query);
		$asyM = mysqli_fetch_array($already_has_a_key);

		$privkey 	=	$asyM['privet_key'];
		$pubkey 	=	$asyM['public_key'];

		$is_asymmetric=1; //enable


		}


		} else {

			$SettingErrors = 'Please Select encryption method';
			ModalC("settings");
		}

	} else {

		$SettingErrors = 'Please Select encryption method';
		ModalC("settings");
	}


	if (empty($SettingErrors)) {

	    $max_len_fields = array('userName' => 25);

	    foreach ($max_len_fields as $field => $max_len) {
	      if (strlen(trim($_POST[$field])) > $max_len) {
	        $SettingErrors = $field . ' must be less than ' . $max_len . ' characters';
	        ModalC("settings");
	      }
	    }
	}

	if (empty($SettingErrors)) {

		if (empty($privkey)) {

			$query = "UPDATE users SET user_name = '{$_POST['userName']}', is_asymmetric='{$is_asymmetric}' WHERE user_id = '{$user['user_id']}' LIMIT 1 ";
		} else {

			$query = "UPDATE users SET user_name = '{$_POST['userName']}', privet_key = '{$privkey}', public_key = '{$pubkey}', is_asymmetric='{$is_asymmetric}' WHERE user_id = '{$user['user_id']}' LIMIT 1 ";
		}
		
		$result_set = mysqli_query($connection, $query);

		  $query = "SELECT * FROM users WHERE uniqid = '{$_COOKIE['sessionID']}' LIMIT 1";
		  $result_set = mysqli_query($connection, $query);
		  $user = mysqli_fetch_assoc($result_set);

		if ($result_set) {
			ModalC("showSucess");
		} else {
			ModalC("showError");
		}
		
	}

}

?>