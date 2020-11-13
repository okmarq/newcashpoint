<?php
// core configuration
include_once "config/core.php";
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
// get ID of the post to be read
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
// check if logged in as admin
// include login checker
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
$visited = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/user.php';
include_once 'object/post.php';
include_once 'object/reply.php';
include_once 'object/topic.php';
include_once 'object/comment.php';
include_once 'object/post_topic.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
$post = new Post($db);
$reply = new Reply($db);
$topic = new Topic($db);
$comment = new Comment($db);
$post_topic = new PostTopic($db);
if ($visited){

}
// set ID property of post to be read
$post->id = $id;
$post->readOne();
$user->id = $post->user_id;
$user->readName();
$post_topic->post_id = $id;
$post_topic->readByPostId();
$post_topic->topic_id;
$topic->id = $post_topic->topic_id;
$topic->readName();
if (isset($_POST['unpublish'])) {
	$post->published = 0;
	$post->publisher();
	exit();
}
// set page title
$page_title = "Post";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
if (isset($_POST)) {
	if (isset($_POST['comment'])) {
		$comment->user_id=$user_id;
		$comment->post_id=$id;
		$comment->comment=$_POST['comment'];
		if ($comment->comment()) {
			// increase user comment number by 1
			if ($user->earnings_today<250) {
        $user->cashpoints += 1;
        $user->earnings_today += 1;
        $user->activity_earnings += 1;
        if($user->status == 1){
			    $user->updateCashpoints();
				}
			}
		} else {
			echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">
						  Unable to create comment, try again
						</div>
					</div>
				</div>
			</div>';
		}
	}
	elseif (isset($_POST['reply'])) {
		$reply->user_id=$user_id;
		$reply->comment_id=$comment->id;
		$reply->reply=$_POST['reply'];
		if ($reply->reply()) {
			if ($user->earnings_today<250) {
        $user->cashpoints += 1;
        $user->earnings_today += 1;
        $user->activity_earnings += 1;
        if($user->status == 1){
			    $user->updateCashpoints();
				}
			}
		} else {
			echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">
						  Unable to create comment, try again
						</div>
					</div>
				</div>
			</div>';
		}
	}
	elseif (isset($_POST['like'])) {
		$user->liked+=1;
		if ($user->like()) {
			if ($user->earnings_today<250) {
        $user->cashpoints += 1;
        $user->earnings_today += 1;
        $user->activity_earnings += 1;
        if($user->status == 1){
			    $user->updateCashpoints();
				}
			}
		} else {
			echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">
						  Like unsuccessful, try again
						</div>
					</div>
				</div>
			</div>';
		}
	}
	elseif (isset($_POST['share'])) {
		$user->shared+=1;
		if ($user->share()) {
			if ($user->earnings_today<250) {
        $user->cashpoints += 3;
        $user->earnings_today += 3;
        $user->activity_earnings += 3;
        if($user->status == 1){
			    $user->updateCashpoints();
				}
			}
		} else {
			echo '<div class="container">
				<div class="row">
					<div class="col-12 col-lg-4 text-center">
						<div class="alert alert-info alert-dismissable" role="alert">
						  Sahre unsuccessful, try again
						</div>
					</div>
				</div>
			</div>';
		}
	}
}
?>
<!-- Tags -->
<div class="container">
	<div class="row">
		<div class="col-12 section-padding-10">
<?php if(isset($_SESSION['user_id'])){ ?>
	<a class="mr-30" href="create-post?user_id=<?php echo $_SESSION['user_id']; ?>">Create</a>
<?php } ?>
<?php if(isset($_SESSION['username'])&&$_SESSION['username']=='okmarq'){ ?>
    <a class="mr-30" href="create-post?id=<?php echo $id; ?>">Edit</a>
    <a class="mr-30" href="#">Delete</a>
<?php } ?>
<?php if(isset($_SESSION['role'])&&$_SESSION['role']=='Admin'){ ?>
    <a class="mr-30" href='' id="unpublish">Unpublish</a>
    <span class="text-center"><strong id="msg"></strong></span>
<?php } ?>
		</div>
	</div>
