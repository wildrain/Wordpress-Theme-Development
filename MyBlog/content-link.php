<?php
/***********************************************************************************************/
/* Template for the link post format */
/***********************************************************************************************/
?>

<article class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
	
	
	<div class="url-container blog-content">
	
		<?php $url_content = strip_tags(get_the_content()); ?>
	
		<h1><a href="<?php echo $url_content; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1><hr class="separator">
		
	</div> <!-- end quote-container -->

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
