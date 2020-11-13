<?php
// display the table if the number of news retrieved was greater than zero
if($num>0){
	// make a display design ?>
	<!-- ##### Editorial Post Area Start ##### -->
	<div class="editors-pick-post-area section-padding-80-50">
	  <div class="container">
	      <!-- Science News -->
	    <div class="section-heading text-center">
	      <h6>Science News</h6>
	    </div>
	    <div class="row">

	    	<?php // loop through the news records
			  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				  extract($row); ?>
		      <div class="col-12 col-md-6 col-lg-4">
		        <!-- Single Featured Post -->
                  <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                      <a href="#"><img src="<?php echo $image; ?>" alt=""></a>
                    </div>
                    <div class="post-data">
                      <a href="#" class="post-catagory"><?php echo $source; ?></a>
                    <div class="post-meta">
                    	<a href='single-science?news-id=<?php echo $id ?>' class="post-title">
        	              <h6><?php echo $title; ?></h6>
        	            </a>
                      <p class="post-date"><span><?php echo $publishedAt; ?></span> | <span><?php echo $author; ?></span></p>
                    </div>
                  </div>
                </div>
		    </div>
		    <?php } ?>
	    </div>
	  </div>
	</div>
	<!-- ##### Editorial Post Area End ##### -->

	<?php
	// actual paging buttons
	include_once 'paging.php';
}
// tell the admin there are no news
else{	?>
	<div class="container">
		<div class="col-12 col-lg-4 text-center">
			<div class="alert alert-info alert-dismissable" role="alert">
			  No news found
			</div>
		</div>
	</div>
<?php } ?>