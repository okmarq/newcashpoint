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
include_once 'object/science.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$science = new ScienceNews($db);
$page_title = "Science";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all sciences from the database
$stmt = $science->readAll($from_record_num, $records_per_page);
// count retrieved sciences
$num = $stmt->rowCount();
// to identify page for paging
$page_url="science?";
// count total rows - used for pagination
$total_rows=$science->countAll();
// include sciences table HTML template
include_once "science-news.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>