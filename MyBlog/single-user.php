<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		<div id="container" class="container">
			<div id="content" role="main" class="row">

				<div id="bbp-user-<?php bbp_current_user_id(); ?>" class="bbp-single-user">
					<div class="entry-content col-lg-9">

						<?php bbp_get_template_part( 'content', 'single-user' ); ?>

					</div><!-- .entry-content -->
				</div><!-- #bbp-user-<?php bbp_current_user_id(); ?> -->

				<div class="col-lg-3 citebar">
					<?php get_sidebar(); ?>

				</div>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
