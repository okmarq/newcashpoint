<?php
// core configuration
include_once "config/core.php";
$page_title = "Dashboard";
$require_login=true;
$restricted = true;
$admin = false;
$agent = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/user.php';
include_once "object/utils.php";
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
$user->id = $_SESSION['user_id'];
$user->readOne();
//$total_rows=$user->countAll();
$access_code = $user->access_code;
$you_referred = $user->countByreferral();
$referral_paid = $user->countByPaid();
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
include_once "info.php";
?>
<section class="about-area">
  <div class="container">
    <div class="row">
    	<div class="col-12">
        <h2>Your Referrals</h2>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $you_referred; ?></span></h3>
          <div class="cf-text">
            <h6>Referrals</h6>
            <span>Registered through your link</span>
          </div>
        </div>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $referral_paid; ?></span></h3>
          <div class="cf-text">
            <h6>Verified</h6>
            <span>Verified and bought a package</span>
          </div>
        </div>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3>&#8358;<span class="counter"><?php echo $user->affiliate_earnings = $referral_paid*0; ?></span></h3>
          <div class="cf-text">
            <h6>Affiliate Earnings</h6>
            <span>Total earnings from referrals</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    	<div class="col-12">
        <!--h2>Your Dashboard of success</h2-->
        <h2 class="lead">Earnings are in cashpoints <em>CP</em></h2>
        <h2>Earnings:</h2>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $user->logged_in; ?></span></h3>
          <div class="cf-text">
            <h6>Logged in</h6>
            <span>if this number is 0 sign out and sign back in</span>
          </div>
        </div>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $user->activity_earnings; ?></span>cp</h3>
          <div class="cf-text">
            <h6>CP Earned</h6>
            <span>your earnings today</span>
          </div>
        </div>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $user->cashpoints; ?></span>cp</h3>
          <div class="cf-text">
            <h6>Total CP</h6>
            <span>your total cashpoints</span>
          </div>
        </div>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $user->read; ?></span></h3>
          <div class="cf-text">
            <h6>Reviewed</h6>
            <span>Total reviews you've made</span>
          </div>
        </div>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $user->shared; ?></span></h3>
          <div class="cf-text">
            <h6>Shared Content</h6>
            <span>Total content shared</span>
          </div>
        </div>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $user->watched; ?></span></h3>
          <div class="cf-text">
            <h6>Watched</h6>
            <span>Videos Watched</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    	<div class="col-12">
        <h2>Withdrawals</h2>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-5">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $e = ceil(10000/$user->cashpoints);?></span>day<?php echo($e>1)?"s":""; ?></h3>
          <div class="cf-text">
            <h6>Goal to withdrawal</h6>
            <span>Based on your average earnings per day</span>
          </div>
        </div>
      </div>
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-6 col-lg-5">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter"><?php echo $day = ceil($e/30)+21; ?></span><?php switch ($day) {
        	 	case '1':
        	 		$x = "st";
        	 		break;
        	 	case '2':
        	 		$x = "nd";
        	 		break;
        	 	case '3':
        	 		$x = "rd";
        	 		break;
        	 	default:
        	 		$x = "th";
        	 		break;
        	 } echo $x; ?>
        	</h3>
          <div class="cf-text">
            <h6>Estimated withdrawal date</h6>
            <span>Based on our set withdrawal date</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Single Cool Fact -->
      <div class="col-12 col-sm-12 col-lg-12">
        <div class="single-cool-fact d-flex align-items-center">
          <h5><span class=""><?php echo $user->referral_link; ?></span></h5>
          <div class="cf-text">
            <h6>&nbsp;&nbsp;Refer Friends</h6>
            <span>&nbsp;&nbsp;Have them register through your link and earn &#8358; 200</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include_once "layout_foot.php"; ?>