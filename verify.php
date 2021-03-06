<?php
// core configuration
include_once "config/core.php";
// include classes
include_once 'config/database.php';
include_once 'object/user.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
// set access code
$user->access_code=isset($_GET['access_code']) ? $_GET['access_code'] : "";
// verify if access code exists
if(!$user->accessCodeExists()){
  die("ERROR: Access code not found.");
}
// redirect to login
else{
  // update status
  $user->status=1;
  $user->logged_in=1;
  $user->login_time = time();
  $user->updateStatusByAccessCode();
  // and the redirect
  header("Location: {$home_url}login?action=email_verified");
}
?>