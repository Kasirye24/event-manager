<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=9">
  <meta name="description" content="Gambolthemes">
  <meta name="author" content="Gambolthemes">
  <title><?= $data['title'] ?></title>

  <!-- Favicon Icon -->
  <link rel="icon" type="image/png" href="images/fav.png">

  <!-- Stylesheets -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
  <link href='/assets/vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
  <link href="/assets/css/style.css" rel="stylesheet">
  <link href="/assets/css/vertical-responsive-menu.min.css" rel="stylesheet">
  <link href="/assets/css/analytics.css" rel="stylesheet">
  <link href="/assets/css/responsive.css" rel="stylesheet">
  <link href="/assets/css/night-mode.css" rel="stylesheet">
  <link href="/assets/css/datepicker.min.css" rel="stylesheet">
  <link href="/assets/css/jquery-steps.css" rel="stylesheet">


  <!-- Vendor Stylesheets -->
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/assets/vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
  <link href="/assets/vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="/assets/vendor/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="/assets/vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.css" rel="stylesheet">
  <link href="/assets/vendor/ckeditor5/sample/css/sample.css" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
  <?php if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['email'])) : ?>
    <header class="header">
      <div class="header-inner">
        <nav class="navbar navbar-expand-lg bg-barren barren-head navbar fixed-top justify-content-sm-start pt-0 pb-0 ps-lg-0 pe-2">
          <div class="container-fluid ps-0">
            <button type="button" id="toggleMenu" class="toggle_menu">
              <i class="fa-solid fa-bars-staggered"></i>
            </button>
            <button id="collapse_menu" class="collapse_menu me-4">
              <i class="fa-solid fa-bars collapse_menu--icon "></i>
              <span class="collapse_menu--label"></span>
            </button>
            <button class="navbar-toggler order-3 ms-2 pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon">
                <i class="fa-solid fa-bars"></i>
              </span>
            </button>
            <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 me-auto" href="index-2.html">
              <div class="res-main-logo">
                <img src="/assets/images/logo-vc.png" alt="">
              </div>
              <div class="main-logo" id="logo">
                <img src="/assets/images/logo-vc.png" alt="">
                <img class="logo-inverse" src="images/dark-logo-vc.png" alt="">
              </div>
            </a>
            <div class="right-header order-2">
              <ul class="align-self-stretch">
                <li>
                  <a href="/admin/events/add" class="create-btn btn-hover">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Create Event</span>
                  </a>
                </li>
                <li class="dropdown account-dropdown order-3">
                  <a href="#" class="account-link" role="button" id="accountClick" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/assets/images/profile-imgs/img-13.jpg" alt="">
                    <i class="fas fa-caret-down arrow-icon"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-account dropdown-menu-end" aria-labelledby="accountClick">
                    <li>
                      <div class="dropdown-account-header">
                        <div class="account-holder-avatar">
                          <img src="/assets/images/profile-imgs/img-13.jpg" alt="">
                        </div>
                        <h5><?= $_SESSION['username'] ?></h5>
                        <p><?= $_SESSION['email'] ?></p>
                      </div>
                    </li>
                    <li class="profile-link">
                      <form class="d-grid px-2 pt-2 pb-1" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                        <input type="hidden" name="session_id" value="<?= $_SESSION['user_id'] ?>">
                        <button type="submit" class="link-item">Sign Out</button>
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="overlay"></div>
      </div>
    </header>

    <nav class="vertical_nav">
      <div class="left_section menu_left" id="js-menu">
        <div class="left_section">
          <ul>
            <li class="menu--item">
              <a href="/admin/dashboard" class="menu--link" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fa-solid fa-gauge menu--icon"></i>
                <span class="menu--label">Dashboard</span>
              </a>
            </li>
            <li class="menu--item">
              <a href="/admin/events" class="menu--link" title="Events" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fa-solid fa-calendar-days menu--icon"></i>
                <span class="menu--label">Events</span>
              </a>
            </li>
            <li class="menu--item">
              <a href="/admin/guests" class="menu--link" title="Guests" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fa-regular fa-address-card menu--icon"></i>
                <span class="menu--label">Guests</span>
              </a>
            </li>
            <li class="menu--item">
              <a href="/admin/payments" class="menu--link" title="Payments" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fa-solid fa-credit-card menu--icon"></i>
                <span class="menu--label">Payments</span>
              </a>
            </li>
            <li class="menu--item">
              <a href="/admin/reports" class="menu--link" title="Reports" data-bs-toggle="tooltip" data-bs-placement="right">
                <i class="fa-solid fa-chart-pie menu--icon"></i>
                <span class="menu--label">Reports</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper wrapper-body">
      <div class="dashboard-body">
        <div class="container-fluid">
        <?php else: ?>
        <?php endif; ?>