<?php

/**
 * Template Name: bbPress - User Lost Password
 *
 * @package bbPress
 * @subpackage Theme
 */

// No logged in users
bbp_logged_in_redirect();

// Begin Template
get_header(); ?>

		<div id="container" class="container">
			<div id="content" role="main" class="row">

				<?php do_action( 'bbp_template_notices' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div id="bbp-lost-pass" class="col-lg-9 bbp-lost-pass">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">

							<?php the_content(); ?>

							<?php bbp_breadcrumb(); ?>

							<?php bbp_get_template_part( 'form', 'user-lost-pass' ); ?>

						</div>
					</div><!-- #bbp-lost-pass -->

				<?php endwhile; ?>

				<div class="col-lg-3 citebar">
					<?php get_sidebar(); ?>
				</div>

			</div><!-- #content -->
		</div><!-- #container -->


<?php get_footer(); ?>
