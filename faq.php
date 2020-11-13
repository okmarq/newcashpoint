<?php
// core configuration
include_once "config/core.php";
$page_title = "Frequently Asked Questions";
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
        <h2>FREQUENTLY ASKED QESTIONS</h2>
      </div>
    </div>
    <div class="row">
    	<div class="col-12 col-lg-6">
      	<h6>How do i check my earnings?</h6>
        <p>Go to the dashboard dropdown menu then click on earnings.</p>
      </div>
      <div class="col-12 col-lg-6">
        <h6>I got a mail during withdrawal saying I am yet to share a sponsored content.</h6>
        <p>We could not find any sponsored posts on any of your provided social media handles.</p>
      </div>
      <div class="col-12 col-lg-6">
      	<h6>I lost some cashpoints.</h6>
        <p>Certain tasks are strictly monitored and checked automatically. Undoing them will have you lose cashpoints previously awarded to you.</p>
      	<p>Please note, you're not obligated to perform any tasks. However, our indefinite payment ability depends on your engagement. Refrain from undoing tasks you have previously done as most of our provided contents are paid contents. We apologize for any inconvenience we will or may have caused you. Also, we will keep working to improve your overall experience.</p>
      </div>
      <div class="col-12 col-lg-6">
        <h6>I paid an agent for a link to register, I could not register successfully.</h6>
        <p>Every link through an agent is unique. Hence, if you were unable to use it for registration, It means another user may have been previously registered with the same link. Report such case to New cashpoint immediately providing the link as well as all available details of one such agent, name/username/email, etc. We have zero-tolerance for cheats.</p>
      </div>
      <div class="col-12 col-lg-6">
      	<h6>Can you implement this feature?</h6>
        <p>Of course, in line with our mission to improve upon every user's experience. we welcome every suggestion. However we cannot promise to fulfil everyone's request. our apologies.</p>
        <p>Visit our <a href="forum">forum</a>, open a thread, the more users agree to a feature, the motivated our team is to make one such feature available.</p>
      </div>
    </div>
  </div>
</section>
<!-- ##### About Area End ##### -->
<?php include_once "layout_foot.php"; ?>