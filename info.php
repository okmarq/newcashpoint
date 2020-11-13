<div class="container">
	<div class="row">
		<div class="col-12 col-lg-4 text-center" id="res">
<?php if (isset($_POST['link'])) {
	$utils = new Utils();
	$send_to_email=$_SESSION['email'];
	$recipient = $_SESSION['name'];
	$body="<br>Share your referral link with others to earn with no limit to withdrawals.<br>{$user->referral_link}<br>";
	$body.="We generate revenue via Ads to maintain our services. <br><br>Click the link below to verify your email: <br>{$home_url}verify?access_code={$access_code}<br><br>";
	$subject="New cashpoint Verification";
	if($utils->sendEmailViaPhpMail($send_to_email, $subject, $body)){
		echo 'Verification link has been sent to your email.';
	} else {
		echo 'Contact <a href="mailto:okmarq@gmail.com?subject=having trouble registering">new Cashpoint</a> to fix this issue.>';
	}
	exit();
}
if(isset($_SESSION['status'])&&$_SESSION['status'] == 0){ ?>
	    <div class="alert alert-danger alert-dismissable" role="alert">
        <p>Verify your email to start earning cashpoints
        	<br>Resend <a href="#" id="link">link</a>
        	<br><span id="link_msg"></span>
        </p>
	    </div>
<?php } ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="popular-news-area section-margin-10-0  section-padding-0-10">
    <div class="row">
      <div class="col-12 col-lg-4 section-padding-10-0">
      	<div class="section-heading text-center">
          <h6>Giveaway</h6>
        </div>
        <!-- Newsletter Widget -->
        <div class="newsletter-widget">
          <h4>Copy and share giveaway link</h4>
          <div class="row">
            <input type="text" value="newcashpoint.com/register.php?giveaway=All_free" id="All_free" readonly class="form-control col-9">
            <button onclick="All_free()" class="btn w-10 col-3">All free</button>
          </div>
          <!--div class="row section-padding-10-0">
            <input type="text" value="newcashpoint.com/register.php?giveaway=Reg_free" id="Reg_free" readonly class="form-control col-9">
            <button onclick="Reg_free()" class="btn w-10 col-3">Reg free</button>
          </div>
          <div class="row section-padding-10-0">
            <input type="text" value="newcashpoint.com/register.php?giveaway=cp_1.5k" id="cp_1.5k" readonly class="form-control col-9">
            <button onclick="cp15()" class="btn w-10 col-3">cp 1.5k</button>
          </div>
          <div class="row section-padding-10-0">
            <input type="text" value="newcashpoint.com/register.php?giveaway=cp_1k" id="cp_1k" readonly class="form-control col-9">
            <button onclick="cp10()" class="btn w-10 col-3">cp 1k</button>
          </div>
          <div class="row section-padding-10-0">
            <input type="text" value="newcashpoint.com/register.php?giveaway=cp_.7k" id="cp_.7k" readonly class="form-control col-9">
            <button onclick="cp7()" class="btn w-10 col-3">cp .7k</button>
          </div-->
        </div>
      </div>
      <?php //if(isset($page_title) && ($page_title=="Login" || $page_title=="Register")){ ?>
        <div class="col-12 col-lg-4">
        <div class="section-heading text-center">
          <h6>Earnings Breakdown</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">
          <!--h3>Walkthrough</h3-->
          <p>Earn <strong style="font-size: 20px;">&#8358; 3,000</strong> within a month of completing simple tasks.</p>
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
            <p>Visit the <a href='tnc.php'>Terms and conditions</a> and <a href='faq.php'>FAQ</a> page for more information</p>
          </div>
        </div>
      </div>
      <?php //} else {} ?>
    </div>
  </div>
</div>
<?php //include_once "countdown.php"; ?>