<?php
// core configuration
include_once "config/core.php";
// check if logged in as admin
// include login checker
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
include_once "config/checker.php";
// set page title
include_once 'config/database.php';
include_once 'object/business.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$business = new BusinessNews($db);
$page_title = "Business";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all businesss from the database
$stmt = $business->readAll($from_record_num, $records_per_page);
// count retrieved businesss
$num = $stmt->rowCount();
// to identify page for paging
$page_url="business?";
// count total rows - used for pagination
$total_rows=$business->countAll();
// include businesss table HTML template
include_once "business-news.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>
