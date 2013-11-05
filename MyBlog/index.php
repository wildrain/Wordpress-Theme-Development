<?php get_header(); ?>

	<div class="container">
	
		<div class="row">
		
			<div class="col col-lg-9 article-container-fix">
				
				<div class="article-container">
				
					<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

						<?php get_template_part('content', get_post_format()); ?>
						<!-- <hr class="fancy-hr" /> -->
					<?php endwhile; else : ?>
						<article class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class('no-posts'); ?>>

							<h1><?php _e('No posts were found.', 'adaptive-framework'); ?></h1>
							
						</article>
						
					<?php endif; ?>
					
					<div class="article-nav clearfix">
					
						<p class="article-nav-next"><?php previous_posts_link(__('Newer Posts &raquo;', 'adaptive-framework')); ?></p>
						<p class="article-nav-prev"><?php next_posts_link(__('&laquo; Older Posts', 'adaptive-framework')); ?></p>
					
					</div> <!-- end clearfix -->
					
				</div> <!-- end article-container -->
				
				
			</div>  <!-- end span9 -->
			
			<aside class="main-sidebar col col-lg-3 citebar">
				
				<?php get_sidebar('main-sidebar'); ?>
												
			</aside> <!-- end span3 -->
			
		</div> <!-- end row -->
		
	</div> <!-- end container -->

<?php get_footer(); ?>