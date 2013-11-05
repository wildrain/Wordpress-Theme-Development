<?php

/**
 * Merge topic page
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		<div id="container" class="container">
			<div id="content" role="main" class="row">

				<?php do_action( 'bbp_template_notices' ); ?>

				<?php while ( have_posts() ) the_post(); ?>

					<div id="bbp-edit-page" class="bbp-edit-page col-lg-9">
						<h1 class="entry-title"><?php the_title(); ?> ok do it</h1>
						<div class="entry-content">

							<?php bbp_get_template_part( 'form', 'topic-merge' ); ?>

						</div>
					</div><!-- #bbp-edit-page -->

					<div class="col-lg-3 citebar">
						<?php get_sidebar(); ?>
					</div>

			</div><!-- #content -->
		</div><!-- #container -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>