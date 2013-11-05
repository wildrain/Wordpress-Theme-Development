<?php if (!function_exists('dynamic_sidebar')|| !dynamic_sidebar('main-sidebar')): ?>

	<div class="sidebar-widget">
					
		 <h4><?php _e('Search','wildrain-blog') ?></h4>
		 
		 <?php get_search_form(); ?>
		
	</div> <!-- end sidebar-widget -->
	
<?php endif ?>