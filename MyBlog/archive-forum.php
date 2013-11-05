<?php

/**
 * bbPress - Forum Archive
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

	<div id="container jan" class="container bbpress-container">


			
				<div class="article-container-fix">
					
					
					<div id="content" role="main">

						<?php
						/*add_action( 'bbp_theme_after_forum_description', 'jc_after_forum_description' );
							function jc_after_forum_description() {
							     echo 'Hello world!';
							} 
*/						?>

						<?php do_action( 'bbp_template_notices' ); ?>

						<div id="forum-front" class="bbp-forum-front roman-archive">
							<div class="row">
								<div class="col col-lg-7">
									<h1 class="entry-title roman-title"><?php bbp_forum_archive_title(); ?></h1>
								</div>
								<div class="col col-lg-5">
									<p><?php echo do_shortcode('[bbp-search-form] '); ?></p>
								</div>
							</div><hr>
							<div class="row entry-content roman-entry">

								<div class="col-lg-9">
									<?php bbp_get_template_part( 'content', 'archive-forum' ); ?>
								</div>
								<aside class="col-lg-3 citebar">
									<?php get_sidebar(); ?>
								</aside>

							</div>
						</div><!-- #forum-front -->

					</div><!-- #content -->
					
					
				
			
			
				</div> <!-- end row -->


	</div><!-- #container -->	

<?php get_footer(); ?>
