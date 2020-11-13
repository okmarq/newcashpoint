<?php
/**
* if a page requires login set $require_login on page to true
* if anybody can visit a page set $restricted on page to false
* if a page requires access to only an admin, set $admin to true
* if a page requires access to only a agent, set $agent to true
*/
// if $require_login was set and value is 'true'
if(isset($require_login) && $require_login==true){
  // if user not yet logged in, redirect to login page
  if(!isset($_SESSION['role'])){
    header("Location: {$home_url}login?action=please-login");
  }
}
// if user not yet logged in and tries to access a restricted page, redirect to home page
if(!isset($_SESSION['role'])){
	if ($restricted) {
		header("Location: {$home_url}");
	}
}

// if 'login' or 'register' page but the user is already logged in
if(isset($page_title) && ($page_title=="Login" || $page_title=="Register")){
  // redirect to index
  if(isset($_SESSION['role'])){
    header("Location: {$home_url}index?action=already-logged-in");
  }
}
else{
  // no problem, stay on current page
}
?>