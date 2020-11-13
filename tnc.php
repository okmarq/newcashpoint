<?php
// core configuration
include_once "config/core.php";
$page_title = "Terms and Conditions";
// check if logged in as admin
// include login checker
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
include_once "config/checker.php";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
?>
<!-- ##### About Area Start ##### -->
<section class="about-area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>TERMS AND CONDITIONS</h2>
      </div>
    </div>
    <div class="row">
    	<div class="col-12 col-lg-6">
      	<h6>Packages</h6>
        <p>We recommend you purchase a package to keep earning swiftly. you're automatically awarded a free license for a year when you purchase a package.</p>
        <ul>
        	<li>Bronze: <strong>&#8358; 1,000</strong></li>
        	<li>Silver: <strong>&#8358; 1,500</strong></li>
        	<li>Gold: <strong>&#8358; 5,000</strong></li>
        	<li>Platinum: <strong>&#8358; 7,500</strong></li>
        </ul>
      </div>
      <div class="col-12 col-lg-6">
        <h6>Licenses</h6>
        <p></p>
        <div class="row">
        	<div class="col-12 col-lg-6">
		        <ul>
		            <li><h6><strong>Bronze</strong></h6></li>
		        	<li>1 year: <strong>&#8358; 500</strong></li>
		        	<li>2 years: <strong>&#8358; 750</strong></li>
		        	<li>3 years: <strong>&#8358; 1,250</strong></li>
		        	<li>lifetime: <strong>&#8358; 5,000</strong></li>
		        </ul>
        	</div>
        	<div class="col-12 col-lg-6">
		        <ul>
		            <li><h6><strong>Silver</strong></h6></li>
		        	<li>1 year: <strong>&#8358; 1,000</strong></li>
		        	<li>2 years: <strong>&#8358; 1,500</strong></li>
		        	<li>3 years: <strong>&#8358; 2,500</strong></li>
		        	<li>lifetime: <strong>&#8358; 10,000</strong></li>
		        </ul>
        	</div>
        	<div class="col-12 col-lg-6">
		        <ul>
		            <li><h6><strong>Gold</strong></h6></li>
		        	<li>1 year: <strong>&#8358; 3,000</strong></li>
		        	<li>2 years: <strong>&#8358; 4,500</strong></li>
		        	<li>3 years: <strong>&#8358; 7,500</strong></li>
		        	<li>lifetime: <strong>&#8358; 31,000</strong></li>
		        </ul>
        	</div>
        	<div class="col-12 col-lg-6">
		        <ul>
		            <li><h6><strong>Platinum</strong></h6></li>
		        	<li>1 year: <strong>&#8358; 5,000</strong></li>
		        	<li>2 years: <strong>&#8358; 7,500</strong></li>
		        	<li>3 years: <strong>&#8358; 12,500</strong></li>
		        	<li>lifetime: <strong>&#8358; 51,000</strong></li>
		        </ul>
        	</div>
        </div>
      </div>
	<!--div class="col-12 col-lg-6">
      	<h6>Earnings</h6>
        <p>A minimum of 10,000cp or its equivalent is required for a user to be eligible for withdrawals. Your final payout is dependent on the type of package purchased.</p>
      </div-->
      <div class="col-12 col-lg-6">
        <h6>Earnings, Referrals and Services</h6>
        <p>A minimum of 10,000cp or its equivalent is required for a user to be eligible for withdrawals. Your final payout is dependent on the type of package purchased.</p>
        <p>Agents looking to earn from our review services are free to do so. Your payment is a certain percentage of commission and in actual cash value. Also, it is dependent on the user purchasing a package.</p>
        <p>We generate revenue through Ads displayed on our pages. Note that users are paid for daily activities performed. The initial payment made is for the services we render to the user of which subsequent activities will cause them to earn more from New cashpoint.</p>
      </div>
      <div class="col-12 col-lg-6">
      	<h6>Monitoring, Provided and Sponsored Content</h6>
        <p>Our provided content is paid for and gotten from sources of great repute. We urge you to show support by dealing honestly with us. Not all of our contents are strictly monitored. <br>Revoked tasks will have its cashpoints taken if its content is strictly monitored.</p>
      	<p>We have decided not to associate any additional cashpoint deduction to show our respect to you. However, be advised we may have this implemented should it become rampant.</p>
      </div>
      <div class="col-12 col-lg-6">
        <h6>Registration and Login</h6>
        <p>We currently offer 500cp for every registration. we will increase this number in the future along with introductions of other features that all users will benefit from.</p>
        <p>Every login after 24 hours will attract 50cp. Be advised, once signed in, don't sign out and in intermittently in hopes to game the system. it is a waste of your time to accumulate points. Again, we decided not to set up penalties of any kind to ensure your earnings don't become a hassle or forced ordeal. we trust and respect you, please respect our system.</p>
      </div>
      <div class="col-12 col-lg-6">
      	<h6>Free package user</h6>
        <p>While registration is free, we strongly advise against it as you will have to spend more time to realize 1000% to make the usual withdrawals.</p>
        <p>Upon package purchase, you are allowed access up to 30% of withdrawals made or previous cashpoints upon purchase.</p>
      </div>
      <div class="col-12 col-lg-6">
        <h6>Paid package user</h6>
        <p>Following the expiration of your license and validity period also known as grace-period, you can opt to upgrade your existing package which comes with a free license for up to a year or, purchase another license in the current package category.</p>
        <p>You are allowed up to 5 business days to renew your license during the grace period, after which sanctions will be placed on your account. Access up to 30% of withdrawals or cashpoints upon renewal.</p>
      </div>
      <div class="col-12 col-lg-6">
      	<h6>Users</h6>
        <p>We seek always to provide a convenient platform for our users. We offer services that will improve your experience and our position. Every user is entitled to only one account, other accounts when found will be blocked.</p>
        <p>We implore you to deal with New cashpoint sincerely as any perceived deception will warrant suspension of the account, seizure of cashpoints, including but not limited to the closure of the account.</p>
      </div>
      <div class="col-12 col-lg-6">
        <h6>Agents</h6>
        <p>Agents are by extension a part of New cashpoint. Any and all suggestions are welcomed, and subject to approval. While we do not monitor our agents, we seek adherence to honesty, integrity, and responsibility in all dealings with actual and potential users of a New cashpoint.</p>
        <p>As an agent of New cash point, you are liable to any misunderstanding your referred user may have with New cashpoint including but not limited to failed registration that a user has paid for. In such cases, we assume the user must have first approached you for restitution.</p>
      </div>
      <div class="col-12 col-lg-6">
      	<h6>Agents</h6>
        <p>Following cases of user mismanagement. Agents are to comply with one such user before our involvement. Failure to do so will threaten our fragile reputation and as such we are not obligated to accept any responsibility for you. Also, you cease to be an agent of New cashpoint, not limited to legal actions that may be taken against you if such is warranted by the user.</p>
        <strong>LINKS GIVEN TO AGENTS ARE PREREGISTERED AND SHOULD NOT ALTHOUGH CANNOT BE USED AGAIN. SHOULD WE RECEIVE A REPORT OF ANY SUCH CASE AS ILLUSTRATED, WE ARE OF A MIND YOU INTEND TO REPLACE AN EXISTING USER WITH A NEW USER, EFFECTIVELY DAMAGING OUR SYSTEM AND FRAGILE REPUTATION. WE DO NOT FORGIVE ANY SUCH BEHAVIOUR, BE ADVISED.</strong>
      </div>
      <div class="col-12 col-lg-6">
      	<h6>Security</h6>
        <p>New cashpoint are always on the lookout for security leaks to patch. We do apologize in advance, cashpoints earned from exploitation of security loopholes will be recovered from any such user without notice.</p>
      </div>
      <!--div class="col-12 col-lg-6">
      </div-->
    </div>
  </div>
</section>
<!-- ##### About Area End ##### -->
<?php include_once "layout_foot.php"; ?>