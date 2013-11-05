<?php get_header(); ?>

	<div class="container">
	
		<div class="row">
		
			<div class="col-lg-9 article-container-fix">
				
				<div class="article-container">
				
					<?php if (have_posts()) : ?>

						<div class="additional-content">
							<h1> <?php single_tag_title('Showing result for : ','wildrain-blog',true); ?></h1>
							<hr class="fancy-hr" />
						</div>

					<?php while(have_posts()) : the_post(); ?>

						<?php get_template_part('content', get_post_format()); ?>
						<hr class="fancy-hr" />

					<?php endwhile; else : ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('no-posts'); ?>>

							<h1><?php _e('No such tag is found ! please try somethign else ', 'wildrain-blog'); ?></h1>
							
						</article>
						
					<?php endif; ?>
					
					<div class="article-nav clearfix">
					
						<p class="article-nav-next"><?php previous_posts_link(__('Newer Posts &raquo;', 'wildrain-blog')); ?></p>
						<p class="article-nav-prev"><?php next_posts_link(__('&laquo; Older Posts', 'wildrain-blog')); ?></p>
					
					</div> <!-- end clearfix -->
					
				</div> <!-- end article-container -->
				
			</div>  <!-- end col-lg-9 -->
			
			<aside class="main-sidebar col-lg-3 citebar">
				
				<?php get_sidebar('main-sidebar'); ?>
												
			</aside> <!-- end col-lg-3 citebar -->
			
		</div> <!-- end row -->
		
	</div> <!-- end container -->

<?php get_footer(); ?>