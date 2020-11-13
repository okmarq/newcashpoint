<?php
// core configuration
include_once "config/core.php";
// check if logged in as admin
// include login checker
$require_login=true;
$restricted = true;
$admin = true;
$agent = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/user.php';
include_once 'object/withdraw.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
$withdrawal = new Withdrawal($db);
// set page title
$page_title = "Control Room";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
$total_rows=$user->countAll();
// include users table HTML template
?>
<div class="popular-news-area section-padding-25-10">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12 text-center">
  			<div class="border border-dark rounded section-padding-0-10">
  		  	<h1>Control Room</h1>
  				<p>Giveaway spaces are limited, only a certain number available.<p/>
  				<p>If registration is unsuccessful, giveaway has ended.</p>
		    	<h4>Filling the room with relevance</h4>
					<p>Contents from reputable sources.</p>
	    		<div class="col-12 col-lg-12 text-center section-padding-10-0">
						<div class="border border-dark rounded">
						</div>
	    		</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popular-news-area">
	<div class="container">
		<div class="row">
			<?php if(isset($_SESSION['username'])&&$_SESSION['username']=='okmarq'){ ?>
				<div class="col-12 col-lg-4">
					<div class="section-heading text-center">
						<a href="api-call"><h6>Super Manager</h6></a>
					</div>
				</div>
			<?php } ?>
			<div class="col-12 col-lg-4">
				<div class="section-heading text-center">
					<a href="admins"><h6>Admins</h6></a>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<div class="section-heading text-center">
					<a href="agents"><h6>Agents</h6></a>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<div class="section-heading text-center">
					<a href="users"><h6>Users</h6></a>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<div class="section-heading text-center">
					<a href="messages"><h6>Messages</h6></a>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<div class="section-heading text-center">
					<a href="withdrawals"><h6>Withdrawals</h6></a>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<div class="section-heading text-center">
					<a href="create-post?user_id=<?php echo $_SESSION['user_id']; ?>"><h6>Publishing</h6></a>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<div class="section-heading text-center">
					<a href="topics"><h6>Categories</h6></a>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="about-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Registered</h2>
			</div>
			<!-- Single Cool Fact -->
			<div class="col-12 col-sm-6 col-lg-6">
				<div class="single-cool-fact d-flex align-items-center">
					<h3><span class="counter"><?php echo $total_rows; ?></span> users</h3>
					<div class="cf-text">
						<h6>New Cash Point</h6>
						<span>total number of users registered with us</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once "layout_foot.php"; ?>