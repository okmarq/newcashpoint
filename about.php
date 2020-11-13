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
$page_title = "About";
include_once "layout_head.php";
include_once "navigation.php";
?>
<!-- ##### About Area Start ##### -->
<section class="about-area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>About New cash point</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6">
        <p>New cashpoint is a legitimate review website offering a wide range of services, monetized for your benefit. We offer opportunities to individuals and businesses alike, including but not limited to monetization of curated content, advertising, publicity, information rendering among others.</p>
        <p>Our website is designed to be mobile-first and highly responsive. We've taken digital advertisements to a whole nother level. Offering unintrusive yet larger advert placeholders along with ample space for entities to bid for a special display of their contents.</p>
      </div>
      <div class="col-12 col-lg-6">
        <p>While registration is free, to become an earning member is not entirely free. The reason is some of our acquired content was paid for which is shown in its design, to improve upon our user experience. Something we will continue to do and thus we ask for your continued support in the form of honesty and integrity as you interact with our services.</p>
        <p>A service fee starting at &#8358; 1000 is required to have you verified. Should you decide to hold off payment of the service charge, while you can still use our service to generate income, we will give only a small percentage of your total earnings pending when you become an active and verified member unless otherwise stated in special cases. more information at our terms and conditions <a href="tnc">page</a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h2>A Legitimate and Professional team</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6">
        <p>Marquis is the Founder and Chief executive Officer at <a href="newcashpoint.com">newcashpoint.com</a>. As one of the sound 5, he's developed, designed, and implemented all services of a new cashpoint.</p>
        <p>All members have equally contributed to the development of new cashpoint and are key contributors. Going forward, more features and services will be developed, designed, and implemented to improve the user experience.</p>
      </div>
      <div class="col-12 col-lg-6">
        <p>New cashpoint is an online platform that offers review services including but not limited to <a href="business">news review</a> from institutions of repute among others to users while aiming to provide a means for the same users to earn lucratively.</p>
        <p>New cashpoint is not a get rich quick scheme rather a social revenue sharing website, earned from Ads we display for users to interact with. Members of Newcashpoint are driven by honesty, integrity and responsibility. A standard we have set, strove to meet and improved upon at every moment, on and off the platform.</p>
      </div>
      <!--New cashpoint is an online platform that offers review services from institutions of repute to users aiming to provide a means of lucrative earning through Ads we display to them.

      Facebook Giveaway:
      It's our opening giveaway.
			Share it with your friends.
			If you can laugh together then you can get a bank alert together.

			instagram:
			name: New cashpoint
			user: in_cashpoint
			Bio: New cashpoint is an online platform that offers review services from institutions of repute to users aiming to provide a means of lucrative earning.-->
    </div>
    <!--div class="row align-items-center mt-80">
      <!- Single Cool Fact ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter">0</span>K</h3>
          <div class="cf-text">
            <h6>Users</h6>
            <span>Number of users acquired thus far</span>
          </div>
        </div>
      </div>
      <!- Single Cool Fact ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter">0</span>K</h3>
          <div class="cf-text">
            <h6>Agents</h6>
            <span>Number of agents acquired thus far</span>
          </div>
        </div>
      </div>
      <!- Single Cool Fact ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter">0</span>M</h3>
          <div class="cf-text">
            <h6>Withdrawn</h6>
            <span>Total amount users have withdrawn thus far</span>
          </div>
        </div>
      </div>
      <!- Single Cool Fact ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-cool-fact d-flex align-items-center">
          <h3><span class="counter">0</span></h3>
          <div class="cf-text">
            <h6>Years Old</h6>
            <span>around since July 2020</span>
          </div>
        </div>
      </div>
    </div-->
  </div>
</section>
<!-- ##### About Area End ##### -->
<!-- ##### Team Area Start ##### ->
<section class="newspaper-team mb-30">
  <div class="container">
    <div class="row">
      <!- Single Team Member ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-team-member">
          <img src="img/bg-img/t1.jpg" alt="">
          <div class="team-info">
            <h5>Marquis Julius</h5>
            <h6>S-Admin</h6>
          </div>
        </div>
      </div>
      <!- Single Team Member ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-team-member">
          <img src="img/bg-img/t3.jpg" alt="">
          <div class="team-info">
            <h5>Kings Dormund</h5>
            <h6>Admin</h6>
          </div>
        </div>
      </div>
      <!- Single Team Member ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-team-member">
          <img src="img/bg-img/t2.jpg" alt="">
          <div class="team-info">
            <h5>Osayomore Kingsley</h5>
            <h6>Admin</h6>
          </div>
        </div>
      </div>
      <!- Single Team Member ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-team-member">
          <img src="img/bg-img/t4.jpg" alt="">
          <div class="team-info">
            <h5>Betini Duncan</h5>
            <h6>Admin</h6>
          </div>
        </div>
      </div>
      <!- Single Team Member ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-team-member">
          <img src="img/bg-img/t5.jpg" alt="">
          <div class="team-info">
            <h5>Marvelous Okoromi</h5>
            <h6>Admin</h6>
          </div>
        </div>
      </div>
      <!- Single Team Member ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-team-member">
          <img src="img/bg-img/t6.jpg" alt="">
          <div class="team-info">
            <h5>Christinne Smith</h5>
            <h6>S-Agent</h6>
          </div>
        </div>
      </div>
      <!- Single Team Member ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-team-member">
          <img src="img/bg-img/t7.jpg" alt="">
          <div class="team-info">
            <h5>Alicia Dormund</h5>
            <h6>S-Agent</h6>
          </div>
        </div>
      </div>
      <!- Single Team Member ->
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="single-team-member">
          <img src="img/bg-img/t8.jpg" alt="">
          <div class="team-info">
            <h5>Steve Duncan</h5>
            <h6>Agent</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!- ##### Team Area End ##### -->
<?php
//include_once "ad_foot.inc";
include_once "layout_foot.php";
?>