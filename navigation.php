	<!-- Navbar Area -->
	<div class="newspaper-main-menu" id="stickyMenu">
	  <div class="classy-nav-container breakpoint-off">
	    <div class="container">
	      <!-- Menu -->
	      <nav class="classy-navbar justify-content-between" id="newspaperNav">
	        <!-- Logo -->
	        <div class="logo">
	          <a href="index">
	          	<img src="img/core-img/logo.png" alt="">
	          </a>
	        </div>
	        <!-- Navbar Toggler -->
	        <div class="classy-navbar-toggler">
	          <span class="navbarToggler"><span></span><span></span><span></span></span>
	        </div>
	        <!-- Menu -->
	        <div class="classy-menu">
	          <!-- close btn -->
	          <div class="classycloseIcon">
	            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
	          </div>
	          <!-- Nav Start -->
	          <div class="classynav">
	            <ul>
								<?php if(isset($_SESSION['user_id']) && ($_SESSION['role']=='User'||$_SESSION['role']=='Agent'||$_SESSION['role']=='Admin')) { ?>
									<!-- Login -->
									<li><a href="#">Dashboard</a>
									  <ul class="dropdown">
									    <li><a href="dashboard">Earnings</a></li>
									    <li><a href="account">Account</a></li>
									    <li><a href="profile">Profile</a></li>
										</ul>
									</li>
								<?php } ?>
	              <li class="active"><a href="index">Home</a></li>
	              <li><a href="#">News</a>
	                <ul class="dropdown">
	                  <li><a href="business">Business</a></li>
	                  <li><a href="entertainment">Entertainment</a></li>
	                  <li><a href="health">Health</a></li>
	                  <li><a href="science">Science</a></li>
	                  <li><a href="sport">Sport</a></li>
	              	  <li><a href="technology">Technology</a></li>
	              	</ul>
	          		</li>
	              <li><a href="#">Categories</a>
	                <div class="megamenu">
	                  <ul class="single-mega cn-col-4">
	                    <li class="title">Personal</li>
	                    <li><a href="posts">General</a></li>
                        <?php
                        include_once 'object/topic.php';
                        $topic = new Topic($db);
                        $stmt = $topic->read();
                        while ($row_topic = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        	extract($row_topic);
                        ?>
                        	<li>
                        		<a href="topic?topic=<?php echo $topic_slug.'&id='.$id; ?>">
                        			<?php echo $name; ?>
                        		</a>
                        	</li>
                        <?php } ?>
	                  </ul>
	                  <ul class="single-mega cn-col-4">
	                    <li class="title">Make Money</li>
	                    <li><a href="posts">Posts</a></li>
	                    <li><a href="categories-post">Technology</a></li>
	                    <li><a href="single-news">Single Articles</a></li>
	                    <li><a href="about">About Us</a></li>
	                    <li><a href="contact">Contact</a></li>
	                  </ul>
	                  <ul class="single-mega cn-col-4">
	                    <li class="title">Categories</li>
	                    <li><a href="index">Home</a></li>
	                    <li><a href="categories-post">Categories</a></li>
	                    <li><a href="single-news">Single Articles</a></li>
	                    <li><a href="about">About Us</a></li>
	                    <li><a href="contact">Contact</a></li>
	                	</ul>
	                  <div class="single-mega cn-col-4">
	                    <!- Single Featured Post ->
	                    <div class="single-blog-post small-featured-post d-flex">
	                      <div class="post-thumb">
	                        <a href="#"><img src="img/bg-img/23.jpg" alt=""></a>
	                      </div>
	                      <div class="post-data">
	                        <a href="#" class="post-catagory">Travel</a>
	                        <div class="post-meta">
	                          <a href="#" class="post-title">
	                            <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
	                          </a>
	                          <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
	                        </div>
	                      </div>
	                    </div>
	                    <!- Single Featured Post ->
	                    <div class="single-blog-post small-featured-post d-flex">
	                      <div class="post-thumb">
	                        <a href="#"><img src="img/bg-img/24.jpg" alt=""></a>
	                      </div>
	                      <div class="post-data">
	                        <a href="#" class="post-catagory">Politics</a>
	                        <div class="post-meta">
	                          <a href="#" class="post-title">
	                            <h6>Augue semper congue sit amet ac sapien. Fusce consequat.</h6>
	                          </a>
	                          <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
			            </div>
	              </li>
	              <li><a href="forum">Forum</a></li>
	              <li><a href="about">About</a></li>
	              <li><a href="contact">Contact</a></li>
	            </ul>
	        	</div>
	        <!-- Nav End -->
	        </div>
	      </nav>
	    </div>
	  </div>
	</div>
</header>
<!-- ##### Header Area End ##### -->