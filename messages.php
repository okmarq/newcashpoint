<?php
// core configuration
include_once "config/core.php";
$require_login=true;
$restricted = true;
$admin = true;
$agent = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/message.php';
include_once "object/utils.php";
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$message = new Message($db);
// set page title
$page_title = "Messages";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
if ($_POST) {
  $utils = new Utils();
  $message->id=$_POST['id'];
  $message->reply=$_POST['reply'];
	// send email
  $send_to_email=$message->email;
  $subject="Re: {$message->subject}";
  $body="Hi {$message->name}.<br><br>";
  $body.=$_POST['reply'];
	if ($message->updateReply()) {
		echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-success alert-dismissable" role="alert">
					  Sent to database
					</div>
				</div>
			</div>
		</div>';
	}
	if($utils->sendEmailViaPhpMail($send_to_email, $subject, $body)){
	  echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-success alert-dismissable" role="alert">
					  Sent to inbox
					</div>
				</div>
			</div>
		</div>';
	}
	// message if unable to send email for password reset link
	else{
		echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-danger alert-dismissable" role="alert">
					  Not Sent to inbox
					</div>
				</div>
			</div>
		</div>';
	}
}
// read all messages from the database
$stmt = $message->readAll($from_record_num, $records_per_page);
// count retrieved messages
$num = $stmt->rowCount();
// to identify page for paging
$page_url="messages?";
// count total rows - used for pagination
$total_rows=$message->countAll();
// include messages table HTML template
include_once "read-messages.php";
include_once "layout_foot.php";
?>