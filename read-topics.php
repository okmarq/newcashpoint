<?php
// display the table if the number of topics retrieved was greater than zero
if($num>0){
	// make a display design
?>
	<!-- ##### Blog Area Start ##### -->
  <div class="blog-area section-padding-0-10">
    <div class="container">
      <div class="row">
				<?php  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				  extract($row); ?>
	        <div class="col-12 col-lg-3">
	            <div class="section-heading">
              	<a href="topic?topic=<?php echo $topic_slug.'&id='.$id; ?>">
              		<h6><?php echo $name; ?></h6>
            		</a>
	            </div>
	        </div>
				<?php } ?>
      </div>
    </div>
  </div>
  <!-- ##### Blog Area End ##### -->
	<?php
  include_once 'paging.php';
} else{	?>
	<div class="container">
		<div class="col-12 col-lg-4 text-center">
			<div class="alert alert-info alert-dismissable" role="alert">
			  No topic found
			</div>
		</div>
	</div>
<?php } ?>