<?php
/*SETTION START*/
session_start(); 
/*DB CONNECTION*/ 
require_once(__DIR__.'/inc/Connection.php');
/*Forms Process*/
require_once(__DIR__.'/inc/Process/Forms.php');
/*Check cookies*/
/*session_destroy();*/

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

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TUTU - Official Website</title>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap v5 -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Icon -->
  <link rel="icon" type="image/icon" class="LogoMain" href="assets/img/favicon.ico"/>
</head>
<body>

  <div class="container">
    <?php
    /*HEADER*/
    include(__DIR__.'/inc/InterFace/Header.php');
    ?>
    <section>
       <div class="row g-5">
      <div class="col-md-6">

        <h1 class="display-1">TU TU With Message privately</h1>

        <h5>Simple, reliable, private messaging, available all over the world.</h5>
        
        <p class="lead">

          <?php if (isset($_SESSION['activeSession'])) {?>

          <a href="chat.php" class="btn btn-lg btn-secondary border-white bg-success">Chat Box <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

          <?php  } else { ?>


          <a href="#" class="btn btn-lg btn-secondary border-white bg-success" data-bs-toggle="modal" data-bs-target="#signup">Get Start <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

          <?php } ?>

        </p>
      </div>

      <div class="col-md-6">

        <img src="assets/img/get-started.png" alt="Get Started" class="img-fluid" >

      </div>
    </div>

    </section>

    <section>
      <img src="assets/img/messaging.png" alt="Get Started" class="img-fluid" >
      <h1 class="display-6 text-center">Tu Tu With private messaging safely<br> We are using end-to-end encryption </h1>
      <img src="assets/img/end-toend-encryption.png" alt="Get Started" class="img-fluid" >
    </section>


  </div>
  

  <?php 
  /*CUSTOM MODAL*/
  include(__DIR__.'/inc/InterFace/Custom/Modal.php');
  /*FOOTER*/
  include(__DIR__.'/inc/InterFace/Footer.php');

  ?>

<script>
function loading() {
  document.getElementById("load").innerHTML = '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>';
}

function loading1() {
  document.getElementById("load1").innerHTML = '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>';
}
</script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 

</body>
</html>
<?php mysqli_close($connection); ?>