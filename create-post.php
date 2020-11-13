<?php
include_once "config/core.php";
$get = (isset($_GET['id'])||isset($_GET['user_id'])) ? '' : die('ERROR: missing ID.');
$post_id = isset($_GET['id']) ? $_GET['id'] : '';
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
$require_login=true;
$restricted = true;
$admin = false;
$agent = false;
include_once "config/checker.php";
include_once 'config/database.php';
include_once 'object/post.php';
include_once 'object/topic.php';
include_once 'object/post_topic.php';
include_once 'object/utils.php';
$database = new Database();
$db = $database->getConnection();
$post = new Post($db);
$topic = new Topic($db);
$post_topic = new PostTopic($db);
$utils = new Utils();
$editing = 0;

if (isset($_POST['submit'])) {
	$uploadOk = 1;
	$target_dir = "img/post_img/";
	$target_file = $target_dir .time(). basename($_FILES["image"]["name"]);
	// Check if image file is a actual image or fake image
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false) {
	  echo "File is an image - " . $check["mime"] . ".";
	  $uploadOk = 1;
	} else {
	  echo "File is not an image.";
	  $uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	  echo "Sorry, file already exists.";
	  $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["image"]["size"] > 2000000) {
	  echo "Sorry, your file is too large.";
	  $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
	    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
	  } else {
	    echo "Sorry, there was an error uploading your file.";
	  }
	}
}
if (isset($_GET['user_id'])) { // creating post
	$title = isset($_POST['title']) ? $_POST['title'] : '';
	$image = isset($_FILES['image']) ? $_FILES['image']['name'] : '';
	$content = isset($_POST['content']) ? $_POST['content'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$publish = isset($_POST['published']) ? $_POST['published'] : 0;
	$tags = isset($_POST['tags']) ? $_POST['tags'] : '';
	$topic_id = isset($_POST['topic_id']) ? $_POST['topic_id'] : '';
}
if (isset($_POST['c_post'])) {
	print_r($_POST);
	echo "<br>";
	print_r($_FILES);



	$post->user_id = $user_id;
	$post->title = $_POST['title'];
	$post->image = basename( $_FILES["image"]["name"]);
	$post->content = $_POST['content'];
	$post->description = $_POST['description'];
	$post->published = $publish;
	$post->slug = $utils->makeSlug($_POST['title']);
	$post->tags = $_POST['tags'];
	$post->topic_id = $_POST['topic_id'];
	if ($post->create()) {
		$post->readBySlug();
		$post_topic->post_id = $post->id;
		$post_topic->topic_id = $_POST['topic_id'];
		$post_topic->create();
		echo 'Post created';
	} else {
		echo 'Post not created';
	} // exit();

}
if (isset($_GET['id'])) { // editing post
	$editing = 1;
	$post->id = $post_id;
	$post->readOne();
	$title = $post->title;
	$image = $post->image;
	$content = $post->content;
	$description = $post->description;
	$publish = $post->published;
	$slug = $post->slug;
	$tags = $post->tags;
	$topic_id = isset($_POST['topic_id']) ? $_POST['topic_id'] : '';
}
if (isset($_POST['u_post'])) { //
	if (empty($image)) { echo "Featured image is required"; /*exit();*/ }
	$target = 'uploads/'.basename($image);
	if (!move_uploaded_file($image, $target)) {
		echo "Failed to upload image. Please check file settings for your server"; //exit();
	}
	$post->post_id = $post_id;
	$post->title = $_POST['title'];
	$post->image = basename( $_FILES["image"]["name"]);
	$post->content = $_POST['content'];
	$post->description = $_POST['description'];
	$post->published = $_POST['published'];
	$post->slug = $utils->makeSlug($_POST['title']);
	$post->tags = $_POST['tags'];
	$post->topic_id = $_POST['topic_id'];
	if ($post->update()) {
		$post->readBySlug();
		$post_topic->post_id = $post->id;
		$post_topic->topic_id = $_POST['topic_id'];
		$post_topic->update();
		echo "Post updated";
	} else {
		echo "Post not updated";
	} exit();
}

$page_title = "Super Post Management";
// include page header HTML
include_once "layout_head.php";
include_once "navigation.php";
include_once "hero-area.php";
?>
<!-- ##### Contact Form Area Start ##### -->
<div class="contact-area section-padding-0-80">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="contact-title d-flex">
          <h2>Create/Edit Post&nbsp;&nbsp;&nbsp;&nbsp;</h2>
          <p class=""><strong id="p_msg"></strong></p>
        </div>
      </div>
	  </div>
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="contact-form-area">
<!---->
          <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post" enctype="multipart/form-data">
            <div class="row">
							<div class="col-12">
  							<input name="id" id="id" type="hidden" class="form-control" value="<?php echo $post_id; ?>" readonly>
  						</div>
							<div class="col-12">
  							<input name="user_id" id="user_id" type="hidden" class="form-control" value="<?php echo $user_id; ?>" readonly>
  						</div>
              <div class="col-12">
                <input name="title" id="title" type="text" class="form-control" placeholder="Title * required" required value="<?php echo $title; ?>">
              </div>
              <div class="col-12 col-lg-6">
                <input name="image" id="image" type="file" class="form-control" value="<?php echo $image; ?>">
              </div>
              <div class="col-12 col-lg-6">
								<select name="topic_id" id="topic_id" class="form-control" required>
									<option value="" disabled selected>Choose Topic</option>
									<?php $stmt = $topic->read();
									while ($row_topic = $stmt->fetch(PDO::FETCH_ASSOC)) {
										extract($row_topic);
										echo "<option value='{$id}'>{$name}</option>";
									} ?>
								</select>
              </div>
              <div class="col-12">
                <textarea name="content" id="content" class="form-control" placeholder="Write your post here ... * Required" required><?php echo $content; ?></textarea>
              </div>
<!--script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
</script-->
<script>
	CKEDITOR.replace('content', {
    filebrowserUploadUrl: 'ckeditor/ck_upload.php',
    filebrowserUploadMethod: 'form'
  });
</script>
              <div class="col-12 col-lg-6">
                <textarea name="description" id="description" class="form-control form-control-desc" placeholder="Write your description here ... No more than 160 words * Required" required><?php echo $description; ?></textarea>
              </div>
              <div class="col-12 col-lg-6">
                <input name="tags" id="tags" type="text" class="form-control" placeholder="Tags must be separated by commas" value="<?php echo $tags; ?>">
              </div>
<?php if(isset($_SESSION['role'])&&$_SESSION['role']=='Admin') {
	if ($publish) { ?>
		<div class="col-12 col-lg-6">
		  Publish <input name="published" id='published' type="checkbox" value="1" checked>
		</div>
	<?php } else { ?>
		<div class="col-12 col-lg-6">
			Publish <input name="published" id='published' type="checkbox" value="1">
		</div>
	<?php }
} ?>
              <div class="col-12 text-center">
<?php if ($editing) { ?>
  <button type="button" id="u_post" class="btn newspaper-btn mt-15 w-100">Update</button>
<?php } else { ?>
	<button type="submit" name="c_post" class="btn newspaper-btn mt-15 w-100">Create</button>
<?php } ?>
              </div>
         	  </div>
      		</form>
  			</div>
			</div>
      <div class="col-12 col-lg-4">
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6>Featured Image:</h6>
          <img src="<?php echo $image; ?>" alt="" class="d-block img-thumbnail">
          <p>image may be larger than you think</p>
        </div>
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
            <h6>Cashpoint guidelines:</h6>
            <p>500 - 549 words - <strong>140</strong><em>cp</em>
                <br>550 - 999 words - <strong>210</strong><em>cp</em>
                <br>1000 - 1499 words - <strong>280</strong><em>cp</em>
                <br>1500 - 1999 words - <strong>350</strong><em>cp</em>
                <br>2000 - 2499 words - <strong>420</strong><em>cp</em>
                <br>2500 - 2999 words - <strong>490</strong><em>cp</em>
                <br>3000+ words - <strong>560</strong><em>cp</em>
            </p>
        </div>
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6>Disclaimer:</h6>
          <p>Subject to further checks, edition and approval before disbursment of cashpoints.<br>If a need arise that would warrant the taking down of any post, the author would incur a deduction of 70% cashpoints earned for the post.</p>
        </div>
    	</div>
  	</div>
  </div>
</div>
<?php
include_once "layout_foot.php";
?>