</div>
<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
	<div class="container">
		<div class="row">
		  <div class="col-12 col-lg-8">
		    <div class="blog-posts-area">
		      <!-- Single Featured Post -->
		      <div class="single-blog-post featured-post single-post">
		        <div class="post-thumb">
		          <a href="#">
		          	<img src="<?php echo $post->image; ?>" alt="">
		          </a>
		        </div>
		        <div class="post-data">
		          <a href="topic?topic=<?php echo $topic->topic_slug.'&id='.$topic->id; ?>" class="post-catagory"><?php echo $topic->name; ?></a>
		          <a href="#" class="post-title">
		            <h6><?php echo $post->title; ?></h6>
		          </a>
		          <div class="post-meta">
		            <p class="post-author">By <a href="#"><?php echo $user->name; ?></a></p>
		            <p><?php echo $post->description; ?></p>
		            <a href="#" class="related--post">Related: Facebook announces changes to combat election meddling</a>
		            <p><?php echo $post->content; ?></p>
		            <div class="postpaper-post-like align-items-center justify-content-between">
		              <!-- Tags -->
		              <div class="postpaper-tags d-flex section-padding-0-10">
		                <span>Tags:</span>
		                <ul class="d-flex">
		                  <li><a href="#">finacial,</a></li>
		                  <li><a href="#">politics,</a></li>
		                  <li><a href="#">stock market</a></li>
		                </ul>
		              </div>
		              <!-- replace the chat png with an eye png for view -->
		              <!-- replace the chat png with an broadcast png for share -->
		              <!-- Post Like & Post Comment -->
		              <div class="d-flex align-items-center post-like--comments">
		              	<!-- Post Like & Post Comment -->
		                <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span><?php echo $post->liked; ?></span></a>
										<?php if (isset($_SESSION['user_id'])) { ?>
											<a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span><?php echo 10; ?></span></a>
										<?php } else { ?>
		                	<a href="login.php" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span><?php echo 10; ?></span></a>
										<?php } ?>
										<!-- on visit to the page increment the post view by 1 -->
										<!-- on click share dropdown various social media platform to share then on accept increment the share post by 1 -->
		                <a href="#" class="post-comment"><img src="img/core-img/like.png" alt=""> <span><?php echo $post->views; ?></span></a>
										<a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span><?php echo $post->shared; ?></span></a>
		              </div>
		          	</div>
		      		</div>
		  			</div>
					</div>
					<div id="comment" class="post-a-comment-area section-padding-0-30 d-none">
            <h4>Leave a comment <em>1cp</em></h4>
            <!-- Reply Form -->
            <div class="contact-form-area">
            	<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          	    <div class="row">
                  <div class="col-12">
                    <textarea name="comment" class="form-control" id="message" cols="30" rows="10" placeholder="Comment * required" required><?php echo isset($_POST['comment']) ? htmlspecialchars($_POST['comment'], ENT_QUOTES) : "";  ?></textarea>
                  </div>
                  <div class="col-12 text-center">
                    <button class="btn newspaper-btn mt-30 w-100" type="button">Submit Comment</button>
                  </div>
                </div>
              </form>
          	</div>
        	</div>
	        <!-- ##### Popular post Area Start ##### -->
					<?php
					$cookie_name = 'task';
					$task = array();
					$cookie_value = json_encode($task);
					if (!isset($_COOKIE[$cookie_name])) {
						setcookie($cookie_name, $cookie_value, time() + 86400, '/');
					}
					if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
				    // Build POST request:
		        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
		        $recaptcha_secret = '6LdCSKYZAAAAAEeDWy792_Q1VsjzD1i6N14_qYaB';
		        $recaptcha_response = $_POST['recaptcha_response'];
		        // Make and decode POST request:
		        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
		        $recaptcha = json_decode($recaptcha);
		        // Take action based on the score returned:
		        if ($recaptcha->score >= 0.5) {
							if (!empty($_COOKIE[$cookie_name])) {
								$task = json_decode($_COOKIE[$cookie_name]);
							}
							if (isset($_COOKIE[$cookie_name])&&!in_array($id, json_decode($_COOKIE[$cookie_name]))) {
								array_push($task, $id);
								$cookie_value = json_encode($task);
								setcookie($cookie_name, $cookie_value, time() + 86400, '/');
							  if ($user->earnings_today<250) {
							    $user->cashpoints += 5;
							    $user->earnings_today += 5;
							    $user->activity_earnings += 5;
							    if($user->status == 1){
										$user->updateCashpoints();
									}
							    // make the form disappear using anonymous function in php or js
							  }
							} elseif (isset($_COOKIE[$cookie_name])&&in_array($id, json_decode($_COOKIE[$cookie_name]))) {
								echo '<div class="container">
									<div class="row">
										<div class="col-12 col-lg-4 text-center">
											<div class="alert alert-info alert-dismissable" role="alert">
											  Task completed already.
											</div>
										</div>
									</div>
								</div>';
							}
		        } else {
		    	    echo '<div class="container">
		    				<div class="row">
		    					<div class="col-12 col-lg-4 text-center">
		    						<div class="alert alert-info alert-dismissable" role="alert">
		    							Verification failed. Redo task.
		    						</div>
		    					</div>
		    				</div>
		    			</div>';
		        }
					} ?>
					<div class="popular-post-area">
					  <div class="container">
					    <div class="row">
					      <div class="col-12 col-lg-5">
					        <!-- postletter Widget -->
					        <div class="newsletter-widget">
					          <h4>Get Cashpoints</h4>
					          <form id="solve" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
					            <input type="hidden" name="done">
					            <button type="submit" class="btn w-100">Collect 5 <em>cp</em></button>
					            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
					          </form>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- ##### Popular post Area End ##### -->
		    	<div class="pager d-flex align-items-center justify-content-between">
		      	<div class="prev">
		        	<a href="" class="active"><i class="fa fa-angle-left"></i> previous</a>
		      	</div>
		      	<div class="next">
		        	<a href="">Next <i class="fa fa-angle-right"></i></a>
		      	</div>
		    	</div>
					<!-- Comment Area Start -->
					<div class="comment_area clearfix">
						<?php $total_row = $comment_rows = $comment->countAll() + $reply_rows = $reply->countAll(); ?>
					  <h5 class="title"><?php echo$total_row.' Comment'.$s=($total_row>1)?'s':'';?></h5>
				    <ol>
				      <!-- Single Comment Area -->
				      <li class="single_comment_area">
				        <!-- Comment Content -->
				        <div class="comment-content d-flex">
				          <!-- Comment Author -->
				          <div class="comment-author">
				            <img src="img/bg-img/30.jpg" alt="author">
				          </div>
				          <!-- Comment Meta -->
				          <div class="comment-meta">
