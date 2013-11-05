<?php
/***********************************************************************************************/
/* Template for the gallery post format */
/***********************************************************************************************/
?>

<article class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
	
	
	<div class="blog-content">
		<?php 

			if (get_the_title() != '') : ?>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>"><?php _e('Permalink to the post', 'adaptive-framework'); ?></a>
			<?php endif; 
			
			$gallery_atts = array(
				'post_parent' => $post->ID,
				'post_mime_type' => 'image'
			);
			$gallery_images = get_children($gallery_atts);
			
			if (!empty($gallery_images)) {
				$gallery_count = count($gallery_images);
				$first_image = array_shift($gallery_images);
				$display_first_image = wp_get_attachment_image($first_image->ID);
				
				?>
				
			<figure class="article-preview-image">
				<a href="<?php the_permalink(); ?>"><?php echo $display_first_image; ?></a>
			</figure>
			
			<p><strong><?php printf(_n('This gallery contains %s photo.', 'This gallery contains %s photos.', $gallery_count, 'adaptive-framework'), $gallery_count); ?></strong></p>
			
			<?php }
			
			the_excerpt();
		
		?>
	</div>
	

	<div class="meta-info">
		<header>		
			
			<p class="article-meta-extra"> By <?php the_author_posts_link(); ?> | <?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?> 
				 | Cat : <?php the_category('&nbsp;|&nbsp'); ?><span class="comment-count">
				 <?php if(comments_open()&&!post_password_required()){
					comments_popup_link('0 comment','1 comment','% comments','article-meta-comments ');
				} ?>
				</span>
			 </p>
			
		</header>
	</div>
	
</article>

<hr class="fancy-hr" />

