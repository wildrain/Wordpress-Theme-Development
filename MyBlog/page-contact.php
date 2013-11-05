<?php
/*
	Template Name: Contact page
*/ 
 ?>

 <?php

//contact form information

 function isemail($verify_email){
 	return filter_var($verify_email, FILTER_VALIDATE_EMAIL);
 }


 $error_name = false;
 $error_email = false;
 $error_message = false;

 if(isset($_POST['contact-submit'])){
 	$name = '';
 	$email = '';
 	$url = '';
 	$website = '';
 	
 	//check for contact author
 	if(trim($_POST['contact-author'])===''){
 		$error_name = true;
 	}else{
 		$name = $_POST['contact-author'];
 	}

 	//check for contact email
 	if(trim($_POST['contact-email'])==='' || isemail($_POST['contact-email'])){
 		$error_email = true;
 	}else{
 		$email = $_POST['contact-email'];
 	}

 	$website = $_POST['contact-url'];

 	//check for contact message
 	if(trim($_POST['contact-author'])===''){
 		$error_message = true;
 	}else{
 		$message = stripcslashes(trim($_POST['contact-message']));
 	}


 	if($error_name=true && $error_message=true && $error_email=true){
 		
 		$receiver_email='rrfroman@gmail.com';

 		$subject = 'You\'ve been contacted by '. $name;
		$body = "You have been contacted by $name. Their message is:" . PHP_EOL . PHP_EOL;
		$body .= $message . PHP_EOL . PHP_EOL;
		$body .= "You can contact $name via email at $email";
		if ($website != '') { $body .= " and website $website"; }
		$body .= PHP_EOL . PHP_EOL;
		
		$headers = "From: $email" . PHP_EOL;
		$headers .= "Reply-To: $email" . PHP_EOL;
		$headers .= "MIME-Version: 1.0" . PHP_EOL;
		$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
		$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
		
		if (mail($receiver_email, $subject, $body, $headers)) {
			$email_sent = true;
		} else {
			$email_sent_error = true;
		}

 	}else{
 		echo "not very good";
 	}

 }

  ?>


<?php get_header(); ?>
	
<div class="container">
	
		<div class="row">
		
			<div class="col-lg-12 article-container-fix">
				
				<div class="articles">
				
					<article class="clearfix">
						<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

						<header>
							
							
							<h1><?php the_title(); ?></h1>
							<?php if(current_user_can('edit_post',$post->ID)): ?>
								<?php edit_post_link(__('edit this'),'<p class="article-meta-extra">','</p>'); ?>
							<?php endif; ?>
							
							
						</header>

						<hr class="image-replacement"></hr>


					   	<?php if(isset($email_send) && $email_send==true): ?>
					   		<h3><?php _e('Sucess!','adaptive-framework'); ?> </h3>
					   		<p><?php _e('you successfully send the mail','adaptive-framework'); ?> </p>

					   	<?php elseif(isset($email_send_error) && $email_send_error==true): ?>
					   		<h3><?php _e('Error!','adaptive-framework'); ?> </h3>
					   		<p><?php _e('you have encounter an error please try again','adaptive-framework'); ?> </p>

						<?php else: ?>
							
						
							<?php the_content(); ?>	

							<hr class="image-replacement"></hr>		


							<!-- start contact page information
							================================================== -->


							<form action="<?php the_permalink(); ?>" method="post" id="contact-form">
								<p>
									<input type="text" value="" name="contact-author" id="contact-author" />
									<label for="author">Name *</label>
								</p>
								<p>
									<input type="text" value="" name="contact-email" id="contact-email" />
									<label for="email">Email *</label>
								</p>
								<p>
									<input type="text" value="" name="contact-url" id="url" />
									<label for="url">Website</label>
								</p>
								<p>
									<textarea name="contact-message" id="contact-message" cols="30" rows="10"></textarea>
								</p>

								<input type="hidden" name="contact-submit" id="contact-submit" value="true" />
								
								<p><input type="submit" value="Send message" /></p>
							</form>

							<!-- end of contact form information
							================================================== -->


						<?php endif; ?>
					

					    <?php endwhile; ?>
					    <?php endif; ?>	
					</article>

					
					
				</div> <!-- end articles -->
				
				
				
			</div> <!-- end col-lg-9 -->
			
			
			
		</div> <!-- end row -->
		
	</div> <!-- end container -->



<?php get_footer(); ?>