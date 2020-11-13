<?php
if($_POST){
  // include database and object file
  include_once 'config/database.php';
  include_once 'object/message.php';
  // get database connection
  $database = new Database();
  $db = $database->getConnection();
  // prepare message object
  $message = new Message($db);
  // set message id to be deleted
  $message->id = $_POST['object_id'];
  // delete the message
  if($message->delete()){
    echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-success alert-dismissable" role="alert">
					  Message was deleted
					</div>
				</div>
			</div>
		</div>';
  }
  // if unable to delete the message
  else{
    echo '<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 text-center">
					<div class="alert alert-danger alert-dismissable" role="alert">
					  Unable to delete message
					</div>
				</div>
			</div>
		</div>';
  }
}
?>