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
include_once 'object/package.php';
include_once 'object/license.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
$package = new Package($db);
$license = new License($db);
// set page title
$page_title = "Agents";
$role = 'Agent';
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
// read all users from the database
$stmt = $user->readRole($from_record_num, $records_per_page, $role);
// count retrieved users
$num = $stmt->rowCount();
// to identify page for paging
$page_url="agents?";
// count total rows - used for pagination
$total_rows=$user->countAll();
// include users table HTML template
include_once "read-users.php";
include_once "layout_foot.php"; ?>