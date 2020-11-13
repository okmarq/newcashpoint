<?php
if (isset($_GET['giveaway'])) {
	$cookie_name = $_GET['giveaway'];
	$cookie_value = $_GET['giveaway'];
	setcookie($cookie_name, $cookie_value, 0);
} elseif (isset($_GET['ref'])) {
	$cookie_name = $_GET['ref'];
	$cookie_value = $_GET['ref'];
	setcookie($cookie_name, $cookie_value, 0);
}
// core configuration
include_once "config/core.php";
$page_title = "Register";
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
include_once "config/checker.php";
$access_denied=false;
// include classes
include_once 'config/database.php';
include_once 'object/user.php';
include_once "object/utils.php";
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$utils = new Utils();
$user = new User($db);
// AJAX START
if (isset($_POST['username_check'])) {
	$user->username = $_POST['username'];
	if($user->emailExists()){
		echo 'taken';
	}else{
		echo 'not taken';
	}
	exit();
}
if (isset($_POST['email_check'])) {
	$user->email = $_POST['email'];
	if($user->emailExists()){
		echo 'taken';
	}else{
		echo 'not taken';
	}
	exit();
}
if (isset($_POST['save'])) {
	if (!isset($_GET['giveaway']) || (isset($_GET['giveaway'])&&$_GET['giveaway']!='All_free'&&$_GET['giveaway']!='Reg_free'&&$_GET['giveaway']!='cp_1.5k'&&$_GET['giveaway']!='cp_1k'&&$_GET['giveaway']!='cp_.7k')){
		$g_a = (isset($_GET['giveaway'])) ? $_GET['giveaway'] : 'None';
		$ref = (isset($_GET['ref'])) ? $_GET['ref'] : 'SuperAdmin';
		$access_code=$utils->getToken();

		$user->name=$_POST['name'];
	  $user->username=$_POST['username'];
	  $user->email=$_POST['email'];
	  $user->password=$_POST['password'];
	  $user->mobile=$_POST['mobile'];
	  $user->amount=$_POST['amount'];
	  $user->ref_number=$_POST['ref'];
	  switch ($_POST['amount']) {
	  	case '7500':
	  		$user->package='Platinum';
	  		$user->license='1 year';
	  		break;
	  	case '5000':
	  		$user->package='Gold';
	  		$user->license='1 year';
	  		break;
  		case '1500':
	  		$user->package='Silver';
	  		$user->license='1 year';
	  		break;
  		case '1000':
	  		$user->package='Bronze';
	  		$user->license='1 year';
	  		break;
	  	default:
	  		break;
	  }
	  $user->giveaway = $g_a;
  	$user->cashpoints = 500;
		$user->activity_earnings = 500;
	  $user->referred_by = $ref;
	  $user->referral_link=$home_url.'register?ref='.htmlspecialchars($_POST['username'], ENT_QUOTES);
		$user->access_code=$access_code;

		// create the user
		if($user->create()){
			// send confimation email
			$send_to_email=$_POST['email'];
			$recipient = $_POST['name'];
			$body='Congratulations '.$recipient.' you made a wise decision to be successful.<br>Purchase any of our packages and get a free license for 1 year.<br>
			<a href="https://paystack.com/pay/bronze-cashpoint"><strong>Bronze - &#8358; 1000</strong></a><br>
			<a href="https://paystack.com/pay/silver-cashpoint"><strong>Silver - &#8358; 1,500</strong></a><br>
			<a href="https://paystack.com/pay/gold-cashpoint"><strong>Gold - &#8358; 5,000</strong></a><br>
			<a href="https://paystack.com/pay/platinum-cashpoint"><strong>Platinum - &#8358; 7,500</strong></a><br><br>';
			$body.="<br>Share your referral link with others to earn with no limit to withdrawals.<br>{$user->referral_link}<br>";
			$body.="We generate revenue via Ads to maintain our services. <br><br>Click the link below to verify your email: <br>{$home_url}verify?access_code={$access_code}<br><br>";
			$subject="New cashpoint Verification";
			if($utils->sendEmailViaPhpMail($send_to_email, $subject, $body)){
				echo '<div class="container">
					<div class="row">
						<div class="col-12 col-lg-4 text-center">
							<div class="alert alert-info alert-dismissable" role="alert">
							  Verification link has been sent to your email.
							</div>
						</div>
					</div>
				</div>';
			} else {
	    	echo '<div class="container">
					<div class="row">
						<div class="col-12 col-lg-4 text-center">
							<div class="alert alert-info alert-dismissable" role="alert">
							  Account created. verification email not sent. contact <a href="mailto:okmarq@gmail.com?subject=having trouble registering">new Cashpoint</a> to fix this issue.
							</div>
						</div>
					</div>
				</div>';
			}
			exit();
		}	else {
				echo '<div class="container">
					<div class="row">
						<div class="col-12 col-lg-4 text-center">
							<div class="alert alert-danger alert-dismissable" role="alert">
							 	Unable to register. Please try again.
							</div>
						</div>
					</div>
				</div>';
			exit();
		}
		exit();
	}
	if (isset($_GET['giveaway'])) {
		$g_a = (isset($_GET['giveaway'])) ? $_GET['giveaway'] : 'None';
		$ref = (isset($_GET['ref'])) ? $_GET['ref'] : 'SuperAdmin';
		$access_code=$utils->getToken();

		$user->name=$_POST['name'];
	  $user->username=$_POST['username'];
	  $user->email=$_POST['email'];
	  $user->password=$_POST['password'];
	  $user->mobile=$_POST['mobile'];
	  $user->ref_number=$_POST['reference'];
	  switch ($g_a) {
	  	case 'All_free':
	  		$user->package='Free';
	  		$user->license='Free';
	  		break;
	  	case 'Reg_free':
	  		$user->package='Free';
	  		$user->license='Paid';
	  		break;
  		case 'cp_1.5k':
  			$user->cashpoints = 1500;
				$user->activity_earnings = 1500;
  			break;
  		case 'cp_1k':
  			$user->cashpoints = 1000;
				$user->activity_earnings = 1000;
  			break;
  		case 'cp_.7k':
  			$user->cashpoints = 700;
				$user->activity_earnings = 700;
  			break;
	  	default:
	  		break;
	  }
	  $user->amount=$_POST['amount'];
	  switch ($_POST['amount']) {
	  	case '7500':
	  		$user->package='Platinum';
	  		$user->license='1 year';
	  		break;
	  	case '5000':
	  		$user->package='Gold';
	  		$user->license='1 year';
	  		break;
  		case '1500':
	  		$user->package='Silver';
	  		$user->license='1 year';
	  		break;
  		case '1000':
	  		$user->package='Bronze';
	  		$user->license='1 year';
	  		break;
	  	default:
	  		break;
	  }
	  $user->giveaway = $g_a;
	  $user->referred_by = $ref;
	  $user->referral_link=$home_url.'register?ref='.htmlspecialchars($_POST['username'], ENT_QUOTES);
		$user->access_code=$access_code;
	  $user->is_giveaway=1;

		// create the user
		if ($user->updateGiveaway()) {
			// send confimation email
			$send_to_email=$_POST['email'];
			$recipient = $_POST['name'];
			$body='Congratulations '.$recipient.' you are a winner.<br>You can purchase any of our packages and get a free license for 1 year.<br>
			<a href="https://paystack.com/pay/bronze-cashpoint"><strong>Bronze - &#8358; 1000</strong></a><br>
			<a href="https://paystack.com/pay/silver-cashpoint"><strong>Silver - &#8358; 1,500</strong></a><br>
			<a href="https://paystack.com/pay/gold-cashpoint"><strong>Gold - &#8358; 5000</strong></a><br>
			<a href="https://paystack.com/pay/platinum-cashpoint"><strong>Platinum - &#8358; 7,500</strong></a><br><br>';
			$body.="<br>Share giveaway links with others while it's ongoing.<br><br>We generate revenue via Ads to maintain our services.<br><br>";
			$body.="Click the link below to verify your email: <br>{$home_url}verify?access_code={$access_code}<br><br>Remember to share your referral link with others.<br>{$user->referral_link}<br>";
			$subject="New cashpoint Verification Email";
			if($utils->sendEmailViaPhpMail($send_to_email, $subject, $body)){
		    echo '<div class="container">
					<div class="row">
						<div class="col-12 col-lg-4 text-center">
							<div class="alert alert-info alert-dismissable" role="alert">
							  Verification link has been sent to your email.
							</div>
						</div>
					</div>
				</div>';
			} else {
	    	echo '<div class="container">
					<div class="row">
						<div class="col-12 col-lg-4 text-center">
							<div class="alert alert-info alert-dismissable" role="alert">
							  Account created. verification email not sent. contact <a href="mailto:okmarq@gmail.com?subject=having trouble registering">New cashpoint</a> Directly to fix this issue.
							</div>
						</div>
					</div>
				</div>';
			}
			exit();
		}	else {
			echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-danger alert-dismissable" role="alert">
						 	Unable to register. Please try again or <a href="register">register</a> via the normal route.
						</div>
					</div>
				</div>
			</div>';
			exit();
		}
		exit();
	}
}
// AJAX END
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
?>
<div class="container section-padding-0-10">
	<div class="row">
		<div class="col-12 col-lg-12 text-center">
			<div class="border border-dark rounded section-padding-0-10">
		  	<h3>Giveaway of a thousand smiles each</h3>
				<p>Spaces are limited, only 500 available.<p/>
				<p>If registration is unsuccessful, giveaway has ended.</p>
				<a class="btn btn-outline-danger" href="register?giveaway=All_free">Free Package & License</a>
				<!--a class="btn btn-outline-warning" href="register?giveaway=Reg_free">Free Package only</a>
				<a class="btn btn-outline-secondary" href="register?giveaway=cp_1.5k">1,500<em>cashpoints</em></a>
				<a class="btn btn-outline-primary" href="register?giveaway=cp_1k">1,000<em>cashpoints</em></a>
				<a class="btn btn-outline-success" href="register?giveaway=cp_.7k">700<em>cashpoints</em></a-->
			</div>
		</div>
	</div>
