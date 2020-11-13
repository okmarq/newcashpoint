<?php
// core configuration
include_once "config/core.php";
$page_title = "Advertise";
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
        <h2>ADVERTISE</h2>
      </div>
    </div>
    <div class="row">
    	<div class="col-12 col-lg-6">
      	<h6>Everybody Sees, Everybody Talks</h6>
        <p>You probably know this already, but i'll let you know again just in case. Here at New cash point, we pay our users to look at anything and everything. Even that black pot with a red cloth from your village suddenly looks beautiful.
        	<br>Our users will see it when we tell them to, they get paid too right?</p>
      </div>
      <div class="col-12 col-lg-6">
        <h6>Your Ball, your Court</h6>
        <p>Do you still have that old black kettle you think someone will buy? No, the kettle, Please not the pot with the red cloth, that's just scary.
        	<br>you just might be surprised if our users who are of college age are your target market. I don't see why you can't sell that kettle to them since they all will need it probably, then the one who has the means will not talk too much, but acquire it. And that's what we want right?</p>
      </div>
    </div>
  </div>
</section>
<!-- ##### About Area End ##### -->
<?php include_once "layout_foot.php"; ?>