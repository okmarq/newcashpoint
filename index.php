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
include_once 'config/database.php';
include_once 'object/news.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$news = new News($db);
// set page title
$page_title = "Home";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all newss from the database
$stmt = $news->readAll($from_record_num, $records_per_page);
// count retrieved newss
$num = $stmt->rowCount();
// to identify page for paging
$page_url="index?";
// count total rows - used for pagination
$total_rows=$news->countAll();
// include newss table HTML template
include_once "news.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>