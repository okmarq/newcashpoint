<?php
// core configuration
include_once "config/core.php";
// get ID of the entertainment to be read
$id = isset($_GET['news-id']) ? $_GET['news-id'] : die('ERROR: missing ID.');
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
// check if logged in as admin
// include login checker
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/entertainment.php';
include_once 'object/user.php';
include_once 'object/comment.php';
include_once 'object/reply.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$entertainment = new EntertainmentNews($db);
$user = new User($db);
$comment = new Comment($db);
$reply = new Reply($db);
// set ID property of entertainment to be read
$entertainment->id = $id;
$user->id = $user_id;
// read the details of entertainment to be read
$entertainment->readOne();
$user->readOne();
// set page title
$page_title = "Entertainment";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
if ($_POST) {
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
		if ($like->like()) {
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
		if ($share->share()) {
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
						  Sahre unsuccessful, try again
						</div>
					</div>
				</div>
			</div>';
		}
	}
}
?>
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
		          	<img src="<?php echo $entertainment->image; ?>" alt="">
		          </a>
		        </div>
		        <div class="post-data">
		          <a href="#" class="post-catagory"><?php echo $entertainment->source; ?></a>
		          <a href="#" class="post-title">
		            <h6><?php echo $entertainment->title; ?></h6>
		          </a>
		          <div class="post-meta">
		            <p class="post-author">By <a href="#"><?php echo $entertainment->author; ?></a></p>
		            <p><?php echo $entertainment->description; ?></p>
		            <a href="#" class="related--post">Related: Facebook announces changes to combat election meddling</a>
		            <p><?php echo $entertainment->content; ?></p>
		            <div class="entertainmentpaper-post-like d-flex align-items-center justify-content-between">
		              <!-- Tags -->
		              <div class="entertainmentpaper-tags d-flex">
		                <span>Tags:</span>
		                <ul class="d-flex">
		                  <li><a href="#">finacial,</a></li>
		                  <li><a href="#">politics,</a></li>
		                  <li><a href="#">stock market</a></li>
		                </ul>
		              </div>
		              <!-- Post Like & Post Comment -->
		              <div class="d-flex align-items-center post-like--comments">
		                <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
										<?php if (isset($_SESSION['user_id'])) { ?>
											<a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
										<?php } else { ?>
		                	<a href="login" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
										<?php } ?>
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
                    <button class="btn entertainmentpaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                  </div>
                </div>
              </form>
          	</div>
        	</div>
	        <!-- ##### Popular entertainment Area Start ##### -->
					<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
				    // Build POST request:
		        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
		        $recaptcha_secret = '6LdCSKYZAAAAAEeDWy792_Q1VsjzD1i6N14_qYaB';
		        $recaptcha_response = $_POST['recaptcha_response'];
		        // Make and decode POST request:
		        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
		        $recaptcha = json_decode($recaptcha);
		        // Take action based on the score returned:
		        if ($recaptcha->score >= 0.5) {
			  			if (in_array($task, $id)) {
								echo '<div class="container">
									<div class="row">
										<div class="col-12 col-lg-4 text-center">
											<div class="alert alert-info alert-dismissable" role="alert">
											  Task completed already.
											</div>
										</div>
									</div>
								</div>';
							} else {
		            if ($user->earnings_today<250) {
		              $user->cashpoints += 5;
		              $user->earnings_today += 5;
		              $user->activity_earnings += 5;
		              if($user->status == 1){
					    			$user->updateCashpoints();
									}
									if (!empty($COOKIE[$cookie_name])) {
										$task = json_decode($COOKIE[$cookie_name], true);
									}
									array_push($task, $id);
									setcookie($cookie_name, $cookie_value, time() + 86400, '/');
		              // make the form disappear
		            }
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
					<div class="popular-entertainment-area">
					  <div class="container">
					    <div class="row">
					      <div class="col-12 col-lg-5">
					        <!-- entertainmentletter Widget -->
					        <div class="entertainmentletter-widget">
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
					<!-- ##### Popular entertainment Area End ##### -->
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
					  <h5 class="title">3 Comments</h5>
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
					            <a href="#" class="post-author">Christian Williams</a>
					            <a href="#" class="post-date">April 15, 2018 | <span class="reply" style="color: red;">Reply</span></a>
					            <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
					          </div>
					        </div>
					      <div id="display" class="d-none post-a-comment-area section-padding-30">
					        <h4>Leave a reply <em>1cp</em></h4>
					          <!-- Reply Form -->
					          <div class="contact-form-area">
					        		<form action="<?php //htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					      	      <div class="row">
					                <div class="col-12">
					                  <textarea name="reply" class="form-control" id="message" cols="30" rows="10" placeholder="Reply * required" required><?php //echo isset($_POST['reply']) ? htmlspecialchars($_POST['reply'], ENT_QUOTES) : "";  ?></textarea>
					                </div>
					                <div class="col-12 text-center">
					                  <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Reply</button>
					                </div>
					              </div>
					            </form>
					      	 </div>
					      </div>
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
					              <a href="#" class="post-author">Sandy Doe</a>
					              <a href="#" class="post-date">April 15, 2018 | <span style="color: red;">Reply</span></a>
					              <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
					            </div>
					          </div>
					        </li>
					      </ol>
					    </li>
					    <!-- Single Comment Area -->
					    <li class="single_comment_area">
					      <!-- Comment Content -->
					      <div class="comment-content d-flex">
					        <!-- Comment Author -->
					        <div class="comment-author">
					          <img src="img/bg-img/32.jpg" alt="author">
					        </div>
					        <!-- Comment Meta -->
					        <div class="comment-meta">
					          <a href="#" class="post-author">Christian Williams</a>
					          <a href="#" class="post-date">April 15, 2018</a>
					          <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
					        </div>
					      </div>
					    </li>
					  </ol>
					</div>
		      <div class="post-a-comment-area section-padding-30">
		        <h4>Leave a comment <em>1cp</em></h4>
		        <!-- Reply Form -->
		        <div class="contact-form-area">
		        	<form action="<?php //htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		      	    <div class="row">
		              <div class="col-12">
		                <textarea name="comment" class="form-control" id="message" cols="30" rows="10" placeholder="Comment * required" required><?php //echo isset($_POST['comment']) ? htmlspecialchars($_POST['comment'], ENT_QUOTES) : "";  ?></textarea>
		              </div>
		              <div class="col-12 text-center">
		                <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
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