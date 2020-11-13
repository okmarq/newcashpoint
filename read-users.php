<?php
$require_login=true;
$restricted = true;
$admin = true;
$agent = false;
// display the table if the number of users retrieved was greater than zero
if($num>0){
	// make a display design
	?>
	<!-- ##### Popular News Area Start ##### -->
	<div class="popular-news-area section-padding-25-10">
	  <div class="container">
	    <div class="row">
	      <div class="col-12 col-lg-12">
	        <div class="section-heading text-center">
          	<a href="admin-dashboard"><h6>Admin Dashboard</h6></a>
	        </div>
				</div>
					<?php
					// loop through the user records
				  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					  extract($row);
						?>
					<div class="col-12 col-lg-4">
		        <!-- Popular News Widget -->
		        <div class="popular-news-widget">
	          	<h3><?php echo "{$username} {$cashpoints}<em>cp</em>"; ?>
	          		<a class="btn-block btn-lg" href='read-user?id=<?php echo "{$id}";?>'>Read user</a>
	          	</h3>
		          <!-- Single Popular Blog -->
		          <div class="single-popular-post">
		            <a href="#">
		              <h6><span>Name</span> <?php echo"{$name}"; ?></h6>
		            </a>
		          </div>
		          <!-- Single Popular Blog -->
		          <div class="single-popular-post">
		            <a href="#">
		              <h6><span>Email</span><?php echo"{$email}"; ?></h6>
		            </a>
		          </div>
		          <!-- Single Popular Blog -->
		          <div class="single-popular-post">
		            <a href="#">
		              <h6><span>Earnings Today</span> <?php echo"{$earnings_today}"; ?></h6>
		            </a>
		          </div>
		          <!-- Single Popular Blog -->
		          <div class="single-popular-post">
		            <a href="#">
		              <h6><span>Package</span><?php echo"{$package}"; ?></h6>
		            </a>
		          </div>
		          <!-- Single Popular Blog -->
		          <div class="single-popular-post">
		            <a href="#">
		              <h6><span>License</span><?php echo"{$license}"; ?></h6>
		            </a>
		          </div>
		          <!-- Single Popular Blog -->
		          <div class="single-popular-post">
		            <a href="#">
		              <h6><span>Reference Number</span><?php echo"{$ref_number}"; ?></h6>
		            </a>
		          </div>
		        </div>
		      </div>
				<?php } ?>
	    </div>
	  </div>
	</div>
	<!-- ##### Popular News Area End ##### -->
	<?php
  //$page_url="admin-dashboard?";
  // actual paging buttons
  include_once 'paging.php';
}
// tell the admin there are no users
else{	?>
	<div class="container">
		<div class="col-12 col-lg-4 text-center">
			<div class="alert alert-info alert-dismissable" role="alert">
			  No user found
			</div>
		</div>
	</div>
<?php } ?>