<?php
// core configuration
include_once "config/core.php";
// check if logged in as admin
// include login checker
$require_login=true;
$restricted = true;
$admin = false;
$agent = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/user.php';
include_once 'object/package.php';
include_once 'object/license.php';
// get ID of the user to be read
$id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : die('ERROR: missing ID.');
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
$package = new Package($db);
$license = new License($db);
$user->id = $id;
$user->readOne();
// set page title
$page_title = "Profile";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
//if ($_POST&&isset($_POST["profile"])) {}
if ($_POST&&isset($_POST["social"])) {
	$user->facebook = $_POST['facebook'];
	$user->twitter = $_POST['twitter'];
	$user->instagram = $_POST['instagram'];
	$user->telegram = $_POST['telegram'];
	 // update the user
  if($user->updateSocial()){
    echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-success alert-dismissable" role="alert">
					  Social details updated
					</div>
				</div>
			</div>
		</div>';
		$_POST=array();
  }
  // if unable to update the user, tell the user
  else{
    echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-danger alert-dismissable" role="alert">
					  Update unsuccessful
					</div>
				</div>
			</div>
		</div>';
  }
}
if ($_POST&&isset($_POST["account"])) {
	$user->bank = $_POST['bank'];
	$user->acct_name = $_POST['acct_name'];
	$user->acct_num = $_POST['acct_num'];
	 // update the user
  if($user->updateBank()){
    echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-success alert-dismissable" role="alert">
					  Account details updated
					</div>
				</div>
			</div>
		</div>';
		$_POST=array();
  }
  // if unable to update the user, tell the user
  else{
    echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-danger alert-dismissable" role="alert">
					  Update unsuccessful
					</div>
				</div>
			</div>
		</div>';
  }
}
?>
<!-- ##### Popular News Area Start ##### -->
<div class="popular-news-area section-padding-80-50">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4">
      	<div class="section-heading text-center">
          <h6>Update Social Links</h6>
        </div>
        <!-- Newsletter Widget -->
        <div class="newsletter-widget">
          <h4>Social Links</h4>
					<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="facebook" placeholder="Facebook * recommended" value="<?php echo $user->facebook; ?>">
            <input type="text" name="twitter" placeholder="Twitter * recommended" value="<?php echo $user->twitter; ?>">
            <input type="text" name="instagram" placeholder="Instagram * recommended" value="<?php echo $user->instagram; ?>">
            <button type="submit" name="social" class="btn w-100">Update</button>
          </form>
        </div>
      </div>
      <div class="col-12 col-lg-4">
      	<div class="section-heading text-center">
          <h6>Update Account Details</h6>
        </div>
        <!-- Newsletter Widget -->
        <div class="newsletter-widget">
          <h4>Account Details</h4>
					<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="bank" placeholder="Bank Name * required" required value="<?php echo $user->bank; ?>">
            <input type="text" name="acct_name" placeholder="Account Name * required" required value="<?php echo $user->acct_name; ?>">
            <input type="text" name="acct_num" placeholder="Account Number * required" required value="<?php echo $user->acct_num; ?>">
            <button type="submit" name="account" class="btn w-100">Update</button>
          </form>
        </div>
      </div>
      <div class="col-12 col-lg-4">
      	<div class="section-heading text-center">
          <h6>CashPoint Licenses</h6>
        </div>
        <!-- Newsletter Widget -->
        <div class="newsletter-widget">
          <h4>Renew License</h4>
					<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<?php
								$stmt=$package->read();
								$stmt1=$license->read();
							?>
						<select class="form-control mb-15" name="package">
							<option value="0">Select Package ...</option>
							<?php
							while ($row_package=$stmt->fetch(PDO::FETCH_ASSOC)) {
								extract($row_package); ?>
								<option value="<?php echo $cost; ?>"><?php echo $name," &#8358;",$cost; ?></option>
							<?php } ?>
						</select>
						<select class="form-control mb-15" name="license">
							<option value="0">Select License ...</option>
							<?php
							while ($row_license=$stmt1->fetch(PDO::FETCH_ASSOC)) {
								extract($row_license); ?>
								<option value="<?php echo $cost; ?>"><?php echo $name," &#8358;",$cost; ?></option>
							<?php } ?>
						</select>
						<!-- ajax will be used here -->
            <input type="text" name="cost" value="" class="" readonly>
            <button type="submit" name="calculate" class="btn w-100">Calculate Cost</button>
            <button type="submit" name="buy_package" class="btn w-100">Buy Package License</button>
            <button type="submit" name="buy_license" class="btn w-100">Buy License License</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Popular News Area End ##### -->
<?php include_once "layout_foot.php"; ?>