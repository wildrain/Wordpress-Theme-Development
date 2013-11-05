<?php get_header(); ?>
	
<div class="container">
	
		<div class="row">
		
			<div class="col-lg-9 article-container-fix">
				
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
						
						<?php the_content(); ?>							
							

						<div>
							<?php
							 	$args= array(
							 			'before' => '<p class="post-navigation">',
							 			'after' => '</p>',
							 			'pagelink' => 'Page %'
							 		); 
							 ?>
							<?php wp_link_pages($args); ?>
						</div>


						

					    <?php endwhile; ?>
					    <?php endif; ?>	
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