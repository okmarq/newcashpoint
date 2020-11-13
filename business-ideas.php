<?php
// core configuration
include_once "config/core.php";
$page_title = "Business Ideas";
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
        <h2>BUSINESS IDEAS</h2>
      </div>
    </div>
    <div class="row">
    	<div class="col-12 col-lg-6">
      	<h6>Two Heads</h6>
        <p>Two heads are better than one they say. At new cashpoint, we want you to take advantage of the wealth of people we have to travel farther than you have. generate, nurture and mature any idea of yours.</p>
      </div>
      <div class="col-12 col-lg-6">
        <h6>One more</h6>
        <p>Find like minds from our numerous users by posting your what you do or want to do, your vision and mission. you don't need to give specifics on the idea. Like minded people will find you.</p>
      </div>
    </div>
  </div>
</section>
<!-- ##### About Area End ##### -->
<?php include_once "layout_foot.php"; ?>