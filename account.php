<?php
// core configuration
include_once "config/core.php";
// check if logged in as admin
// include login checker
$require_login=true;
$restricted = true;
$admin = false;
$agent = false;
include_once "config/checker.php";
include_once 'config/database.php';
include_once 'object/withdraw.php';
include_once 'object/user.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$withdrawal = new Withdrawal($db);
$user = new User($db);
$user->id = $_SESSION['user_id'];
$user->readOne();
// set page title
$page_title = "Account";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
if ($_POST) {
	if ($user->cashpoints>=10000) {
		switch ($_POST['package']) {
			case 'Bronze':
				$amount = $_POST['cp']/3.34;
				break;
			case 'Silver':
				$amount = $_POST['cp']/2.23;
				break;
			case 'Gold':
				$amount = $_POST['cp']/1.11;
				break;
			case 'Platinum':
				$amount = $_POST['cp'];
				break;
			default:
				switch ($_POST['license']) {
					case 'Paid':
						$amount = $_POST['cp']/4.45;
						break;
					case 'Free':
						$amount = $_POST['cp']/5.57;
						break;
					case 'Expired':
						$amount = $_POST['cp']/11.14;
						break;
					default:
						$amount = $_POST['cp']/33.42;
						break;
				}
				break;
		}
		$withdrawal->user_id=$user->id;
		$withdrawal->bank=$_POST['bank'];
		$withdrawal->acct_name=$_POST['acct_name'];
		$withdrawal->acct_num=$_POST['acct_num'];
		$withdrawal->email=$_POST['email'];
		$withdrawal->package=$_POST['package'];
		$withdrawal->license=$_POST['license'];
		$withdrawal->cp=$_POST['cp'];
		$withdrawal->amount=$amount;
		if ($withdrawal->create()) {
			$user->cashpoints = 0;
			$user->updateCashpoints();
			echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">
						  <strong>Request Successful!</strong><br>
						</div>
					</div>
				</div>
			</div>';
			//header("Location: {$home_url}account.php?action=successful");
		}
	}
	else {
		echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-info alert-dismissable" role="alert">
					  <strong>Unsuccessful Request!</strong><br>if your have 10,000cp or more contact us to solve this issue.
					</div>
				</div>
			</div>
		</div>';
	}
}
?>
<!-- ##### Contact Form Area Start ##### -->
<div class="contact-area section-padding-0-80">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="contact-title">
          <h2>Withdraw cashpoints</h2>
        </div>
      </div>
	  </div>
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="contact-form-area">
          <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            <div class="row">
            	<div class="col-12 col-lg-4">
                <input type="text" class="form-control" name="bank" value="<?php echo $user->bank;?>" readonly>
              </div>
              <div class="col-12 col-lg-4">
                <input type="text" class="form-control" name="acct_name" value="<?php echo $user->acct_name;?>" readonly>
              </div>
              <div class="col-12 col-lg-4">
                <input type="text" class="form-control" name="acct_num" value="<?php echo $user->acct_num;?>" readonly>
              </div>
              <div class="col-12 col-lg-4">
                <input type="email" class="form-control" name="email" value="<?php echo $user->email;?>" readonly>
              </div>
              <div class="col-12 col-lg-4">
                <input type="number" class="form-control" name="cp" placeholder="10,000cashpoints minimum * required" required value="<?php echo $user->cashpoints; ?>" min='10000' readonly>
              </div>
              <div class="col-12 col-lg-4">
                <input type="text" class="form-control" name="package" value="<?php echo $user->package;?>" readonly>
              </div>
              <div class="col-12 col-lg-4">
                <input type="text" class="form-control" name="license" value="<?php echo $user->license;?>" readonly>
              </div>
              <div class="col-12 text-center">
                <button class="btn newspaper-btn mt-30 w-100" type="submit">Request Withdrawal</button>
              </div>
         	  </div>
      		</form>
  			</div>
			</div>
      <div class="col-12 col-lg-4">
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6>Important!</h6>
          <p>Withdrawal typically takes up to 72 hours, depending on the number of approved withdrawals.<br>Reach us using the contact form in the case of an issue or directly using the mobile numbers below.</p>
        </div>
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6>Phone:</h6>
          <p>+234 811 868 2051 <br>+234 810 725 0441</p>
        </div>
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6>Email:</h6>
          <p><a href="mailto:okmarq@gmail.com?subject= withdrawal?body=I'm having issues with withdrawal">okmarq@gmail.com</a></p>
        </div>
    	</div>
  	</div>
  </div>
</div>
<!-- ##### Contact Form Area End ##### -->
<?php include_once "layout_foot.php"; ?>