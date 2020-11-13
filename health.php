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
include_once 'object/health.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$health = new HealthNews($db);
$page_title = "Health";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all healths from the database
$stmt = $health->readAll($from_record_num, $records_per_page);
// count retrieved healths
$num = $stmt->rowCount();
// to identify page for paging
$page_url="health?";
// count total rows - used for pagination
$total_rows=$health->countAll();
// include healths table HTML template
include_once "health-news.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>