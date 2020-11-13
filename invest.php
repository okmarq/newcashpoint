<?php
// core configuration
include_once "config/core.php";
$page_title = "Invest";
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
        <h2>INVEST</h2>
      </div>
    </div>
    <div class="row">
    	<div class="col-12 col-lg-6">
      	<h6>There're investments and there's an investment</h6>
        <p>You probably know what investments are, they come in different flavours. However, at New cashpoint, we bring to you the real kind of investment you'll probably never know about until it's gone.
        	<br>Make investment choices from companies of great repute, offering ROI that shows it's a long term investment.</p>
      </div>
      <div class="col-12 col-lg-6">
        <h6>A different class</h6>
        <p>New cashpoint is an investment platform, albeit a small and young one. No, i'm not talking about small investments neiher am I offering you new cashpoint.
        	<br>I'm talking about big investments hosted on new cashpoint, that you can and should make a choice on. The kind you think you're never getting your hands on. But, they were all once small right?</p>
      </div>
    </div>
  </div>
</section>
<!-- ##### About Area End ##### -->
<?php include_once "layout_foot.php"; ?>