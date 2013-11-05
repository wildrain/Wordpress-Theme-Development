<?php

/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums roman-single-topics08">

	<?php bbp_breadcrumb(); ?>

	<?php do_action( 'bbp_template_before_single_topic' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		

		

		<div class="row">
			<div class="span9">

				<div class="infobox" role="main">

					<div id="topic-info">						
						<h2 class="topictitle not_support"><?php bbp_topic_title(); ?></h2>
						<span id="topic_posts">12 posts from </span>
						<span id="topic_voices">8 voices</span>

						<ul class="topicmeta">
							<?php bbp_single_topic_description(); ?>
							<!--
							<li>Started 1 year ago by Dude</li>
							<li><a href="">Latest reply</a> from Dude</li>
							<li>This topic is <img src=""> sticky</li>
							<li id="support-status">This topic is <img src="" style="vertical-align: middle;"> not a support question</li>
							-->
						</ul>

					</div>

					<div id="topic-tags">	


						<ul id="tags-list" class="tags-list list:tag">
							<li><?php bbp_topic_tag_list(); ?></li>
							<!--
							<li id="tag-7582_10805"><a href="" rel="tag">Abundance localization</a> </li>
							<li id="tag-3695_6359" class="alt"><a href="" rel="tag">french translation</a> </li>
							<li id="tag-4352_6359"><a href="">lang</a> </li>
							<li id="tag-62_6359" class="alt"><a href="" rel="tag">Language</a> </li>
							<li id="tag-2835_10805"><a href="h">spanish</a> </li>
							<li id="tag-1343_10805" class="alt"><a href="" rel="tag">translate</a> </li>
							<li id="tag-76_10805"><a href="">translation</a> </li>
							<li id="tag-7659_10805" class="alt"><a href="">WooCommerce localization</a> </li>
							-->
						</ul>


					</div>

					<div style="clear:both;"></div>
				</div>
			</div>
		</div>

			




		<?php if ( bbp_show_lead_topic() ) : ?>

			<?php bbp_get_template_part( 'content', 'single-topic-lead' ); ?>

		<?php endif; ?>

		<?php if ( bbp_has_replies() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

			<?php bbp_get_template_part( 'loop',       'replies' ); ?>

			<?php //bbp_get_template_part( 'pagination', 'replies' ); ?>

		<?php else : ?>

			<?php bbp_get_template_part( 'feedback',   'no-replies' ); ?>

		<?php endif; ?>

		<?php bbp_get_template_part( 'form', 'reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_topic' ); ?>

</div>