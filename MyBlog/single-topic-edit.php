<?php

/**
 * Edit handler for topics
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		<div id="container" class="container">
			<div id="content" role="main" class="row">

				<?php while ( have_posts() ) : the_post(); ?>

					<div id="bbp-edit-page" class="bbp-edit-page col-lg-9">
						<h1 class="entry-title"><?php the_title(); ?> </h1>
						<div class="entry-content">

							<?php bbp_get_template_part( 'form', 'topic' ); ?>

						</div>
					</div><!-- #bbp-edit-page -->

				<?php endwhile; ?>

				<div class="col-lg-3 citebar">
					<?php get_sidebar(); ?>
				</div>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
