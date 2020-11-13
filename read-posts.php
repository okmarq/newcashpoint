<?php
// display the table if the number of posts retrieved was greater than zero
if($num>0){ ?>
	<!-- ##### Featured Post Area Start ##### -->
	<div class="featured-post-area">
	  <div class="container">
	    <div class="row">
	      <div class="col-12 col-md-6 col-lg-8">
	        <div class="row">
						<?php
						// loop through the message records
					  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						  extract($row);
						?>
							<!-- Single Featured Post -->
							<div class="col-12 col-lg-6">
						    <div class="single-blog-post featured-post">
					        <div class="post-thumb"><?php// echo $image; ?>
				            <a href="#"><img src="img/bg-img/16.jpg" alt=""></a>
					        </div>
					        <div class="post-data">
					        	<?php // the post id is $id
					        	// get topic id from post_topic table by geting them via the post id
					        	$post_topic->post_id = $id;
					        	$post_topic->readByPostId();
					        	$topic->id = $post_topic->topic_id;
					        	$topic->readName();
					        	$user->id = $user_id;
					        	$user->readName();
										?><!--?topic=<?php //echo $topic->topic_slug.'&id='.$topic->id; ?>-->
				            <a href="topics" class="post-catagory"><?php echo $topic->name; ?></a>
				            <a href="#" class="post-title">
			                <h6><?php echo $title; ?></h6>
				            </a>
				            <div class="post-meta">
			                <p class="post-author">By <a href="#"><?php echo $user->name; ?></a></p>
			                <p class="post-excerp">
			                	<a href="post?post=<?php echo $slug.'&id='.$id; ?>">
			                		<?php echo $description; ?>
		                		</a>
		                	</p>
			                <!-- Post Like & Post Comment -->
			                <div class="d-flex align-items-center">
		                    <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span><?php echo $liked; ?></span></a>
		                    <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span><?php echo $shared; ?></span></a>
			                </div>
				            </div>
					        </div>
					    	</div>
							</div>
						<?php } ?>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- ##### Featured Post Area End ##### -->
	<?php
  // actual paging buttons
  include_once 'paging.php';
} else {	?>
	<div class="container">
		<div class="col-12 col-lg-4 text-center">
			<div class="alert alert-info alert-dismissable" role="alert">
			  No post found
			</div>
		</div>
	</div>
<?php } ?>