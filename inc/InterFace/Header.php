    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="assets/img/80x80-logo.png" alt="" width="30"> TUTU.COM
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Help Center</a></li>
      </ul>

      <div class="col-md-3 text-end">


          <?php if (isset($_SESSION['activeSession'])) {?>

          <div class="dropdown">
            <button class="btn btn-outline-primary me-2 dropdown-toggle" type="button" id="options" data-bs-toggle="dropdown" aria-expanded="false">
              My Account
            </button>
            <ul class="dropdown-menu" aria-labelledby="options">
              <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#settings">My Profile</a></li>
              <li><a class="dropdown-item" href="chat.php">Inbox</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">Log out</a></li>
            </ul>
          </div>

          <?php  } else { ?>

          <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup">Sign-up</button>

          <?php } ?>

      </div>
    </header>

