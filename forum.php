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
// include classes
include_once 'config/database.php';
include_once 'object/forum.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$forum = new Forum($db);
// set page title
$page_title = "Forum";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all forums from the database
$stmt = $forum->readAll($from_record_num, $records_per_page);
// count retrieved forums
$num = $stmt->rowCount();
// to identify page for paging
$page_url="forum?";
// count total rows - used for pagination
$total_rows=$forum->countAll();
// include forums table HTML template
include_once "join-forum.php";
include_once "layout_foot.php";
?>