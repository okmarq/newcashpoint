<?php
// core configuration
include_once "config/core.php";
// get ID of the user to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
// check if logged in as admin
// include login checker
$require_login=true;
$restricted = true;
$admin = true;
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
// set ID property of user to be read
$user->id = $id;
// read the details of user to be read
$user->readOne();
// set page title
$page_title = "User";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
?>
<!-- ##### Popular News Area Start ##### -->
<div class="popular-news-area section-padding-25-10">
  <div class="container">
  	<div class="row">
      <div class="col-12 col-lg-12">
      	<div class="section-heading text-center">
      		<a href="admin-dashboard">
      			<h6>Admin Dashboard</h6>
      		</a>
	      </div>
      </div>
  	</div>
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="section-heading">
          <h6><?php echo "{$user->id}, {$user->role}, {$user->username}"; ?></h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">
          <h3><?php echo "{$user->cashpoints}<em>cp</em>, {$user->name}"; ?></h3>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Email</span><?php echo"{$user->email}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Mobile</span><?php echo"{$user->mobile}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>City</span><?php echo"{$user->city}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>State</span><?php echo"{$user->state}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Status</span><?php echo"{$user->status}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Reference code</span><?php echo"{$user->ref_number}"; ?></h6>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="section-heading">
          <h6>More+</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">

          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Facebook</span><?php echo"{$user->facebook}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Twitter</span><?php echo"{$user->twitter}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Instagram</span><?php echo"{$user->instagram}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Bank</span><?php echo"{$user->bank}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Account Name</span><?php echo"{$user->acct_name}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Account Number</span><?php echo"{$user->acct_num}"; ?></h6>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="section-heading">
          <h6>More+</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">

          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Role</span><?php echo"{$user->role}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Giveaway</span><?php echo"{$user->giveaway}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Package</span><?php echo"{$user->package}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>License</span><?php echo"{$user->license}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Amount</span><?php echo"{$user->amount}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Read</span><?php echo"{$user->read}"; ?></h6>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="section-heading">
          <h6>More+</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">

          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Commented</span><?php echo"{$user->commented}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Liked</span><?php echo"{$user->liked}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Shared</span><?php echo"{$user->shared}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Sponsored</span><?php echo"{$user->sponsored}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Watched</span><?php echo"{$user->watched}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Subscribed</span><?php echo"{$user->subscribed}"; ?></h6>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="section-heading">
          <h6>More+</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">

          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Liked Video</span><?php echo"{$user->liked_video}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Shared Video</span><?php echo"{$user->shared_video}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Affiliate Earnings</span><?php echo"{$user->affiliate_earnings}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Today's Earnings</span><?php echo"{$user->earnings_today}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Activity Earnings</span><?php echo"{$user->activity_earnings}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Referred By</span><?php echo"{$user->referred_by}"; ?></h6>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="section-heading">
          <h6>More+</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget">

          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Giveaway recipient</span><?php echo"{$user->is_giveaway}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Created</span><?php echo"{$user->created}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Modified</span><?php echo"{$user->modified}"; ?></h6>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Popular News Area End ##### -->
<?php
// set footer
include_once "layout_foot.php";
?>