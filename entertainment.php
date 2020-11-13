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
include_once 'object/entertainment.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$entertainment = new EntertainmentNews($db);
$page_title = "Entertainment";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all entertainments from the database
$stmt = $entertainment->readAll($from_record_num, $records_per_page);
// count retrieved entertainments
$num = $stmt->rowCount();
// to identify page for paging
$page_url="entertainment?";
// count total rows - used for pagination
$total_rows=$entertainment->countAll();
// include entertainments table HTML template
include_once "entertainment-news.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>