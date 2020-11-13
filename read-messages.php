<?php
$require_login=true;
$restricted = true;
$admin = true;
$agent = false;
// display the table if the number of users retrieved was greater than zero
if($num>0){
	// make a display design
	?>
	<!-- ##### Blog Area Start ##### -->
	<div class="blog-area section-padding-0-80">
	  <div class="container">
	    <div class="row">
	    	<div class="col-12 col-lg-12">
	        <div class="section-heading text-center">
	        	<a href="admin-dashboard">
		          <h6>Read Messages</h6>
		        </a>
	        </div>
				</div>
				<?php
				// loop through the user records
			  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				  extract($row);
					?>
		      <div class="col-12 col-lg-12">
		        <div class="blog-posts-area">
		          <!-- About Author -->
		          <div class="blog-post-author d-flex">
		            <div class="author-thumbnail">
		              <img src="img/bg-img/32.jpg" alt="">
		            </div>
		            <div class="author-info">
		              <a class="author-name"><span>Received <?php echo "{$sent}"; ?></span></a>
		              <a delete-id='<?php echo "{$id}"; ?>' class="delete-message author-name"><span>Delete</span> <i class="fa fa-angle-right"></i></a>
		            </div>
			          <div class="post-a-comment-area">
			            <!-- Reply Form -->
			            <div class="contact-form-area">
			              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
			                <div class="row">
			                	<div class="col-12 col-lg-12">
			                    <input type="text" name="id" class="form-control d-none" placeholder="<?php echo "{$id}"; ?>" readonly>
			                  </div>
			                  <div class="col-12 col-lg-6">
			                    <input type="text" class="form-control" placeholder="<?php echo "{$name}"; ?>" readonly>
			                  </div>
			                  <div class="col-12 col-lg-6">
			                    <input type="email" class="form-control" placeholder="<?php echo "{$email}"; ?>" readonly>
			                  </div>
			                  <div class="col-12">
			                    <input type="text" class="form-control" placeholder="<?php echo "Re: {$subject}"; ?>" readonly>
			                  </div>
			                  <div class="col-12">
			                    <input type="text" class="form-control" placeholder="<?php echo "{$message}"; ?>" readonly>
			                  </div>
			                  <div class="col-12">
			                    <textarea name="reply" class="form-control" cols="30" rows="10" placeholder="Reply" required><?php echo isset($_POST['reply']) ? htmlspecialchars($_POST['reply'], ENT_QUOTES) : "{$reply}";  ?></textarea>
			                  </div>
			                  <div class="col-12 text-center">
			                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Reply Message</button>
			                  </div>
			                </div>
			              </form>
			            </div>
			        	</div>
		          </div>
		        </div>
		      </div>
				<?php } ?>
	    </div>
	  </div>
	</div>
	<!-- ##### Blog Area End ##### -->
	<?php
  // actual paging buttons
  include_once 'paging.php';
}
// tell the admin there are no users
else{	?>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 text-center">
				<div class="alert alert-info alert-dismissable" role="alert">
				  No message found
				</div>
			</div>
		</div>
	</div>
<?php } ?>