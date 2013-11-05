<!-- FOOTER -->
	<footer>
		
		<div class="footer-widget-area">
		
			<div class="container">
			
				<div class="row">
				
					<?php get_sidebar('left-footer'); ?>
					
					<?php get_sidebar('right-footer') ?>
					
					
					
				</div> <!-- end row -->
				
			</div> <!-- end container -->
			
		</div> <!-- end footer-widget-area -->
		
		<div class="copyright-container clearfix">
			
			<div class="container">
			
				<p class="top-link-footer"><a href="<?php home_url(); ?>"><?php _e('Go to the top','adaptive-framework') ?></a></p>
				<p>&copy <?php echo date('Y'); ?> <a href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a> </p>
			
			</div> <!-- end container -->
			
		</div> <!-- end copyright-container -->
		
	</footer>

    <?php wp_footer(); ?>
	<!-- JavaScript -->
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/scripts.js"></script>
    
</body>
</html>

