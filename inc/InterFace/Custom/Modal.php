<?php if (!isset($_SESSION['activeSession'])) {?>
<!-- Login -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModal"><i class="fa fa-user" aria-hidden="true"></i> Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">

      <div class="mb-3">
      <?php 
          if (isset($loginErrors) && !empty($loginErrors)) {
            foreach ($loginErrors as $loginError) {
              if (!empty($loginError)) {?>

                <b><p class="text-danger"><?php echo '' . $loginError ; ?></p></b>

        <?php } } } ?>
        
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Your Email Address</label>
        <input type="text" name="email" class="form-control" placeholder="Your email Address">
      </div>
      <!-- <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="device">
        <label class="form-check-label" for="device">Trust my device </label>
      </div> -->
      <div class="mb-3">
        <button type="submit" name="login" class="btn btn-primary" id="load" onclick="loading()"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
      </div>

      </div>
      <div class="modal-footer">

      </div>
      </form>

    </div>
  </div>
</div>

<!-- Register -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupMadal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupMadal"><i class="fa fa-user" aria-hidden="true"></i> Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">

      <div class="mb-3">
      <?php 
          if (isset($RegisterErrors) && !empty($RegisterErrors)) {
            foreach ($RegisterErrors as $RegisterError) {
              if (!empty($RegisterError)) {?>

                <b><p class="text-danger"><?php echo '' . $RegisterError ; ?></p></b>

      <?php } } } ?>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Your Email Address</label>
        <input type="text" name="email" class="form-control" placeholder="Your email Address">
      </div>

      <div class="mb-3">
        <button type="submit" name="Register" class="btn btn-primary" id="load1" onclick="loading1()"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Up</button>
      </div>

      </div>
      <div class="modal-footer">
        
      </div>
      </form>

    </div>
  </div>
</div>

<?php if (!empty($_SESSION['verifyCode'])) {?>

<!-- Verification -->
<div class="modal fade" id="verify" tabindex="-1" aria-labelledby="verifyMadal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verifyMadal"> Verification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form method="post">

        <div class="mb-3">
          <p>Please Check Your Email InBox</p>
        </div>

        <div class="mb-3">
          <b><p class="text-danger"><?php 
          if (!empty($verifyError)) {
            echo $verifyError;
          }?></p></b>
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Enter Your Verification Code</label>
          <input type="text" name="verifyCode" class="form-control" placeholder="xxxxx">
        </div>

        <div class="mb-3">
          <button type="submit" name="verify" class="btn btn-primary"> Verify</button><!-- <br><a href="#">Resend</a> -->
        </div>
        </form>
      </div>

      <div class="modal-footer">
        
      </div>
      
    </div>
  </div>
</div>

<?php } } ?>

<!-- Error Box  -->

<div class="modal fade" id="showError" tabindex="-1" aria-labelledby="showErrorMadal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">

        <p class="text-danger display-1 text-center"><i class="fa fa-exclamation-triangle danger" aria-hidden="true"></i></p>
        <h1 class="text-danger text-center">Opps.. Something is Worng!!</h1>

      </div>

      <div class="modal-footer">
        
      </div>
      
    </div>
  </div>
</div>

<!-- Sucess messag -->

<div class="modal fade" id="showSucess" tabindex="-1" aria-labelledby="showSucessMadal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">

        <p class="text-success display-1 text-center"><i class="fa fa-check" aria-hidden="true"></i></p>
        <h1 class="text-success text-center">successfull!</h1>

        <center><a href="chat.php"><button type="button" class="btn btn-primary btn-lg">Done</button></a></center>


      </div>

      <div class="modal-footer">
        
      </div>
      
    </div>
  </div>
</div>

