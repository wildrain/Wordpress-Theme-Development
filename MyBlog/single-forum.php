<?php

/**
 * Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		
			<div class="container" id="content" role="main">

				<?php do_action( 'bbp_template_notices' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( bbp_user_can_view_forum() ) : ?>

						<div id="forum-<?php bbp_forum_id(); ?>" class="bbp-forum-content">
							

							

							<div class="row entry-content">
								<div class="col-lg-9">

									<div class="row">
										<div class="col-lg-7">
											<h1 class="entry-title"><?php bbp_forum_title(); ?></h1>
										</div>
										<div class="col-lg-5">
											<?php echo do_shortcode('[bbp-search-form] '); ?>
										</div>
									</div>


									<?php bbp_get_template_part( 'content', 'single-forum' ); ?>
								</div>

								<div class="col-lg-3 citebar">
									<?php get_sidebar(); ?>
								</div>

								

							</div>
						</div><!-- #forum-<?php bbp_forum_id(); ?> -->

					<?php else : // Forum exists, user no access ?>

						<?php bbp_get_template_part( 'feedback', 'no-access' ); ?>

					<?php endif; ?>

				<?php endwhile; ?>

			</div><!-- #content -->
			



<?php get_footer(); ?>
