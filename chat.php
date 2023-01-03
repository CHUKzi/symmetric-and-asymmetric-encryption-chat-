<?php
/*DB CONNECTION*/ 
require_once(__DIR__.'/inc/Connection.php');

if (isset($_COOKIE['sessionID'])) {

  $query = "SELECT * FROM users WHERE uniqid = '{$_COOKIE['sessionID']}' LIMIT 1";
  $result_set = mysqli_query($connection, $query);
  $user = mysqli_fetch_assoc($result_set);

  if (mysqli_num_rows($result_set) == 1) { 

      /*echo $user['user_id'];*/

      $activeKey = sha1($_SERVER['HTTP_USER_AGENT']."-".$user['uniqid']);

      if ($activeKey==$user['device']) {

        $_SESSION['activeSession'] = $activeKey;

      } else {
        header('Location: logout.php');
      }

  } else {
    header('Location: logout.php');
  }

} else {
  header('Location: index.php');
}

/*Encription*/

// Store the cipher method
$ciphering = "AES-128-CTR";
  
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

/*Forms Process*/
require_once(__DIR__.'/inc/Process/FormsChat.php');

if (empty($user['user_name'])) {

    $SettingErrors = 'Please Set New User Name';
    ModalC("settings");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages - <?php echo $user['user_name'];?></title>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap v5 -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/chat-box.css">
  <!-- Icon -->
  <link rel="icon" type="image/icon" class="LogoMain" href="assets/img/favicon.ico"/>

</head>
<body>

  <div class="container">
    <?php
    /*HEADER*/
    include(__DIR__.'/inc/InterFace/Header.php');

    if (!empty($user['user_name'])) { ?>

    <section>

    <div class="row featurette">

      <div class="col-md-3">

        <!-- left bar header -->

  <header class="p-3 bg-dark text-white">

      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <div class="col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
          

        <button class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#addfriend"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Friend</button>
           
        </div>

        <div class="col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
          <button class="badge rounded-pill bg-warning text-dark" data-bs-toggle="modal" data-bs-target="#Request"><i class="fa fa-users" aria-hidden="true"></i> Request</button>
          
        </div>

        <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-0">

          <a href="" data-bs-toggle="modal" data-bs-target="#settings">
            <img src="assets/img/setting.png" class="rounded-circle" alt="header-img" width="35">
          </a>

        </div>

      </div>

  </header>
<!-- Search bar -->
<input type="text" class="form-control" id="search" onkeyup="searchFriends()" aria-describedby="search" placeholder="Search for names..." title="Type in a name" autocomplete="off">
<!-- User List -->
<ul class="users" id="friends">


      <?php 
      /*Frineds*/
        $query = "SELECT * FROM friends WHERE (user1 = '{$user['user_id']}' OR user2 = '{$user['user_id']}') AND is_accept = 1";

        $Frined_list = mysqli_query($connection, $query);

        /*echo (mysqli_num_rows($Frined_list));*/

        if ($Frined_list) {
        while ($Frined_name = mysqli_fetch_array($Frined_list)) {

          if ($Frined_name['user1']==$user['user_id']) {

           $query = "SELECT * from users WHERE user_id = '{$Frined_name['user2']}' ";
           $FL = mysqli_query($connection, $query);

           $FN = mysqli_fetch_array($FL);?>

            <li><a class="list-group-item list-group-item-action" href="chat.php?FID=<?php echo $FN['user_id'];?>"><img src="assets/img/user-80x80.png" class="rounded-circle" alt="user-image" width="50"><?php echo $FN['user_name']; ?></a></li>


          <?php } else {


           $query = "SELECT * from users WHERE user_id = '{$Frined_name['user1']}' ";
           $FL = mysqli_query($connection, $query);

           $FN = mysqli_fetch_array($FL);?>

          
          <li><a class="list-group-item list-group-item-action" href="chat.php?FID=<?php echo $FN['user_id'];?>"><img src="assets/img/user-80x80.png" class="rounded-circle" alt="user-image" width="50"><?php echo $FN['user_name']; ?></a></li>



          <?php }

        } } if (mysqli_num_rows($Frined_list)==0) {
          echo '<li class="list-group-item list-group-item-action text-center">No Friends</li>';
        }

      ?>

</ul>

      </div>


<?php 




 ?>



      <div class="col-md-9">
        <div class="card">
          <!-- chat header -->
  <header class="p-3 bg-dark text-white">

      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

<?php if (!isset($_GET['FID'])) { ?>




        <div class="col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
          <img src="assets/img/80x80-logo.png" class="rounded-circle" alt="header-img" width="35"> TUTU.COM
        </div>
<?php } else  {



  $ch1 = "SELECT * FROM friends WHERE (user1 = '{$_GET['FID']}' AND user2 = '{$user['user_id']}') AND is_accept = 1";

  $check1 = mysqli_query($connection, $ch1);


  $ch2 = "SELECT * FROM friends WHERE (user1 = '{$user['user_id']}' AND user2 = '{$_GET['FID']}') AND is_accept = 1";

  $check2 = mysqli_query($connection, $ch2);


  if (mysqli_num_rows($check1)==1) {

    $query = "SELECT * from users WHERE user_id = '{$_GET['FID']}' ";
    $check2Users = mysqli_query($connection, $query);

    $UserCheck2 = mysqli_fetch_array($check2Users);

    $_SESSION['StartChat'] = $UserCheck2['user_id'];

    ?>

    <div class="col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
      <img src="assets/img/user-80x80.png" class="rounded-circle" alt="header-img" width="35"> <?php echo $UserCheck2['user_name']; ?>
    </div>


  <?php } elseif (mysqli_num_rows($check2)==1) {

    $query = "SELECT * from users WHERE user_id = '{$_GET['FID']}' ";
    $check2Users = mysqli_query($connection, $query);

    $UserCheck2 = mysqli_fetch_array($check2Users);

    $_SESSION['StartChat'] = $UserCheck2['user_id'];

    ?>
    
    <div class="col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
      <img src="assets/img/user-80x80.png" class="rounded-circle" alt="header-img" width="35"> <?php echo $UserCheck2['user_name']; ?>
    </div>


  <?php } else {?>

        <div class="col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
          <img src="assets/img/80x80-logo.png" class="rounded-circle" alt="header-img" width="35"> TUTU.COM
        </div>

<?php
    $_SESSION['StartChat']='';
    ModalC("showError");

  }

} ?>
        <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-0">
          <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </div>

      </div>

  </header>


          <div class="card-body">


<?php if (empty($_SESSION['StartChat'])) {?>

            <center>
              <i class="fa fa-envelope text-primary" aria-hidden="true" style="font-size:150px;"></i>
              <p class="h2">TUTU Web</p>
              <p><i class="fa fa-lock" aria-hidden="true"></i> This messages is designed to be inaccessible to third parties</p>
              <hr>
              <p>Dev By Alex Lanka</p>
            </center>


<?php } else { ?>

<!-- <div class="chat"></div> -->

        <div class="mesgs">
          <div class="msg_history" id="chat">
            <!-- incomming -->


<?php 
    $query = "SELECT * from messages WHERE (incoming_msg = '{$_SESSION['StartChat']}' AND outgoing_msg = '{$user['user_id']}') OR (incoming_msg = '{$user['user_id']}' AND outgoing_msg = '{$_SESSION['StartChat']}') ";
    $CheckCHAT = mysqli_query($connection, $query);


      if ($CheckCHAT) {
      while ($Chat = mysqli_fetch_array($CheckCHAT)) {

      //$decryption = '<i>Now you can Start chat</i>';
      //$hex2binCHAT = hex2bin($Chat['mg']);
      //openssl_private_decrypt($hex2binCHAT, $decryption, $Reciver_priv_key['privet_key']);
      //$decryption = $CheckCHAT['encryption_key'];


      if (($user['is_asymmetric']==0) && ($UserCheck2['is_asymmetric']==0)) {

        if (!empty($Chat['encryption_key'])) {
                 $decryption_iv = '1234567891011121';
                 $decryption=openssl_decrypt ($Chat['mg'], $ciphering, $Chat['encryption_key'], $options, $decryption_iv);

                //$decryption = $Chat['encryption_key'];
        } else {

        $decryption = 'This message is encrypted (Asymmetric)';

        }


      } else {

      $decryption = 'This message is encrypted';

    }

  //$decryption = '<i>This message is encrypted with using Symmetric Encryption.</i>';
  //$decryption_iv = '1234567891011121';
  //$decryption=openssl_decrypt ($Chat['mg'], $ciphering, $Chat['encryption_key'], $options, $decryption_iv);


if ($Chat['outgoing_msg']==$_SESSION['StartChat']) {


      if (($user['is_asymmetric']==1) && ($UserCheck2['is_asymmetric']==1)) {
                  
          if (empty($Chat['encryption_key'])) {

                      $hex2binCHAT = hex2bin($Chat['mg']);


                      openssl_private_decrypt($hex2binCHAT, $decryption, $user['privet_key']);

                      //$decryption = $Chat['mg'];
          } else {

            $decryption = 'This message is encrypted (Symmetric)';

          }


        }

 ?>

            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="assets/img/user-80x80.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p> <?php echo htmlentities($decryption); ?> </p>
                  <span class="time_date">~<?php echo $Chat['date_time']; ?></span></div>
              </div>
            </div>


<?php } else { 

      if (($user['is_asymmetric']==1) && ($UserCheck2['is_asymmetric']==1)) {

          if (empty($Chat['encryption_key'])) {

                      $hex2binCHAT = hex2bin($Chat['mg']);


                      openssl_private_decrypt($hex2binCHAT, $decryption, $UserCheck2['privet_key']);

                      //$decryption = $Chat['mg'];
          } else {

             $decryption = 'This message is encrypted (Symmetric)';
          }



        }


  ?>

            <!-- out going -->
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?php echo htmlentities($decryption); ?></p>
                <span class="time_date"> <?php echo $Chat['date_time']; ?></span> </div>
            </div>


<?php } } } if (mysqli_num_rows($CheckCHAT)==0) {?>
<div class="alert alert-primary text-center" role="alert">
  <i class="fa fa-lock" aria-hidden="true"></i> Messages are end-to-end encrypted. No one outside of this chat, not even TUTU, can read or listen to them.
</div>
<?php } ?>


          </div>

<?php 

if (($user['is_asymmetric']==1) && ($UserCheck2['is_asymmetric']==1) || ($user['is_asymmetric']==0) && ($UserCheck2['is_asymmetric']==0) ) { 


 ?>

<form method="post" autocomplete="off">
   <?php if (isset($msgBoxError)) {?><p class="text-end text-danger"><b> <?php echo $msgBoxError ;?></b></p><?php } ?>
    <div class="d-flex">
        <input class="form-control" type="text" name="message" id="message" autofocus placeholder="Type a message" >
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="Submitmsg"><i class="fa fa-paper-plane" aria-hidden="true" autocomplete="off"></i> Send</button>
                      
    </div>
</form>

<?php } else { ?>

<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
  if you want to chat with <?php echo $UserCheck2['user_name']; ?>, You and your friend must use the same encryption method. You can change your Encryption Method Go Profile setting and change Encryption Method. <b>Learn More</b>
</div>

<?php } ?>

      </div>

    <?php }  ?>

          </div>
        </div>
      </div>
    </div>


    </section>
    <br>
  <?php } else { ?>
    <h1 class="display-4 text-danger text-center"><b>Opps</b><br>Please SET User Name Before the Chat</h1>
    <p class="text-center">SET USER NAME : My Account --> My Profile --> User Name<br> OR <br><a href="chat.php">Refresh Page</a></p>
  <?php } ?>
  </div>

  <?php 
  /*CUSTOM MODAL*/
  include(__DIR__.'/inc/InterFace/Custom/Modal.php');
  /*FOOTER*/
  include(__DIR__.'/inc/InterFace/Footer.php');

  ?>

<!-- search -->
<script>
function searchFriends() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();

    ul = document.getElementById("friends");

    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

<script>
  

  $("#chat").load(location.href + " #chat");
</script>

<!-- chat scrall -->
<script>
  
var objDiv = document.getElementById("chat");
objDiv.scrollTop = objDiv.scrollHeight;


</script>



<script type="text/javascript">
    function doRefresh(){
        $("#show").load("LOG.txt");
    }
    setInterval(function(){doRefresh()}, 5000);
</script>

<!-- jquery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  

</body>
</html>

<?php mysqli_close($connection); ?>