<?php // relies on post_id
$comment->post_id=$id;
$stmt = $comment->read();
while ($row_comment = $stmt->fetch(PDO::FETCH_ASSOC)) {
	extract($row_comment);
	$user->id = $user_id;
	$user->readName(); ?>
				            <a href="#" class="post-author"><?php echo $user->name; ?></a>
				            <a href="#" class="post-date"><?php echo $created; ?> <!-- April 15, 2018 --> | <span id="post_comment" style="color: red;">Reply</span></a>
				            <p><?php echo $comment; ?></p>
				          </div>
				        </div>
				        <div id="show" class="d-none"></div>
					      <ol class="children">
					        <li class="single_comment_area">
					          <!-- Comment Content -->
					          <div class="comment-content d-flex">
					            <!-- Comment Author -->
					            <div class="comment-author">
					              <img src="img/bg-img/31.jpg" alt="author">
					            </div>
					            <!-- Comment Meta -->
					            <div class="comment-meta">
<?php //relies on comment_id
	$reply->comment_id = $id;
	$stmt1 = $reply->read();
	while ($row_reply = $stmt1->fetch(PDO::FETCH_ASSOC)) {
		extract($row_reply);
		$user->id = $user_id;
		$user->readName(); ?>
					              <a href="#" class="post-author"><?php echo $user->name; ?></a>
					              <a href="#" class="post-date"><?php echo $created; ?> <!-- April 15, 2018 --> | <span id="post_reply" style="color: red;">Reply</span></a>
					              <p><?php echo $reply; ?></p>
<?php } } ?>
					            </div>
					          </div>
			              <div id="show_reply" class="d-none"></div>
					        </li>
					      </ol>
					    </li>
					  </ol>
					</div>

		      <div class="post-a-comment-area">
		        <h4>Leave a comment <em>1cp</em></h4>
		        <!-- Reply Form -->
		        <div class="contact-form-area">
		        	<form action="<?php //htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		      	    <div class="row">
		              <div class="col-12">
		                <textarea name="comment" class="form-control" id="message" cols="30" rows="10" placeholder="Comment * required" required><?php //echo isset($_POST['comment']) ? htmlspecialchars($_POST['comment'], ENT_QUOTES) : "";  ?></textarea>
		              </div>
		              <div class="col-12 text-center">
		                <button class="btn newspaper-btn mt-15 w-100" type="submit">Submit Comment</button>
		              </div>
		            </div>
		          </form>
		      	</div>
		    	</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ##### Blog Area End ##### -->
<?php
//include_once "video-area.php";
include_once "layout_foot.php";
?>