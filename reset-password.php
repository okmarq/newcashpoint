<?php
// core configuration
include_once "config/core.php";
// check if logged in as admin
// include login checker
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/user.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
// set page title
$page_title = "Reset Password";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";

// get given access code
$access_code=isset($_GET['access_code']) ? $_GET['access_code'] : die("Access code not found.");
// check if access code exists
$user->access_code=$access_code;
if(!$user->accessCodeExists()){
  die('Access code not found.');
}
else{ // reset password form will be here
	// if the login form was submitted
	if($_POST){
	  $user->password=$_POST['password'];
	  if($user->updatePassword()){
	    echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">Password was reset.
						</div>
					</div>
				</div>
			</div>';
    }
    else{
    	echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">ERROR: Unable to reset password.
						</div>
					</div>
				</div>
			</div>';
		}
	}
?>
	<!-- ##### Popular News Area Start ##### -->
	<div class="popular-news-area section-padding-80-50">
	  <div class="container">
	    <div class="row">
	      <div class="col-12 col-lg-4">
	      	<div class="section-heading text-center">
	          <h6>Reset Password</h6>
	        </div>
	        <!-- Newsletter Widget -->
	        <div class="newsletter-widget">
	          <h4>Reset Form</h4>
	          <!--img src="img/bg-img/video1.jpg" alt="">
	          <p>Login to continue your earning</p-->
	          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	            <input type="password" name="password" placeholder="Password * required" required autofocus>
	            <button type="submit" class="btn w-100">Reset Password</button>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
<?php } ?>
<!-- ##### Popular News Area End ##### -->
<?php include_once "layout_foot.php"; ?>