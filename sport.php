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
include_once 'object/sport.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$sport = new SportNews($db);
$page_title = "Sport";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all sports from the database
$stmt = $sport->readAll($from_record_num, $records_per_page);
// count retrieved sports
$num = $stmt->rowCount();
// to identify page for paging
$page_url="sport?";
// count total rows - used for pagination
$total_rows=$sport->countAll();
// include sports table HTML template
include_once "sport-news.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>