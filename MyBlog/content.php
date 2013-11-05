<?php
/* Template for standard post */

 ?>	
	<article class="blog-post" <?php post_class('clearfix'); ?> id="post-<?php the_ID();  ?>	">
							
		
		
		
		<div class="blog-content">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><hr class="separator">
			<?php if(has_post_thumbnail()): ?>
				<figure class="article-preview-image">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</figure>
			<?php endif; ?>
			
			<?php the_content('read more &raquo','adaptive-framework'); ?>
		</div>


		<div class="meta-info">
			<header>										
				<?php
					//display the comments if comments are open and is not pass protected
					/*if(comments_open()&&!post_password_required()){
						comments_popup_link('0','1','%','article-meta-comments ');
					} */
				 ?>  

				<!-- <p class="article-meta-categories"><?php the_category('&nbsp;/&nbsp'); ?>bah khub valo</p> -->
				
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