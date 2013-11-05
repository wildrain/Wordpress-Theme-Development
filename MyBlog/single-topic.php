<?php

/**
 * Single Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		<div id="container roman-topics-container" class="container">
			<div class="row" id="content" role="main">
				<div class="col-lg-9 entry-content">
					<?php do_action( 'bbp_template_notices' ); ?>

					<?php if ( bbp_user_can_view_forum( array( 'forum_id' => bbp_get_topic_forum_id() ) ) ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<div id="bbp-topic-wrapper-<?php bbp_topic_id(); ?>" class="bbp-topic-wrapper">
								
								<?php bbp_get_template_part( 'content', 'single-topic' ); ?>

					</div>
						</div><!-- #bbp-topic-wrapper-<?php bbp_topic_id(); ?> -->

					<?php endwhile; ?>

				<?php elseif ( bbp_is_forum_private( bbp_get_topic_forum_id(), false ) ) : ?>

					<?php bbp_get_template_part( 'feedback', 'no-access' ); ?>

				<?php endif; ?>

				<div class="col-lg-3 citebar">
					<?php get_sidebar(); ?>
				</div>

			</div><!-- #content -->
		</div><!-- #container -->


<?php get_footer(); ?>