<?php if (isset($_SESSION['activeSession'])) {?>

 <!-- Add a new friend -->
<div class="modal fade" id="addfriend" tabindex="-1" aria-labelledby="addfriendMadal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addfriendMadal"> Add New Friend</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form method="post">
      <div class="modal-body">

      <div class="mb-3">
      <?php 
          if (isset($addFriends) && !empty($addFriends)) {
            foreach ($addFriends as $addFriend) {
              if (!empty($addFriend)) {?>

                <b><p class="text-danger"><?php echo '' . $addFriend ; ?></p></b>

        <?php } } } ?>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Friend Email Address</label>
        <input type="text" name="email" class="form-control" placeholder="Enter Friend email Address">
      </div>

      <div class="mb-3">
        <button type="submit" name="addFriend" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Friend</button>
      </div>

      </div>

      </form>

      <div class="modal-footer">
        
      </div>
      
    </div>
  </div>
</div>

 <!-- Request -->
<div class="modal fade" id="Request" tabindex="-1" aria-labelledby="RequestMadal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="RequestMadal"> Friend Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">

        <div class="mb-3">
          <b><p class="text-danger"><?php 
          if (!empty($verifyError)) {
            echo $verifyError;
          }?></p></b>
        </div>


      <ul class="list-group">


      <?php 
        $query = "SELECT friends.*,users.* FROM friends INNER JOIN users ON friends.user1 = users.user_id WHERE user2 = '{$user['user_id']}' AND is_accept = 0 ORDER BY friends.requ_datetime DESC";

          $Requested_list = mysqli_query($connection, $query);
          $cnt = 1;
          if ($Requested_list) {
          while ($Requested = mysqli_fetch_array($Requested_list)) {

      ?>

        <form method="post">
          <li class="list-group-item">
            <img src="assets/img/user-80x80.png" class="rounded-circle" alt="user-image" width="50"> 
            <?php echo $Requested['email'];?>
            <input type="hidden" name="request" value="<?php echo $Requested['user1']; ?>">
            <button type="submit" name="accept" class="btn btn-primary">Accept</button>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
          </li>
        </form>


      <?php $cnt++; }  } if (mysqli_num_rows($Requested_list)==0) {
        echo "<center>No Friend Request Yet</center>";
      } ?>

      </ul>

      </div>

      <div class="modal-footer">
        
      </div>
      
    </div>
  </div>
</div>

 <!-- Settings -->
<div class="modal fade" id="settings" tabindex="-1" aria-labelledby="settingsMadal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settingsMadal">Your Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="post" autocomplete="off">

      <div class="modal-body">

      <div class="mb-3">
        <p>Last Login : <?php echo $user['last_login']; ?></p>
      </div>

      <div class="mb-3">
      <?php  if (!empty($SettingErrors)) { ?>

            <b><p class="text-danger"><?php echo '' . $SettingErrors ; ?></p></b>

      <?php } ?>
      </div>

      <div class="mb-3">
        <center><img src="assets/img/user-80x80.png" class="rounded-circle" alt="user-image" width="130"></center>
      </div>

      <div class="mb-3">
        <label class="form-label">User Name</label>
        <input type="text" class="form-control" value="<?php echo $user['user_name'];?> " name="userName" placeholder="Please Enter User Name" >
      </div>

      <fieldset class="mb-3">
        <legend>Encryption Methods</legend>


        <?php 

    $query = "SELECT is_asymmetric FROM users WHERE user_id = '{$user['user_id']}' LIMIT 1";
    $is_asymmetric_info = mysqli_query($connection, $query);
    $is_asymmetric = mysqli_fetch_array($is_asymmetric_info);

         ?>

        <div class="form-check">
          <input type="radio" name="is_asymmetric" class="form-check-input" id="Symmetric" value="symmetric" <?php if ($is_asymmetric['is_asymmetric']==0) { echo 'checked'; } ?>>
          <label class="form-check-label" for="Symmetric" >Symmetric Encryption</label>
        </div>

        <div class="mb-3 form-check">
          <input type="radio" name="is_asymmetric" class="form-check-input" id="Asymmetric" value="asymmetric" <?php if ($is_asymmetric['is_asymmetric']==1) { echo 'checked'; } ?>>
          <label class="form-check-label" for="Asymmetric" >Asymmetric Encryption</label>
        </div>

      </fieldset>

      <div class="mb-3">
        <label class="form-label">Your Email Address</label>
        <input type="text" class="form-control" value=" <?php echo $user['email'];?> " disabled>
      </div>

      <div class="mb-3">
        <button type="submit" name="saveSettings" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Save</button>
      </div>

      </div>

      </form>

      <div class="modal-footer">
        
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutMadal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutMadal">Are You Sure?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form method="post">
      <div class="modal-body">

      <div class="mb-3 text-center">
        
        <a href="logout.php"><button type="button" class="btn btn-primary"></i>Yes</button></a>
        OR
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      </div>

      </div>

      <div class="modal-footer">
        
      </div>
      
    </div>
  </div>
</div>

<?php } ?>