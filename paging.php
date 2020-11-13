<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <nav aria-label="Page navigation example">
          <ul class="pagination mt-50">
						<?php if ($page>1) { ?>
							<li class="page-item"><a class="page-link" href='<?php echo "{$page_url}"; ?>' title='Go to the first page.'>First</a></li>
						<?php }
						// count all products in the database to calculate total pages
						$total_pages = ceil($total_rows / $records_per_page);
						// range of links to show
						$range = 2;
						// display links to 'range of pages' around 'current page'
						$initial_num = $page - $range;
						$condition_limit_num = ($page + $range)  + 1;
						for ($x=$initial_num; $x<$condition_limit_num; $x++) {
						  // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
						  if (($x > 0) && ($x <= $total_pages)) {
						  	// current page
						    if ($x == $page) { ?>
									<li class="page-item active"><a class="page-link" href="#"><?php echo $x; ?> <span class="sr-only">(current)</span></a></li>
								<?php }
								// not current page
								else { ?>
									<li class="page-item"><a class="page-link" href='<?php echo "{$page_url}page=$x"; ?>'><?php echo $x; ?></a></li>
								<?php }
						  }
						}
						// button for last page
						if($page<$total_pages){ ?>
					    <li class="page-item"><a class="page-link" href='<?php echo "{$page_url}page={$total_pages}"; ?>' title='Last page is <?php echo "{$total_pages}"; ?>.'>Last</a></li>
						<?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- ##### Blog Area End ##### -->