</div>

<div id="echo"></div>
<!-- ##### Popular News Area Start ##### -->
<div class="popular-news-area section-padding-25-10">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4 section-padding-10-0">
      	<div class="section-heading text-center">
          <h6>Register</h6>
        </div>
        <!-- Newsletter Widget -->
        <div class="newsletter-widget">
          <h4>Important!</h4>
        	<p>Please read our <a href="tnc.com">terms and conditions</a> before registration. upon registration, you agree to our terms and conditions.</p>
        	<p id="error_msg"></p>
          <form id="paymentForm">
            <input type="text" id="name" placeholder="Full Name * required" required>
            <input type="tel" id="mobile" placeholder="Mobile Number">
            <h6 id="e-error"></h6>
            <input type="email" id="email" placeholder="Email * required" required>
            <h6 id="u-error"></h6>
            <input type="text" id="username" placeholder="Username * required" required>
            <input type="password" id="password" placeholder="Password * required" required>
			<select class="form-control mb-15" id="amount" name="pack">
				<option value="0">Free package - &#8358; 0</option>
				<option value="7500">Platinum package - &#8358; 7500</option>
				<option value="5000" selected>Gold package - &#8358; 5000</option>
				<option value="1500">Silver package - &#8358; 1500</option>
				<option value="1000">Bronze package - &#8358; 1000</option>
			</select>
            <button type="submit" id="reg_btn" onclick="payWithPaystack()" class="btn w-100">Register</button>
            <small>Thank you for registering with us at New cashpoint, your details are safe with us.</small>
            <p><strong id="info_msg"></strong></p>
          </form>
        </div>
      </div>
      <div class="col-12 col-lg-4 section-padding-30-0">
        <div class="section-heading text-center">
          <h6>Walkthrough</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">
          <!--h3>Walkthrough</h3>
          < Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>1.</span> <p style="line-height: 1.5;">After registration, bonus cashpoints will be credited to your account.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>2.</span> <p style="line-height: 1.5;">Verify your email to start earning cashpoints.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>3.</span> <p style="line-height: 1.5;">Do tasks, review, share, watch, post to earn cashpoints. See our <a href="tnc">terms and conditions</a> for more details.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>4.</span> <p style="line-height: 1.5;">Accumulate an equivalent minimum of 10,000cp to withdraw.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>5.</span> <p style="line-height: 1.5;">Update your bank details & social media handles for verification of sponsored content.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>6.</span> <p style="line-height: 1.5;">Withdrawals typically take 48 hours or less depending on the number of individuals.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>7.</span><p style="line-height: 1.5;">Referrals attract real cash value.</p></h6>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4 section-padding-30-0">
        <div class="section-heading text-center">
          <h6>Guidelines</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">
          <!--h3>Guidelines</h3>
          < Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>1.</span> <p style="line-height: 1.5;">Registration and earnings are free.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>2.</span> <p style="line-height: 1.5;">Purchase a package to gain more cashpoint value.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>3.</span> <p style="line-height: 1.5;">After license expiration, acquire another license as soon as possible.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>4.</span> <p style="line-height: 1.5;">Free or unlicensed packages will raise your minimum cp threshold drastically. 300% for the former, 1000% for the latter respectively.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>5.</span> <p style="line-height: 1.5;">Registration or purchase of a new package automatically comes with a free license up to 1 year.</p></h6>
          </div>
        	<!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>6.</span> <p style="line-height: 1.5;">Ensure you choose a paid package as soon as possible to withdraw a sizeable amount.</p></h6>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <h6><span>7.</span> <p style="line-height: 1.5;">We allow up to a maximum of 100 withdrawal requests a day. In the future, this number could become unlimited.</p></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Popular News Area End ##### -->
<!-- ##### Video Post Area End ##### -->
<?php
include_once "layout_foot.php";
?>