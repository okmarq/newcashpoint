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
include_once 'object/utils.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
$utils = new Utils();
// set page title
$page_title = "Forgot Password";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
if($_POST){
  // check if username and password are in the database
  $user->email=$_POST['email'];
  if($user->emailExists()){
    // update access code for user
    $access_code=$utils->getToken();
    $user->access_code=$access_code;
    if($user->updateAccessCode()){
      // send reset link
      $body="Hi there.<br><br>";
      $body.="Click the following link to reset your password: {$home_url}/reset-password?access_code={$access_code}";
      $subject="Reset Password";
      $send_to_email=$_POST['email'];
      if($utils->sendEmailViaPhpMail($send_to_email, $subject, $body)){
		    echo '<div class="container">
					<div class="row">
						<div class="col-12 col-lg-4 text-center">
							<div class="alert alert-info alert-dismissable" role="alert">Password reset link was sent to your email.
							</div>
						</div>
					</div>
				</div>';
      }
      // message if unable to send email for password reset link
      else{
      	echo '<div class="container">
					<div class="row">
						<div class="col-12 col-lg-4 text-center">
							<div class="alert alert-info alert-dismissable" role="alert">ERROR: Unable to send reset link.
							</div>
						</div>
					</div>
				</div>';
  		}
    }
      // message if unable to update access code
      else{
      	echo '<div class="container">
					<div class="row">
						<div class="col-12 col-lg-4 text-center">
							<div class="alert alert-info alert-dismissable" role="alert">ERROR: Unable to update access code.
							</div>
						</div>
					</div>
				</div>';
      }
    }
    // message if email does not exist
    else{
    	echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">Your email cannot be found.
						</div>
					</div>
				</div>
			</div>';
    }
  echo "</div>";
}
// post code will be here
// show reset password HTML form ?>
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
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="email" name="email" placeholder="Email * required" required autofocus>
            <button type="submit" class="btn w-100">Reset Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Popular News Area End ##### -->
<?php include_once "layout_foot.php"; ?>