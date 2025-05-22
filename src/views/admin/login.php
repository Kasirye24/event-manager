<?php

declare(strict_types=1);

require  APP_ROOT . '/views/include/admin_header.php';
?>
<div class="form-wrapper">
  <div class="app-form">
    <div class="app-form-sidebar">
      <div class="sidebar-sign-logo">
        <img src="/assets/images/logo-vc.png" alt="">
      </div>
      <div class="sign_sidebar_text">
        <h1>Exhibition Ticket and Attendance Management System</h1>
      </div>
    </div>
    <div class="app-form-content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10 col-md-10">
            <div class="app-top-items">
              <a href="#">
                <div class="sign-logo" id="logo">
                  <img src="/assets/images/logo.svg" alt="">
                  <img class="logo-inverse" src="images/dark-logo.svg" alt="">
                </div>
              </a>
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-7">

            <div class="registration">
              <h2 class="registration-title mb-2">Sign in</h2>
              <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= $errors[0] ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                <input type="hidden" name="action" value="login">
                <div class="form-group mt-2">
                  <label class="form-label">Email or Username*</label>
                  <input class="form-control h_50" type="text" placeholder="Enter your email or email" name="username" required value="<?= $_POST['username'] ?? ""  ?>">
                </div>
                <div class="form-group mt-4">
                  <div class="field-password">
                    <label class="form-label">Password*</label>
                  </div>
                  <div class="loc-group position-relative">
                    <input class="form-control h_50" type="password" placeholder="Enter your password" name="password" required>
                    <span class="pass-show-eye"><i class="fas fa-eye-slash"></i></span>
                  </div>
                </div>
                <button class="main-btn btn-hover w-100 mt-4" type="submit">Sign In <i class="fas fa-sign-in-alt ms-2"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright-footer">
        © <?= date('Y') ?>, Victoria Univesity. All rights reserved.
      </div>
    </div>
  </div>
</div>

<?php
require  APP_ROOT . '/views/include/admin_footer.php';
?>