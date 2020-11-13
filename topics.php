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
include_once 'object/topic.php';
include_once 'object/utils.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
$topic = new Topic($db);
$utils = new Utils();
// set page title
if (isset($_POST['topic_check'])) {
	$topic->name = $_POST['t_name'];
	if ($topic->topicExists()) { echo "exists"; }
	else { echo "nonexistent"; }
	exit();
}
if (isset($_POST['create_topic'])) {
	$topic->name = $_POST['c_t_name'];
	$topic->topic_slug = $utils->makeSlug($_POST['c_t_name']);
	$topic->create();
	exit();
}
if (isset($_POST['update_topic'])) {
	$topic->id = $_POST['u_t_id'];
	$topic->name = $_POST['u_t_name'];
	$topic->topic_slug = $utils->makeSlug($_POST['u_t_name']);
	$topic->update();
	exit();
}
if (isset($_POST['delete_topic'])) {
	$topic->id = $_POST['d_t_id'];
	$topic->delete();
	exit();
}
$page_title = "Topics";
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
// read all topics from the database
$stmt = $topic->readAll($from_record_num, $records_per_page);
// count retrieved topics
$num = $stmt->rowCount();
// to identify page for paging
$page_url="topics?";
// count total rows - used for pagination
$total_rows=$topic->countAll();
?>
<!-- ##### Popular News Area Start ##### -->
<div class="popular-news-area section-padding-25-10">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4 section-padding-10-0">
        <div class="newsletter-widget">
          <form>
          	<h4>Create Topic</h4>
      			<p id="c_msg"></p>
            <p id="c_error"></p>
            <input type="text" id="c_t_name" placeholder="Topic Name * required" required>
            <button type="button" id="c_topic" class="btn w-100">Create</button>
            <p><strong id="c_info_msg"></strong></p>
          </form>
        </div>
      </div>
      <div class="col-12 col-lg-4 section-padding-10-0">
        <div class="newsletter-widget">
          <form>
          	<h4>Update Topic</h4>
      			<p id="u_msg"></p>
						<select class="form-control mb-15" id="u_t_id">
							<option>Select topic</option>
							<?php
							$stmt1 = $topic->read();
							while ($row_topic = $stmt1->fetch(PDO::FETCH_ASSOC)) {
								extract($row_topic);
								echo "<option value='{$id}'>{$name}</option>";
							}
							?>
						</select>
            <p id="u_error"></p>
            <input type="text" id="u_t_name" placeholder="Topic Name * required" required>
            <button type="button" id="u_topic" class="btn w-100">Update</button>
            <p><strong id="u_info_msg"></strong></p>
          </form>
        </div>
      </div>
      <div class="col-12 col-lg-4 section-padding-10-0">
        <div class="newsletter-widget">
          <form>
          	<h4>Delete Topic</h4>
						<select class="form-control mb-15" id='d_t_id'>
							<option>Select topic</option>
							<?php
							$stmt2 = $topic->read();
							while ($row_topic1 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
								extract($row_topic1);
								echo "<option value='{$id}'>{$name}</option>";
							}
							?>
						</select>
            <button type="button" id="d_topic" class="btn w-100">Delete</button>
            <p><strong id="d_info_msg"></strong></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Popular News Area End ##### -->
<?php
// include topics table HTML template
include_once "read-topics.php";
//include_once "video-area.php";
include_once "layout_foot.php";
?>