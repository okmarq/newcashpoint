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
// set page title
$page_title = "Contact us";
// include classes
include_once 'config/database.php';
include_once 'object/message.php';
include_once "object/utils.php";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
if ($_POST) {
	// get database connection
  $database = new Database();
  $db = $database->getConnection();
  // initialize objects
  $message = new Message($db);
  $utils = new Utils();
	// set values to object properties
	$message->name=$_POST['name'];
	$message->email=$_POST['email'];
	$message->subject=$_POST['subject'];
	$message->message=$_POST['message'];
	// create the message
	if($message->create()){
	  // send email
	  $send_to_email="okmarq@gmail.com";
	  $body=$_POST['name'];
	  $body.='<br>';
	  $body.=$_POST['message'];
	  $subject=$_POST['subject'];
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  if($utils->receiveEmailViaPhpMail($send_to_email, $subject, $body, $name, $email)){
      echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-success alert-dismissable" role="alert">
						  Successful, we will get back to you shortly
						</div>
					</div>
				</div>
			</div>';
	  } else {
      echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">
						  Received, we will get back to you as soon as possible
						</div>
					</div>
				</div>
			</div>';
	  }
	  $_POST=array();
	} else {
	  echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-danger alert-dismissable" role="alert">
					  Unable to send message, please try again
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
          <h2>Contact us</h2>
        </div>
      </div>
	  </div>
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="contact-form-area">
          <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post" id="ajaxContact">
            <div class="row">
              <div class="col-12 col-lg-6">
                <input type="text" class="form-control" name="name" placeholder="Name * required" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : "";  ?>">
              </div>
              <div class="col-12 col-lg-6">
                <input type="email" class="form-control" name="email" placeholder="E-mail * required" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>">
              </div>
              <div class="col-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject * required" required value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject'], ENT_QUOTES) : "";  ?>">
              </div>
              <div class="col-12">
                <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Message * required" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES) : "";  ?></textarea>
              </div>
              <div class="col-12 text-center">
                <button class="btn newspaper-btn mt-30 w-100" type="submit" id="contactBtn">Send Message</button>
              </div>
         	  </div>
      		</form>
  			</div>
			</div>
      <div class="col-12 col-lg-4">
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6>Address:</h6>
          <p>36 A-line Ewet Housing Estate <br>Uyo, AKS 520231</p>
        </div>
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6>Phone:</h6>
          <p>+234 811 868 2051 <br>+234 810 725 0441</p>
        </div>
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6>Email:</h6>
          <p><a href="mailto:okmarq@gmail.com?subject=I%20neeed%20your%20help?body=I%20neeed%20your%20help%20with %20...">okmarq@gmail.com</a></p>
        </div>
    	</div>
  	</div>
    <!-- Google Maps -->
    <div class="map-area">
      <div id="googleMap"></div>
    </div>
  </div>
</div>
<!-- ##### Contact Form Area End ##### -->
<?php include_once "layout_foot.php"; ?>