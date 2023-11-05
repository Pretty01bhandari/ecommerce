<?php 
require('top.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
		window.location.href='my_order.php';
	</script>
	<?php
}
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpeg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Forget Password</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Forget Password</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" id="email" 
											placeholder="Your Email*" style="width:100%">
										</div>
                                        <span class="field_error" id="email_error"></span>
									</div>
									<div class="contact-btn">
										<button type="button" class="fv-btn" onclick="forget_password()" id="btn_submit">Submit</button>
										
									</div>
								</form>
								<div class="form-output login_msg field_error">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
		<!-- to check wether both the otp's are verified or not -->
		<input type="hidden" id="is_email_verified"/>
		<input type="hidden" id="is_mobile_verified"/>
		<script>
			function forget_password(){
				var email=jQuery('#email').val();
				if(email==''){
					jQuery('#email_error').html('Please enter email id');
				}else{
					jQuery('btn_submit').html('Please wait...');
					jQuery('btn_submit').attr('disabled',true);
					jQuery.ajax({
						url:'forget_password_submit.php',
						type:'post',
						data:'email='+email,
						success:function(){
							jQuery('#email_error').html(results);
							jQuery('btn_submit').html('Submit');
							jQuery('btn_submit').attr('disabled',false);
						}
					})
				}
			}
			
		</script>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
       
    </div>
<?php require('footer.php')?>