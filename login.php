<?php
// core configuration
include_once "config/core.php";
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
include_once "config/checker.php";
include_once "config/database.php";
$database = new Database();
$db = $database->getConnection();
$page_title = "Login";
$access_denied=false;
if (isset($_POST['submit'])) {
	// include classes
	include_once "object/user.php";
	// initialize objects
	$user = new User($db);
	// check if username, email and password are in the database
	$user->username=$_POST['username'];
	$user->email=$_POST['username'];
	// check if email exists, also get user details using this emailExists() method
	$email_exists = $user->emailExists();
	// validate login increment logged in value from here
	// && $user->status==1
	if ($email_exists && password_verify($_POST['password'], $user->password)) {
	  // if it is, set the session value to true
		$_SESSION['user_id'] = $user->id;
	  $_SESSION['name'] = htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8');
		$_SESSION['username'] = htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8');
		if (isset($_SESSION['username'])) {
			// while user is logged in
			if ($user->logged_in == 0) {
				// the user was not logged in apparently
				// update logged_in to 1
				// update login_time to current time
				$user->activity_earnings += 50;
				$user->cashpoints += 50;
				$user->earnings_today += 50;
				$user->logged_in = 1;
				$user->login_time = time();
				$user->updateLoginTime();
				$user->updateLoggedin();
				if($user->status == 1){
			    $user->updateCashpoints();
				}
			} elseif ($user->logged_in == 1) {
				// the user was still logged in apparently
				// get time difference
				$timeSinceLogin = (time() - $user->login_time);
				if ($timeSinceLogin>=86400) {
					// 86400secs = 24hrs
					// user has been on for more than 24 hrs
					// update logged_in to 0
					$user->logged_in = 0;
					$user->updateLoggedin();
				}
			}
		}
		$_SESSION['email'] = htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');
		$_SESSION['package'] = htmlspecialchars($user->package, ENT_QUOTES, 'UTF-8');
	  $_SESSION['license'] = htmlspecialchars($user->license, ENT_QUOTES, 'UTF-8');
		$_SESSION['role'] = htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8');
		$_SESSION['affiliate_earnings'] = htmlspecialchars($user->affiliate_earnings, ENT_QUOTES, 'UTF-8');
		$_SESSION['activity_earnings'] = htmlspecialchars($user->activity_earnings, ENT_QUOTES, 'UTF-8');
		$_SESSION['earnings_today'] = htmlspecialchars($user->earnings_today, ENT_QUOTES, 'UTF-8');
		$_SESSION['cashpoints'] = htmlspecialchars($user->cashpoints, ENT_QUOTES, 'UTF-8');
		$_SESSION['referred'] = htmlspecialchars($user->referred, ENT_QUOTES, 'UTF-8');
	  $_SESSION['referred_by'] = htmlspecialchars($user->referred_by, ENT_QUOTES, 'UTF-8');
		$_SESSION['referral_link'] = htmlspecialchars($user->referral_link, ENT_QUOTES, 'UTF-8');
		$_SESSION['logged_in'] = htmlspecialchars($user->logged_in, ENT_QUOTES, 'UTF-8');
		$_SESSION['login_time'] = htmlspecialchars($user->login_time, ENT_QUOTES, 'UTF-8');
		$_SESSION['status'] = htmlspecialchars($user->status, ENT_QUOTES, 'UTF-8');
	} else { // if username does not exist or password is wrong
	  $access_denied=true;
	}
	exit;
}

/** login checker for 'user' access level
* if access level was 'Admin', redirect him to admin-dashboard
* else if access level was 'Agent' or 'User',
* redirect him to dashboard
*/
if(isset($_SESSION['role']) && $_SESSION['role']=="Admin"){
	header("Location: {$home_url}admin-dashboard");
}
elseif (isset($_SESSION['role']) && $_SESSION['role']=="Agent"){
	if($admin||$agent) {
		header("Location: {$home_url}agent-dashboard");
	}
}
elseif (isset($_SESSION['role']) && $_SESSION['role']=="User"){
	if($admin) {
		header("Location: {$home_url}dashboard");
	}
}
include_once "layout_head.php";
include_once "navigation.php";
// get 'action' value in url parameter to display corresponding prompt messages
$action=isset($_GET['action']) ? $_GET['action'] : "";
// tell the user he is not yet logged in
if($action =='not_yet_logged_in'){
  echo '<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 text-center">
				<div class="alert alert-info alert-dismissable" role="alert">
				  Please login
				</div>
			</div>
		</div>
	</div>';
}
// tell the user to login
else if($action=='please_login'){
  echo '<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 text-center">
				<div class="alert alert-info alert-dismissable" role="alert">
				  Login to access that page
				</div>
			</div>
		</div>
	</div>';
}
// tell the user email is verified
else if($action=='email_verified'){
  echo '<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 text-center">
				<div class="alert alert-success alert-dismissable" role="alert">
				  Your email address has been validated
				</div>
			</div>
		</div>
	</div>';
}
else if($action=='registered'){
  echo '<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 text-center">
				<div class="alert alert-success alert-dismissable" role="alert">
				  You have been registered, verify your account via the link sent to your email.
				</div>
			</div>
		</div>
	</div>';
}
// tell the user if access denied
if($access_denied){
  echo '<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 text-center">
				<div class="alert alert-info alert-dismissable" role="alert">
				  Access Denied, incorrect username, email or password
				</div>
			</div>
		</div>
	</div>';
}
// actual HTML login form
?>
<!-- ##### Popular News Area Start ##### -->
<div class="popular-news-area section-padding-25-10">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4">
      	<div class="section-heading text-center">
          <h6>Login</h6>
        </div>
        <!-- Newsletter Widget -->
        <div class="newsletter-widget">
          <!--h4>Login</h4-->
          <!--img src="img/bg-img/video1.jpg" alt=""-->
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username/Email" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit" class="btn w-100">Login</button>
          </form>
          <a href="forgot-password" class="w-100">Forgot Password</a>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="section-heading text-center">
          <h6>Earnings Breakdown</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">
          <!--h3>Walkthrough</h3-->
          <p>Earn <strong style="font-size: 15px;">&#8358; 3,000</strong> within a month of completing simple tasks.</p>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Registration: 500 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Login: 50 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Sponsored Content: 100 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Review: 5 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Publish: 30 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Share: 3 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Like: 1 <em>cp</em></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="section-heading text-center">
          <h6>More Earnings</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">
          <!--h3>Walkthrough</h3-->
          <p>Registration and earning is free. However, we recommend you take the paid path</p>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Youtube Suscription: 75 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>watch video: 6 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Like video: 4 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Share video: 10 <em>cp</em></p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Package Upgrade (Silver): 10000 <em>cp</em> or &#8358; 1,000</p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>License Renewal (Bronze): 5000 <em>cp</em> or &#8358; 500</p>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <p>Visit the <a href='tnc'>Terms and conditions</a> and <a href='faq'>FAQ</a> page for more information</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Popular News Area End ##### -->
<?php include_once "layout_foot.php"; ?>