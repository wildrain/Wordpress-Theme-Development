<?php

/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_replies_loop' ); ?>

	<table class="bbp-replies roman-replies" id="topic-<?php bbp_topic_id(); ?>-replies">
		<thead>
			<tr>
				<th class="bbp-reply-author"><?php  //_e( 'Author',  'bbpress' ); ?></th>
				<th class="bbp-reply-content">

					<?php if ( !bbp_show_lead_topic() ) : ?>

						<?php //_e( 'Posts', 'bbpress' ); ?>

						<?php bbp_user_subscribe_link(); ?>

						<?php bbp_user_favorites_link(); ?>

					<?php else : ?>

						<?php //_e( 'Replies', 'bbpress' ); ?>

					<?php endif; ?>

				</th>
			</tr>
		</thead><hr>

		<!-- <tfoot>
			<tr>
				<th class="bbp-reply-author"><?php  _e( 'Author',  'bbpress' ); ?></th>
				<th class="bbp-reply-content">

					<?php if ( !bbp_show_lead_topic() ) : ?>

						<?php _e( 'Posts', 'bbpress' ); ?>

					<?php else : ?>

						<?php _e( 'Replies', 'bbpress' ); ?>

					<?php endif; ?>

				</th>
			</tr>
		</tfoot> -->

		<tbody class="roman-body">

			<?php while ( bbp_replies() ) : bbp_the_reply(); ?>

				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

			<?php endwhile; ?>

		</tbody>

	</table>

	<?php //do_action( 'bbp_template_after_replies_loop' ); ?>
