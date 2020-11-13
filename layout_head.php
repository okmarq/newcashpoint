<!DOCTYPE html>
<?php ob_start(); ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- CKEditor 5 -->
  <!--script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script-->
  <!-- CKEditor 4 -->
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <!-- Title -->
  <title><?php echo isset($page_title) ? $page_title : "Cashpoint | Legitimate & professional"; ?></title>
  <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url"           content="www.newcashpoint.com/resister.php" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Cashpoint | Legitimate &amp; professional" />
  <meta property="og:description"   content="New cashpoint is an online platform that offers review services from institutions of repute to users aiming to provide a means of lucrative earning through Ads we display to them." />
  <meta property="og:image"         content="www.newcashpoint.com/img/bg-img/23.jpg" />
  <meta property="og:image:width"   content="200px" />
  <meta property="og:image:height"  content="200px" />
  <meta property="fb:app_id"        content="2662814147333746" />
  <!-- Favicon -->
  <?php include_once "favicon.php"; ?>
  <!--link rel="icon" href="img/favicon.ico"-->
  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- ##### Header Area Start ##### -->
  <header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Logo -->
              <div class="logo">
                <a href="index">
	          			<img src="img/logoblue100.png" alt="new cashpoint logo">
                	<img src="img/core-img/logo.png" alt="new cashpoint logo description">
                </a>
            	</div>
	            <!-- Login Search Area -->
	            <div class="login-search-area d-flex align-items-center">
                <!-- Login -->
								<!-- Nav Start -->
								<?php
								// login and logout options will be here
								// check if user was logged in
								// if user was logged in, show "Dashboard," "Profile", "Earnings", "Logout" and "Other" options
								if(isset($_SESSION['role']) && ($_SESSION['role']=='Admin'||$_SESSION['role']=='Agent')) { ?>
									<div class="login d-flex">
									  <!--a href="profile"><?php //echo "Hello ".$_SESSION['username']; ?></a-->
										<?php if ($_SESSION['role']=='Admin') { ?>
											<a href="admin-dashboard">Monitor</a>
										<?php }else if ($_SESSION['role']=='Agent') { ?>
											<a href="agent-dashboard">Agency</a>
										<?php } ?>
									  <a href="logout">Logout</a>
									</div>
								<?php } else { ?>
									<div class="login d-flex">
									  <a href="login">Login</a>
									  <a href="register">Register</a>
									</div>
								<?php } ?>
                <div class="search-form">
                  <form action="#" method="post">
                    <input type="search" name="search" class="form-control" placeholder="Search">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  	</div>