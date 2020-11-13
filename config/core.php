<?php
// show error reporting
error_reporting(E_ALL);
// start php session
session_start();
// set your default time-zone
date_default_timezone_set('Africa/Lagos');
// home page url
$home_url="http://localhost/ncp/";
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set number of records per page
$records_per_page = 9;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
include_once 'config/database.php';
include_once 'object/topic.php';
$database = new Database();
$db = $database->getConnection();
$topic = new Topic($db);
?>