<?php
// stop automatic loading the comments

if(!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php'){
	die(__('you can not access this file directly','adaptive-framework'));
}	 

//check comments is password protected

if(post_password_required()) : ?>
	<p>
		<?php _e('the post is password portected ! please enter the password ','adaptive-framework'); ?>
		<?php return; ?>
	</p>

<?php endif; ?>



<?php if(have_comments()) : ?>


	<a href="#respond" class="article-add-comments">+</a>
	<h3><?php comments_number(__('no comment','adaptive-framework'),__('one comment','adaptive-framework'),'% comments','adaptive-framework'); ?></h3>
					
		<ol class="commentslist">
			
			<?php wp_list_comments('callback=adaptive_comments');  ?>

		</ol>

	<?php if(get_comment_pages_count() > 1 && get_option('page_comments')): ?>	
		<div class="comments-nav-section clearfix">
							
			<p class="fl"><?php previous_comments_link(__('&larr; older comments','adaptive-framework')); ?></p>
			<p class="fr"><?php next_comments_link(__('newer comments &rarr;','adaptive-framework')); ?></p>
			
		</div> <!-- end comments-nav-section -->
	<?php endif; ?>		


	<?php elseif(!comments_open() && !is_page() && post_type_supports(get_post_type(),'comments')) : ?>
		<?php _e('comments are  closed understand ','adaptive-framework'); ?>	
<?php endif; ?>	


<?php 
	//display comment form
	comment_form(); 
 ?>	
