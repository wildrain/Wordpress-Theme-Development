<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('!',true,'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet'>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	 

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="<?php print IMAGES; ?>/icons/favicon.ico">
	<link rel="apple-touch-icon" href="<?php print IMAGES; ?>/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php print IMAGES; ?>/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php print IMAGES; ?>/icons/apple-touch-icon-114x114.png">
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"></script> <!-- jquery library --> 
		<script type="text/javascript">
			jQuery.noConflict();
			jQuery(document).ready(function() { 
				jQuery('#tabbed-reviews > ul').tabs({ fx: { opacity: 'toggle', duration: 200 } });
			});
		</script>

		<script type="text/javascript">
			jQuery.noConflict();
			jQuery(document).ready(function() { 
				jQuery('#roman-tabbed > ul').tabs({ fx: { opacity: 'toggle', duration: 200 } });
			});
		</script>


</head>
<body>

	<!-- HEADER -->
	<header class="main-header" id="top">
	
		<div class="top-menu-container">
		
			<div class="container">
			
				<div class="rwd-top-nav"></div> <!-- end rwd-top-nav -->
				
			</div> <!-- end container -->
			
		</div> <!-- end top-menu-container -->
		
		<div class="container">
		
			<div class="row">
			
				<div class="col-lg-3 logo-container">
					
					<h1 class="logo"><a href="<?php echo home_url(); ?>">
						<img src="<?php print IMAGES; ?>/logo.png" alt="<?php bloginfo('name'); ?>|<?php bloginfo('description'); ?>" /></a></h1>
					
				</div> <!-- end col-lg-3 citebar -->
				
				<div class="col-lg-9 bbpress-search clearfix">
					
					<p><?php echo do_shortcode('[bbp-search-form] '); ?></p>
					
				</div> <!-- end col-lg-9 -->
				
			</div> <!-- end row -->

			
			<hr />
			
			<nav class="main-navigation clearfix">
				<?php wp_nav_menu(
					array(
						'theme_location'=>'main-menu'
					)); ?>
			</nav>

			

			
			<div class="rwd-main-nav"></div> <!-- end rwd-main-nav -->
			
		</div> <!-- end container -->
		
	</header> <!-- end main-header -->