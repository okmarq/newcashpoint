  <!-- ##### Footer Area Start ##### -->
  <footer class="footer-area">
		<!-- Main Footer Area -->
		<div class="main-footer-area">
		  <div class="container">
	      <div class="row">
          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="footer-widget-area mt-80">
              <!-- Footer Logo -->
              <div class="footer-logo">
                <a href="index">
                	<img src="img/core-img/logo.png" alt="">
                	<img src="img/logored64.png" alt="">
                </a>
              </div>
              <!-- List -->
              <ul class="list"><!-- ?subject=please send my verification link to me-->
                <li><a href="mailto:okmarq@gmail.com?subject=I%20neeed%20your%20help">okmarq@gmail.com</a></li>
                <li><a href="tel:+2348107250441">+234 810 725 0441</a></li>
                <li><a href="tel:+2348118682051">+234 811 868 2051</a></li>
                <li><a href="newcashpoint.com">www.newcashpoint.com</a></li>
              </ul>
            </div>
          </div>
          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-2">
            <div class="footer-widget-area mt-80">
              <!-- Title -->
              <h4 class="widget-title">News</h4>
              <!-- List -->
              <ul class="list">
                <li><a href="business">Business</a></li>
                <li><a href="entertainment">Entertainment</a></li>
                <li><a href="health">Health</a></li>
                <li><a href="science">Science</a></li>
                <li><a href="sport">Sport</a></li>
                <li><a href="technology">Technology</a></li>
              </ul>
            </div>
          </div>
          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-4 col-lg-2">
            <div class="footer-widget-area mt-80">
              <!-- Title -->
              <h4 class="widget-title">Featured</h4>
              <!-- List -->
              <ul class="list">
                <li><a href="business-ideas">Business Ideas</a></li>
                <li><a href="invest">Invest</a></li>
                <li><a href="advertise">Advertise</a></li>
                <!--li><a href="#">Facebook</a></li>
                <li><a href="#">Google</a></li>
                <li><a href="#">Nollywood</a></li>
                <li><a href="#">Hollywood</a></li>
                <li><a href="#">Apple</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Google</a></li>
                <li><a href="#">Nollywood</a></li>
                <li><a href="#">Hollywood</a></li>
                <li><a href="#">Wall street</a></li-->
              </ul>
            </div>
          </div>
          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-4 col-lg-2">
            <div class="footer-widget-area mt-80">
              <!-- Title -->
              <h4 class="widget-title">FAQ</h4>
              <!-- List -->
              <ul class="list">
              	<li><a href="faq">FAQs</a></li>
                <!--li><a href="#">Earnings</a></li>
                <li><a href="#">Sponsored Content</a></li>
                <li><a href="#">Cash Points</a></li>
                <li><a href="#">Registration</a></li>
                <li><a href="#">Features</a></li-->
              </ul>
            </div>
          </div>
			    <!-- Footer Widget Area -->
			    <div class="col-12 col-sm-4 col-lg-2">
		        <div class="footer-widget-area mt-80">
              <!-- Title -->
              <h4 class="widget-title">+More</h4>
              <!-- List -->
              <ul class="list">
                <li><a href="tnc">Terms and Conditions</a></li>
                <li><a href="privacy">Privacy policy</a></li>
                <!--li><a href="#">Fashion</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Architecture</a></li>
                <li><a href="#">Arts</a></li>
                <li><a href="#">Autos</a></li>
                <li><a href="#">Luxury</a></li-->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <!-- Copywrite -->
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="newcashpoint.com" target="_blank">Newcashpoint</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ##### Footer Area Start ##### -->
  <!-- ##### All Javascript Files ##### -->
  <!-- jQuery-2.2.4 js -->
  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="js/bootstrap/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <!-- bootbox library -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	</script>
  <!-- All Plugins js -->
  <script src="js/plugins/plugins.js"></script>
  <!-- Active js -->
  <script src="js/active.js"></script>
  <!-- Google Adsense -->
  <script data-ad-client="ca-pub-4347296457666149" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <!-- Google Recaptcha -->
  <script src="https://www.google.com/recaptcha/api.js?render=6LdCSKYZAAAAAAsc_S65o2hQR6hj5HK5CciNx_of"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171510987-1"></script>
  <!-- Paystack --> <!-- Try v2 link to checkk if it works later -->
  <script src="https://js.paystack.co/v2/inline.js"></script>
  <script>
  	$(document).ready(function(){
  		let username_state = false;
  		let email_state = false;
  		$('#username').on('keyup', function(){
  			let username = $('#username').val();
  			if (username == '') {
  				username_state = false;
  				return;
  			}
  			$.ajax({
			    type: 'post',
			    data: {
			    	'username_check' : 1,
			    	'username' : username,
			    },
			    success: function(response){
			      if (response == 'taken' ) {
			      	username_state = false;
			      	$('#u-error').text('Username unavailable');
			      }else if (response == 'not taken') {
			      	username_state = true;
			      	$('#u-error').text('Username available');
			      }
			    }
  			});
  		});
  		$('#email').on('keyup', function(){
		 	let email = $('#email').val();
		 	if (email == '') {
		 		email_state = false;
		 		return;
		 	}
		 	$.ajax({
		      type: 'post',
		      data: {
		      	'email_check' : 1,
		      	'email' : email,
		      },
		      success: function(response){
		      	if (response == 'taken' ) {
		          email_state = false;
		          $('#e-error').text('Email unavailable');
		      	}else if (response == 'not taken') {
		      	  email_state = true;
		      	  $('#e-error').text('Email available');
		      	}
		      }
		 	});
		});
  		/*$('#reg_bt').on('click', function(){
  			let name = $('#name').val();
			  let mobile = $('#mobile').val();
			  let email = $('#email').val();
			  let username = $('#username').val();
			  let password = $('#password').val();
			  let amount = $('#amount').val();
			 	if (username_state == false || email_state == false) {
				  $('#error_msg').text('Fix the errors in the form first');
				}else{
    		      // proceed with form submission
    		      $.ajax({
    		      	url: 'pay-reg.php',
    		      	type: 'post',
    		      	data: {
    		      		'save' : 1,
    		      		'name' : name,
    							'mobile' : mobile,
    							'email' : email,
    							'username' : username,
    							'password' : password,
    							'amount' : amount,
    		      	},
    		      	success: function(response){
    							$('#reg_btn').attr("disabled", true);
    		      		$('#info_msg').text('Congratulations You have been registered');
    		      		$('#name').val('');
    							$('#mobile').val('');
    							$('#email').val('');
    							$('#username').val('');
    							$('#password').val('');
    							$('#amount').val('');
    		      	}
    		      });
			 	}
			});*/
			$('#u_post').on('click', function(){
				let post_id = $('#post_id').val();
				let title = $('#title').val();
				let image = $('#image').val();
				let content = $('#content').val();
				let description = $('#description').val();
				let published = $('#published').val();
				let tags = $('#tags').val();
				let topic_id = $('#topic_id').val();
				$.ajax({
					type: 'post',
					data: {
						'u_post' : 1,
						'user_id' : user_id,
						'title' : title,
						'content' : content,
						'description' : description,
						'tags' : tags,
						'topic_id' : topic_id,
					},
					success: function(response){
						alert(response);
		      	$('#p_msg').text('Post updated');
						$('#u_post').attr("disabled", true);
					}
				});
			});
			let topic_state = false;
			$('#c_t_name').on('keyup', function(){
				let c_t_name = $('#c_t_name').val();
  			if (c_t_name == '') {
  				topic_state = false;
  				return;
  			}
  			$.ajax({
		      type: 'post',
		      data: {
		      	'topic_check' : 1,
		      	't_name' : c_t_name,
		      },
		      success: function(response){
		      	if (response == 'exists' ) {
		          topic_state = false;
		          $('#c_error').text('Topic unavailable');
		      	}else if (response == 'nonexistent') {
		      	  topic_state = true;
		      	  $('#c_error').text('Topic available');
		      	}
		      }
			 	});
			});
			$('#u_t_name').on('keyup', function(){
				let u_t_name = $('#u_t_name').val();
  			if (u_t_name == '') {
  				topic_state = false;
  				return;
  			}
  			$.ajax({
		      type: 'post',
		      data: {
		      	'topic_check' : 1,
		      	't_name' : u_t_name,
		      },
		      success: function(response){
		      	if (response == 'exists' ) {
		          topic_state = false;
		          $('#u_error').text('Topic unavailable');
		      	}else if (response == 'nonexistent') {
		      	  topic_state = true;
		      	  $('#u_error').text('Topic available');
		      	}
		      }
			 	});
			});
  		$('#c_topic').on('click', function(){
  			let c_t_name = $('#c_t_name').val();
			 	if (topic_state == false) {
				  $('#c_msg').text('Fix the errors in the form first');
				}else{
		      // proceed with form submission
		      $.ajax({
		      	type: 'post',
		      	data: {
		      		'create_topic' : 1,
		      		'c_t_name' : c_t_name,
		      	},
		      	success: function(response){
		      		$('#c_info_msg').text('Created');
		      		$('#c_t_name').val('');
		      	}
		      });
			 	}
			});
  		$('#u_topic').on('click', function(){
  			let u_t_id = $('#u_t_id').val();
  			let u_t_name = $('#u_t_name').val();
			 	if (topic_state == false) {
				  $('#u_msg').text('Fix the errors in the form first');
				}else{
		      // proceed with form submission
		      $.ajax({
		      	type: 'post',
		      	data: {
		      		'update_topic' : 1,
		      		'u_t_id' : u_t_id,
		      		'u_t_name' : u_t_name,
		      	},
		      	success: function(response){
		      		$('#u_info_msg').text('Updated');
		      		$('#u_t_name').val('');
		      	}
		      });
			 	}
			});
  		$('#d_topic').on('click', function(){
  			let d_t_id = $('#d_t_id').val();
	      $.ajax({
	      	type: 'post',
	      	data: {
	      		'delete_topic' : 1,
	      		'd_t_id' : d_t_id,
	      	},
	      	success: function(response){
	      		$('#d_info_msg').text('Deleted');
	      	}
	      });
			});
  		$('#unpublish').on('click', function(e){
  			e.preventDefault();
	      $.ajax({
	      	type: 'post',
	      	data: {
	      		'unpublish' : 1,
	      	},
	      	success: function(response){
	      		$('#msg').text('Unpublished');
	      	}
	      });
			});
			$('#link').on('click', function(e){
		  	e.preventDefault();
		  	$.ajax({
	      	type: 'post',
	      	data: {
	      		'link' : 1,
	      	},
	      	success: function(response){
	      		console.log(response);
	      		$('#link_msg').text('Verification link has been sent to your email.');
	      	}
		  	});
		  });
			// JavaScript for deleting message
			$(document).on('click', '.delete-message', function(){
			  var id = $(this).attr('delete-id');
			  bootbox.confirm({
			    message: "<h4>Are you sure?</h4>",
			    buttons: {
			      confirm: {
			        label: '<span class="glyphicon glyphicon-ok"></span> Yes',
			        className: 'btn-danger'
			      },
			      cancel: {
			        label: '<span class="glyphicon glyphicon-remove"></span> No',
			        className: 'btn-primary'
			      }
			    },
			    callback: function (result) {
			    	if(result==true){
			        $.post('delete-message.php', {
			          object_id: id
			      	}, function(data){
			      		location.reload();
			    		}).fail(function() {
			          alert('Unable to delete.');
			        });
			      }
			    }
			  });
			  return false;
			});
  		$("#post_comment").click("#post_comment", function(){
  			$("#show").html( '<div id="display" class="post-a-comment-area section-padding-30"> <h4>Leave a reply <em>1cp</em></h4> <div class="contact-form-area"> <form method="post"> <div class="row"> <div class="col-12"> <textarea name="reply" class="form-control" id="message" cols="30" rows="10" placeholder="Reply * required" required><?php //echo isset($_POST['reply']) ? htmlspecialchars($_POST['reply'], ENT_QUOTES) : "";  ?></textarea> </div> <div class="col-12 text-center"> <button class="btn newspaper-btn w-100" type="submit">Submit Reply</button> </div> </div>  </form> </div> </div>' );
  		});
  		$("#post_comment").click("#post_comment", function(){
  			$("#show").toggleClass('d-none');
  		});

  		$("#post_reply").click("#post_reply", function(){
  			$("#show_reply").html( '<div id="display" class="post-a-comment-area section-padding-30"> <h4>Leave a reply <em>1cp</em></h4> <div class="contact-form-area"> <form method="post"> <div class="row"> <div class="col-12"> <textarea name="reply" class="form-control" id="message" cols="30" rows="10" placeholder="Reply * required" required><?php //echo isset($_POST['reply']) ? htmlspecialchars($_POST['reply'], ENT_QUOTES) : "";  ?></textarea> </div> <div class="col-12 text-center"> <button class="btn newspaper-btn w-100" type="submit">Submit Reply</button> </div> </div>  </form> </div> </div>' );
  		});
  		$("#post_reply").click("#post_reply", function(){
  			$("#show_reply").toggleClass('d-none');
  		});
  	});
  </script>
	<script>
		const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
          e.preventDefault();
			let amt = document.getElementById("amount").value;
			if(amt==0){
			$(document).ready(function(){
			let name = $('#name').val();
			let mobile = $('#mobile').val();
			let email = $('#email').val();
			let username = $('#username').val();
			let password = $('#password').val();
			let amount = $('#amount').val();
			let ref = 0;
			$.ajax({
			  type: 'post',
			  data: {
			  	'save' : 1,
			  	'name' : name,
				'mobile' : mobile,
				'email' : email,
				'username' : username,
				'password' : password,
				'amount' : amount,
				'ref' : 'not_paid'
			  },
			  success: function(response){
				$('#reg_btn').attr("disabled", true);
			  	$('#info_msg').text('You have been registered');
			  	$('#name').val('');
				$('#mobile').val('');
				$('#email').val('');
				$('#username').val('');
				$('#password').val('');
				$('#amount').val('');
				window.location.replace("https://www.newcashpoint.com/login?action=registered");
			  }
			});
			});
			}
          let handler = PaystackPop.setup({
            key: 'pk_live_afe74b105d35414b5e838c8c28603b1aa2a509a3', // Replace with your public key
            email: document.getElementById("email").value,
            amount: document.getElementById("amount").value * 100,
            firstname: document.getElementById("name").value,
            callback: function(resp){
                let reference = resp.reference;
                //alert(' Payment complete! Reference: ' + reference);
                //if(response.status=='success'){
                    // register the user from this point and the reference with ajax
                //} else {
                    // register the user without reference with ajax
                //}
                $.ajax({
                    url: 'https://cors-anywhere.herokuapp.com/https://www.newcashpoint.com/verify_transaction?reference='+ reference,
                    method: 'get',
                    success: function (response) {
                        alert(response);
                        //if(response.data.status == 'success'){
                            //alert(response.data.status);
                        //}
                        // the transaction status is in response.data.status
					$(document).ready(function(){
					    let name = $('#name').val();
					    let mobile = $('#mobile').val();
					    let email = $('#email').val();
					    let username = $('#username').val();
					    let password = $('#password').val();
					    let amount = $('#amount').val();
					    let ref = reference;
					// proceed with form submission
					$.ajax({
					  type: 'post',
					  data: {
					  	'save' : 1,
					  	'name' : name,
						'mobile' : mobile,
						'email' : email,
						'username' : username,
						'password' : password,
						'amount' : amount,
						'ref' : ref
					  },
					  success: function(response){
						$('#reg_btn').attr("disabled", true);
					  	$('#info_msg').text('Congratulations You have been registered');
					  	$('#name').val('');
						$('#mobile').val('');
						$('#email').val('');
						$('#username').val('');
						$('#password').val('');
						$('#amount').val('');
					  }
					});
					});
                    }
                });
            },
            onClose: function(){
              alert('Transaction was not completed, you will registered now, then you can pay later.');
			$(document).ready(function(){
			    let name = $('#name').val();
			    let mobile = $('#mobile').val();
			    let email = $('#email').val();
			    let username = $('#username').val();
			    let password = $('#password').val();
			    let amount = 0;
			$.ajax({
			  type: 'post',
			  data: {
			  	'save' : 1,
			  	'name' : name,
				'mobile' : mobile,
				'email' : email,
				'username' : username,
				'password' : password,
				'amount' : amount
			  },
			  success: function(response){
				$('#reg_btn').attr("disabled", true);
			  	$('#info_msg').text('You have been registered');
			  	$('#name').val('');
				$('#mobile').val('');
				$('#email').val('');
				$('#username').val('');
				$('#password').val('');
				$('#amount').val('');
			  }
			});
			});
              // Make an AJAX call to register the user without the reference
            },
          });
          handler.openIframe();
        }
	</script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-171510987-1');
	</script>
  <script>
	  function All_free() {
	    /* Get the text field */
	    var copyText = document.getElementById("All_free");
	    /* Select the text field */
	    copyText.select();
	    copyText.setSelectionRange(0, 99999); /*For mobile devices*/
	    /* Copy the text inside the text field */
	    document.execCommand("copy");
	    /* Alert the copied text */
	    //alert("Copied the text: " + copyText.value);
	  }
	  function Reg_free() {
      /* Get the text field */
      var copyText = document.getElementById("Reg_free");
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/
      /* Copy the text inside the text field */
      document.execCommand("copy");
      /* Alert the copied text */
      //alert("Copied the text: " + copyText.value);
	  }
	  function cp15() {
      /* Get the text field */
      var copyText = document.getElementById("cp_1.5k");
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/
      /* Copy the text inside the text field */
      document.execCommand("copy");
      /* Alert the copied text */
      //alert("Copied the text: " + copyText.value);
	  }
	  function cp10() {
      /* Get the text field */
      var copyText = document.getElementById("cp_1k");
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/
      /* Copy the text inside the text field */
      document.execCommand("copy");
      /* Alert the copied text */
      //alert("Copied the text: " + copyText.value);
	  }
	  function cp7() {
      /* Get the text field */
      var copyText = document.getElementById("cp_.7k");
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/
      /* Copy the text inside the text field */
      document.execCommand("copy");
      /* Alert the copied text */
      //alert("Copied the text: " + copyText.value);
	  }
  	window.twttr = (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0],
	    t = window.twttr || {};
	  if (d.getElementById(id)) return t;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);
	  t._e = [];
	  t.ready = function(f) {
	    t._e.push(f);
	  };
	  return t;
	}(document, "script", "twitter-wjs"));

    grecaptcha.ready(function () {
      grecaptcha.execute('6LdCSKYZAAAAAAsc_S65o2hQR6hj5HK5CciNx_of', { action: 'contact' }).then(function (token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
          recaptchaResponse.value = token;
      });
    });

  	(function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
	    fjs.parentNode.insertBefore(js, fjs);
  	}(document, 'script', 'facebook-jssdk'));
  </script>
</body>
</html>
<?php ob_end_flush(); ?>