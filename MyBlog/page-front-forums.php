<?php

/**
 * Template Name: bbPress - Forums (Index)
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		<div id="container" class="container">
			<div class="row">
				
					<div id="content" role="main">

						<?php do_action( 'bbp_template_notices' ); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<div id="forum-front" class="col-lg-9 bbp-forum-front">
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<div class="entry-content">

									<?php //the_content(); ?>

									<?php bbp_get_template_part( 'content', 'archive-forum' ); ?>

								</div>
							</div><!-- #forum-front -->

						<?php endwhile; ?>

						<div class="col-lg-3 citebar">
							<?php get_sidebar(); ?>
						</div>

					</div><!-- #content -->
				
			</div>
		</div><!-- #container -->


<?php get_footer(); ?>
