<?php
/* Template for blockquote post */

 ?>	
	<article class="blog-post" <?php post_class('clearfix'); ?> id="post-<?php the_ID();  ?>	">


		
		
		<div class="link-container blog-content">			
			<?php the_content(); ?>			
		</div> <!-- end quote-container -->	

		<div class="meta-info">
			<header>
							
				<span class="post-format-url"></span>
				<!-- <p class="article-meta-categories"><?php the_category('&nbsp;/&nbsp'); ?></p>
				<p class="article-meta-extra"><?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?>  by <?php the_author_posts_link(); ?></p> -->

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