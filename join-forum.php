<?php if($num > 0){ ?>
<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="blog-sidebar-area">
          <!-- Latest Posts Widget -->
          <div class="latest-posts-widget mb-50">
            <!-- Single Featured Post -->
            <div class="single-blog-post small-featured-post d-flex">
            	<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            		extract($row); ?>
	              <div class="post-thumb">
	                <a href="#"><img src="<?php echo "img/bg-img/19.jpg"; ?>" alt=""></a>
	              </div>
	              <div class="post-data">
	                <a href="#" class="post-catagory"><?php echo "Finance"; ?></a>
	                <div class="post-meta">
	                  <a href="#" class="post-title">
	                    <h6><?php echo "Pellentesque mattis arcu massa, nec fringilla turpis eleifend id."; ?></h6>
	                  </a>
	                  <p class="post-date"><span><?php echo "7:00 AM</span> | <span>April 14</span>"; ?><a href="forum?id=<?php echo "{$id}"; ?>">Join | | Forum</a></p>
	                </div>
	              </div>
              <?php } ?>
            </div>
          </div>
          <!-- Latest Comments Widget -->
          <div class="latest-comments-widget">
            <h3>New cashpoint and Sound 5</h3>
            <!-- Single Comments -->
            <div class="single-comments d-flex">
              <div class="comments-thumbnail mr-15">
                <img src="img/bg-img/29.jpg" alt="">
              </div>
              <div class="comments-text">
                <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                <p>06:34 am, April 14, 2018</p>
              </div>
            </div>
            <!-- Single Comments -->
            <div class="single-comments d-flex">
              <div class="comments-thumbnail mr-15">
                <img src="img/bg-img/30.jpg" alt="">
              </div>
              <div class="comments-text">
                <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                <p>06:34 am, April 14, 2018</p>
              </div>
            </div>
            <!-- Single Comments -->
            <div class="single-comments d-flex">
              <div class="comments-thumbnail mr-15">
                <img src="img/bg-img/31.jpg" alt="">
              </div>
              <div class="comments-text">
                <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                <p>06:34 am, April 14, 2018</p>
              </div>
            </div>
            <!-- Single Comments -->
            <div class="single-comments d-flex">
              <div class="comments-thumbnail mr-15">
                <img src="img/bg-img/32.jpg" alt="">
              </div>
              <div class="comments-text">
                <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                <p>06:34 am, April 14, 2018</p>
              </div>
            </div>
          </div>

        </div>
		  </div>
		</div>
  </div>
</div>
<!-- ##### Blog Area End ##### -->
<?php
include_once 'paging.php';
} else {	?>
	<div class="container">
		<div class="col-12 col-lg-4 text-center">
			<div class="alert alert-info alert-dismissable" role="alert">
			  No Conversations found
			</div>
		</div>
	</div>
<?php } ?>