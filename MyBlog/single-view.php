<?php

/**
 * Single View
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		<div id="container" class="container">
			<div id="content" role="main" class="row">

				<?php do_action( 'bbp_template_notices' ); ?>

				<div id="bbp-view-<?php bbp_view_id(); ?>" class="col-lg-9 bbp-view">
					<h1 class="entry-title"><?php bbp_view_title(); ?></h1>
					<div class="entry-content">

						<?php bbp_get_template_part( 'content', 'single-view' ); ?>

					</div>
				</div><!-- #bbp-view-<?php bbp_view_id(); ?> -->

			</div><!-- #content -->
			<div class="col-lg-3 citebar">
				<?php get_sidebar(); ?>
			</div>
		</div><!-- #container -->

<?php get_footer(); ?>
