<!-- ##### Hero Area Start ##### -->
<div class="hero-area">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-8">
        <!-- Breaking News Widget -->
        <div class="breaking-news-area d-flex align-items-center">
          <div class="news-title">
            <p>Breaking News</p>
          </div>
	        <div id="breakingNewsTicker" class="ticker">
            <ul>
            	<li><a href="#">Registration and Earning is <strong>FREE</strong>.</a></li>
            	<li><a href="#">Packages are paid features,</a></li>
            	<li><a href="#">it increases cp value.</a></li>
            	<li><a href="#">Licenses are paid features,</a></li>
            	<li><a href="#">it improves earning duration.</a></li>
            	<li><a href="#">Both impact withdrawals.</a></li>
            </ul>
          </div>
        </div>

        <!-- Breaking News Widget -->
        <div class="breaking-news-area d-flex align-items-center mt-15">
          <div class="news-title title2">
            <p>Guidelines</p>
          </div>
          <div id="internationalTicker" class="ticker">
            <ul>
              <li><a href="#">On a First come, First served basis.</a></li>
              <li><a href="#">All Free for first 500 users.</a></li>
              <li><a href="#">&#8358;500 paid licensing only, for 1000 users.</a></li>
              <li><a href="#">Paid Registration, 1500 <em>cp</em>, for 1500 users.</a></li>
              <li><a href="#">Paid Registration, 1000 <em>cp</em>, for 3000 users.</a></li>
              <li><a href="#">Paid Registration, 700<em>cp</em>, for 6000 users.</a></li>
            </ul>
        	</div>
        </div>
        <!-- Breaking News Widget -->
        <!--div class="breaking-news-area d-flex align-items-center mt-15">
          <div class="news-title title2">
            <p>Giveaway</p>
          </div>
          <div id="breakingNewsTicker" class="ticker">
            <ul>
                 <li><a href="#">On a First come, First served basis for all.</a></li>
              <li><a href="#">Free registration and licensing for first 500.</a></li>
              <li><a href="#">Free registration &#8358;500 paid licensing for 1000</a></li>
              <li><a href="#">Paid Registration, 1500 <em>cp</em> for 1500</a></li>
              <li><a href="#">Paid Registration, 1000 <em>cp</em> for 3000</a></li>
              <li><a href="#">Paid Registration, 700<em>cp</em> for 6000</a></li>
            </ul>
        	</div>
        </div-->
	  	</div>
      <!-- Hero Add -->
      <div class="col-12 col-lg-4">
        <div class="hero-add">
          <a href=""><img src="img/bg-img/hero-add.gif" alt=""></a>
          <a class="twitter-share-button"
          href="https://twitter.com/intent/tweet"
          data-size="default"
          data-text="New cashpoint is an online platform that offers review services from institutions of repute to users aiming to provide a means of lucrative earning through Ads we display to them."
				  data-url="newcashpoint.com"
				  data-hashtags="newcashpoint,news,freemium"
				  data-via="newcashpoint"
				  data-related="twitterapi,twitter">Tweet</a>
				  <a href="https://twitter.com/NCashpoint?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @NCashpoint</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					<!-- Load Facebook SDK for JavaScript -->
					<div id="fb-root"></div>
		      <!-- Your share button code -->
				  <div class="fb-share-button"
				    data-href="newcashpoint.com"
				    data-layout="button_count">
				  </div>
      	</div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Hero Area End ##### -->
<div class="container">
	<div class="row">
		<div class="col-12 section-padding-10">
                <?php if(isset($_SESSION['package'])&&$_SESSION['package']!='Free'){ ?>
                <?php } ?>
                <a class="mr-30" href="create-post?user_id=<?php echo isset($_SESSION['user_id']); ?>">Click here to create Your own post and earn up to 560<em>cp</em></a>
        </div>
    </div>
</div>
<?php
$my_referer = isset($_POST['referer']) ? trim($_POST['referer']) : (isset($_SERVER['HTTP_REFERER']) ? base64_encode($_SERVER['HTTP_REFERER']) : false);
echo (isset($_SERVER['HTTP_REFERER']) ? base64_encode($_SERVER['HTTP_REFERER']) : false);
?>