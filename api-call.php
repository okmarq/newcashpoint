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
// set page title
include_once 'config/database.php';
include_once 'object/user.php';
include_once 'object/business.php';
include_once 'object/entertainment.php';
include_once 'object/health.php';
include_once 'object/news.php';
include_once 'object/science.php';
include_once 'object/sport.php';
include_once 'object/technology.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
$business = new BusinessNews($db);
$entertainment = new EntertainmentNews($db);
$health = new HealthNews($db);
$news = new News($db);
$science = new ScienceNews($db);
$sport = new SportNews($db);
$technology = new TechnologyNews($db);
$gift = false;
if ($gift) {
	switch ($_GET['giveaway']) {
		case 'All_free':
			$user->giveaway = 'All_free';
		  $user->package = 'Bronze';
		  $user->license = '1 year';
		  $user->cashpoints = 0;
		  $user->activity_earnings = 0;
			$user->setGiveaway();
			break;
		case 'Reg_free':
			$user->giveaway = 'Reg_free';
		  $user->package = 'Bronze';
		  $user->license = 'Unlicensed';
		  $user->cashpoints = 0;
		  $user->activity_earnings = 0;
			$user->setGiveaway();
			break;
		case 'cp_1.5k':
			$user->giveaway = 'cp_1.5k';
		  $user->package = 'Free';
		  $user->license = 'Unlicensed';
		  $user->cashpoints = 1500;
			$user->activity_earnings = 1500;
			$user->setGiveaway();
			break;
		case 'cp_1k':
			$user->giveaway = 'cp_1k';
		  $user->package = 'Free';
		  $user->license = 'Unlicensed';
		  $user->cashpoints = 1000;
			$user->activity_earnings = 1000;
			$user->setGiveaway();
			break;
		case 'cp_.7k':
			$user->giveaway = 'cp_.7k';
		  $user->package = 'Free';
		  $user->license = 'Unlicensed';
		  $user->cashpoints = 700;
			$user->activity_earnings = 700;
			$user->setGiveaway();
			break;
		default:
			break;
	}
}
$putNews=false;
if($putNews && $_GET['news-api']){
  //switch(isset($_GET['news-api'])&&$_GET['news-api']){
    // 'business':
      $business->putNews();
      //break;
    //case 'entertainment':
      $entertainment->putNews();
      //break;
    //case 'health':
      $health->putNews();
      //break;
    //case 'news':
      $news->putNews();
      //break;
    //case 'science':
      $science->putNews();
      //break;
    //case 'sport':
      $sport->putNews();
      //break;
    //case 'technology':
      $technology->putNews();
      //break;
    //default:
	  //break;
  //}
}
$page_title = "Super Admin";
include_once "layout_head.php";
include_once "navigation.php";
//include_once "hero-area.php";
?>
<div class="popular-news-area section-padding-25-10">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12 text-center">
        <?php if(isset($_SESSION['username'])&&$_SESSION['username']=='okmarq'){ ?>
					<div class="border border-dark rounded section-padding-0-10">
				    <h3>Doing the job of Super Management?</h3>
						<p>The job of a Super admin, what are your actions?</p>
						<a class='btn btn-outline-success' href="topics">Manage Topics</a>
						<a class='btn btn-outline-success' href="create-post?user_id=<?php echo $_SESSION['user_id']; ?>">Manage Posts</a>
					</div>
					<div class="border border-dark rounded section-padding-0-10">
				  	<h3>Any giveaway of a thousand smiles today?</h3>
						<p>How Spaces are needed?</p>
						<a class="btn btn-outline-danger" href="api-call?giveaway=All_free">Free Package & License</a>
						<a class="btn btn-outline-warning" href="api-call?giveaway=Reg_free">Free Package only</a>
						<a class="btn btn-outline-secondary" href="api-call?giveaway=cp_1.5k">1,500<em>cashpoints</em></a>
						<a class="btn btn-outline-primary" href="api-call?giveaway=cp_1k">1,000<em>cashpoints</em></a>
						<a class="btn btn-outline-success" href="api-call?giveaway=cp_.7k">700<em>cashpoints</em></a>
					</div>
					<div class="border border-dark rounded section-padding-0-10">
				    <h3>Filling the room with relevance?</h3>
						<p>With content from reputable sources?</p>
	          <a href='api-call?news-api=business' class='btn btn-outline-success'>Business News</a>
	          <a href='api-call?news-api=entertainment' class='btn btn-outline-success'>Entertainment News</a>
	          <a href='api-call?news-api=health' class='btn btn-outline-success'>Health News</a>
	          <a href='api-call?news-api=news' class='btn btn-outline-success'>GeneralNews</a>
	          <a href='api-call?news-api=science' class='btn btn-outline-success'>Science News</a>
	          <a href='api-call?news-api=sport' class='btn btn-outline-success'>Sport News</a>
	          <a href='api-call?news-api=technology' class='btn btn-outline-success'>Technology News</a>
					</div>
	      <?php } else { header("Location: {$home_url}"); }?>
			</div>
		</div>
	</div>
</div>
<?php
include_once "layout_foot.php";
?>