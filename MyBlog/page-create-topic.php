<?php

/**
 * Template Name: bbPress - Create Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

		<div id="container" class="container">
			<div id="content" class="row" role="main">

				<?php do_action( 'bbp_template_notices' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="col-lg-9" id="bbp-new-topic" class="bbp-new-topic roman">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">

							<?php the_content(); ?>

							<?php bbp_get_template_part( 'form', 'topic' ); ?>

						</div>
					</div><!-- #bbp-new-topic -->

				<?php endwhile; ?>

				<div class="col-lg-3 citebar">
					<?php get_sidebar(); ?>
				</div>

			</div><!-- #content -->
		</div><!-- #container -->


<?php get_footer(); ?>
