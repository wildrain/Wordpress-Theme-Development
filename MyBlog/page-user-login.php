<?php

/**
 * Template Name: bbPress - User Login
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

					<div id="bbp-login" class="col-lg-9 bbp-login">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content ">

							<?php the_content(); ?>

							<?php bbp_breadcrumb(); ?>

							<?php bbp_get_template_part( 'form', 'user-login' ); ?>

						</div>
					</div><!-- #bbp-login -->

					<div class="col-lg-3 citebar">
						<?php get_sidebar(); ?>
					</div>

				<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #container -->


<?php get_footer(); ?>
