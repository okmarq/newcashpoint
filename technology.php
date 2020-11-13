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
include_once 'object/technology.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$technology = new TechnologyNews($db);
$page_title = "Technology";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all technologys from the database
$stmt = $technology->readAll($from_record_num, $records_per_page);
// count retrieved technologys
$num = $stmt->rowCount();
// to identify page for paging
$page_url="technology?";
// count total rows - used for pagination
$total_rows=$technology->countAll();
// include technologys table HTML template
include_once "technology-news.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>