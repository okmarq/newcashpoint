<?php
// core configuration
include_once "config/core.php";
// get ID of the topic to be read
$topic_id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$require_login=false;
$restricted = false;
$admin = false;
$agent = false;
include_once "config/checker.php";
// include classes
include_once 'config/database.php';
include_once 'object/user.php';
include_once 'object/post.php';
include_once 'object/topic.php';
include_once 'object/post_topic.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// initialize objects
$user = new User($db);
$post = new Post($db);
$topic = new Topic($db);
$post_topic = new PostTopic($db);
// set page title
$page_title = "Posts";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all posts from the database
$stmt = $post->readAllByTopicId($from_record_num, $records_per_page, $topic_id);
// count retrieved posts
$num = $stmt->rowCount();
// to identify page for paging
$page_url="topic?";
// count total rows - used for pagination
$total_rows=$post->countAll();
// include posts table HTML template
include_once "read-posts.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>