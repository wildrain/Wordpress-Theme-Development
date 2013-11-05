<?php

/**
 * Template Name: bbPress - right-sidebar
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		<div id="container" class="container">
			<div class="row">
				
					<div id="content" role="main">

						<?php do_action( 'bbp_template_notices' ); ?>

						<div class="col-lg-3 citebar">
							<?php get_sidebar(); ?>
						</div>

						<?php while ( have_posts() ) : the_post(); ?>

							<div id="forum-front" class="col-lg-9 bbp-forum-front">

								<div class="row">
									<div class="col-lg-7">
										<h1 class="entry-title"><?php the_title(); ?></h1>
									</div>
									<div class="col-lg-5">
										<?php echo do_shortcode('[bbp-search-form] '); ?>
									</div>
								</div>
								
								<div class="entry-content">

									<?php the_content(); ?>

									<?php bbp_get_template_part( 'content', 'archive-forum' ); ?>

								</div>
							</div><!-- #forum-front -->

						<?php endwhile; ?>

						

					</div><!-- #content -->
				
			</div>
		</div><!-- #container -->


<?php get_footer(); ?>
