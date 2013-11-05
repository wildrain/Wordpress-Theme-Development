<?php
/*
	Template Name: Full Width page
*/ 
 ?>



<?php get_header(); ?>
	
<div class="container">
	
		<div class="row">
		
			<div class="col col-lg-12 article-container-fix">
				
				<div class="articles">
				
					<article class="clearfix">						

						<header>
							
							
							<h1><?php _e('Page Not Found','adaptive-framework'); ?></h1>
							
							
							
						</header>
						
						<hr class="image-replacement"></hr>
						
						<?php _e('Ooops it seems your are looking for something is\'t here .Please try another ','adaptive-framework'); ?>
						<hr class="image-replacement"></hr>
						<?php get_search_form(); ?>
						<hr class="image-replacement"></hr>
					</article>

					
					
				</div> <!-- end articles -->
				
				
				
			</div> <!-- end span9 -->
			
			
			
		</div> <!-- end row -->
		
	</div> <!-- end container -->



<?php get_footer(); ?>