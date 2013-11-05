<?php get_header(); ?>
	
<div class="container">
	
		<div class="row">
		
			<div class="col-lg-9 article-container-fix">
				
				<div class="articles">
				
					<article class="clearfix">
						<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

						<header>
							
							<?php
								//display the comments if comments are open and is not pass protected
								if(comments_open()&&!post_password_required()){
									comments_popup_link('0','1','%','article-meta-comments ');
								} 
							 ?>  

							<p class="article-meta-categories"><?php the_category('&nbsp;/&nbsp'); ?></p>
							<h1><?php the_title(); ?></h1>
							<p class="article-meta-extra"><?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?> 
							 by <?php the_author_posts_link(); ?></p>
							
						</header>
						<?php if(has_post_thumbnail()): ?>
							<figure class="article-full-image">
								<?php the_post_thumbnail(); ?>	
							</figure>
							<?php else: ?>
								</hr>
						<?php endif; ?>
						
						<?php the_content(); ?>	


						<?php if(has_tag()): ?>
							<p class="tag-container"><?php the_tags(); ?> </p>
						<?php endif; ?>
							

						<div>
							<?php
							 	$args= array(
							 			'before' => '<p class="post-navigation">',
							 			'after' => '</p>',
							 			'pagelink' => 'Page %'
							 		); 
							 ?>
							<?php wp_link_pages($args); ?>
						</div>


						<div class="article-author">
						
							<h5>Article by <?php the_author_posts_link(); ?></h5>
							<div class="social-icon">
								
								<ul class="social-icons inline">
									<li><h3>share with : </h3></li>
									<!-- <li><a href="https://twitter.com/share" class="icon-twitter"></a></li> -->
									<!-- <li><a href="" class="icon-facebook"></a></li> -->
									<a href="#" 
									  onclick="
									    window.open(
									      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
									      'facebook-share-dialog', 
									      'width=626,height=436'); 
									    return false;">
									  Share on Facebook
									</a>
									<li><a href="" class="icon-google-plus"></a></li>
									<li><a href="https://twitter.com/share" class="twitter-share-button" data-via="roman_ul_ferdos">tweet</a></li>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
								</ul>
							</div>
							<p><?php the_author_meta('description'); ?></p>
							
						</div> <!-- end article-author -->

					    <?php endwhile; ?>
					    <?php endif; ?>	
					</article>

					
					
				</div> <!-- end articles -->
				
				<div class="comments-area" id="comments">
					
					<?php comments_template('','true'); ?>
					
				</div> <!-- end comments-area -->
				
			</div> <!-- end col-lg-9 -->
			
			<aside class="col-lg-3 citebar main-sidebar">
				
				<div class="sidebar-widget">
					
					 <?php get_sidebar(); ?>

				</div> <!-- end sidebar-widget -->
				
				<div class="sidebar-widget">
					
					2nd sidebar widget
					
				</div> <!-- end sidebar-widget -->
				
				<div class="sidebar-widget">
					
					3rd sidebar widget
					
				</div> <!-- end sidebar-widget -->

				<div class="sidebar-widget">
					
					4th sidebar widget
					
				</div> <!-- end sidebar-widget -->
				
				<div class="sidebar-widget">
					
					5th sidebar widgets
					
				</div> <!-- end sidebar-widget -->

			</aside>
			
		</div> <!-- end row -->
		
	</div> <!-- end container -->



<?php get_footer(); ?>