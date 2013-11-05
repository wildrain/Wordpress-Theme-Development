<?php
/*
	Template Name: archives page
*/ 
 ?>

<?php get_header(); ?>
	
<div class="container">
	
		<div class="row">
		
			<div class="col-lg-9 article-container-fix">
				
				<div class="articles">
				
					<article class="clearfix">
						

						<header>
							
							
							<h1><?php the_title(); ?></h1>
							<?php if(current_user_can('edit_post',$post->ID)): ?>
								<?php edit_post_link(__('edit this'),'<p class="article-meta-extra">','</p>'); ?>
							<?php endif; ?>
							
							
						</header>
						
						<hr class="image-replacement"></hr>


						<h1><?php _e('Archives by month','adaptive-framework'); ?></h1>
							<ul>
								<?php wp_get_archives('type=monthly'); ?>
							</ul>
							
						
						<hr class="image-replacement"></hr>	

						<h1><?php _e('Archives by Subject','adaptive-framework'); ?></h1>
							<ul>
								<?php wp_list_categories('title_li='); ?> 
							</ul>
							
						
						<hr class="image-replacement"></hr>						


					</article>

					
					
				</div> <!-- end articles -->
				
				<div class="comments-area" id="comments">
					
					<?php comments_template('','true'); ?>
					
				</div> <!-- end comments-area -->
				
			</div> <!-- end col-lg-9 -->
			
			<aside class="col-lg-3 citebar main-sidebar">
				
				<div class="sidebar-widget">
					
					 <?php get_sidebar(); ?>

				</div> <!-- end sidebar-widget -->
				
				<div class="sidebar-widget">
					
					2nd sidebar widget
					
				</div> <!-- end sidebar-widget -->
				
				<div class="sidebar-widget">
					
					3rd sidebar widget
					
				</div> <!-- end sidebar-widget -->

				<div class="sidebar-widget">
					
					4th sidebar widget
					
				</div> <!-- end sidebar-widget -->
				
				<div class="sidebar-widget">
					
					5th sidebar widgets
					
				</div> <!-- end sidebar-widget -->

			</aside>
			
		</div> <!-- end row -->
		
	</div> <!-- end container -->



<?php get_footer(); ?>