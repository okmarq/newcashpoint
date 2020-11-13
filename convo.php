<?php
// core configuration
include_once "config/core.php";
// get ID of the forum to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
// check if logged in as admin
// include login checker
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/forum.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$forum = new Forum($db);
// set ID property of forum to be read
$forum->id = $id;
// read the details of forum to be read
$forum->readOne();
// set page title
$page_title = "Conversations";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
?>
<!-- ##### Popular News Area Start ##### -->
<div class="popular-news-area section-padding-80-50">
  <div class="container">
  	<div class="row">
      <div class="col-12 col-lg-12">
      	<div class="section-heading text-center">
      		<a href="forums">
      			<h6>Read All Forums</h6>
      		</a>
	      </div>
      </div>
  	</div>
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="section-heading text-center">
          <h6><?php echo "{$forum->id}, {$forum->role}, {$forum->name}"; ?></h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget mb-30">
          <h3><?php echo "{$forum->cp}<em>cp</em>, {$forum->forumname}"; ?></h3>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Email</span><?php echo"{$forum->email}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Referred By</span><?php echo"{$forum->referred_by}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Package</span><?php echo"{$forum->package}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Mobile</span><?php echo"{$forum->mobile}"; ?></h6>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="section-heading text-center">
          <h6>More+</h6>
        </div>
        <!-- Popular News Widget -->
        <div class="popular-news-widget mb-30">
          <h3>More details</h3>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Sponsored post</span><?php echo"{$forum->sponsored_post}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Affiliate Earnings</span><?php echo"{$forum->affiliate_earnings}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Activity Earnings</span><?php echo"{$forum->activity_earnings}"; ?></h6>
            </a>
          </div>
          <!-- Single Popular Blog -->
          <div class="single-popular-post">
            <a href="#">
              <h6><span>Cash Points</span><?php echo"{$forum->cp}"; ?></h6>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Popular News Area End ##### -->
<?php
//include_once "video-area.php";
// set footer
include_once "layout_foot.php";
?>