<?php

//define constants
define('THEMEROOT',get_stylesheet_directory_uri());
define('IMAGES',THEMEROOT.'/images');



//register menues


function register_my_menus(){
	register_nav_menus(
		array(			
			'main-menu' => __('Main Menu', 'adaptive-framework')
		)
	);
}
add_action('init', 'register_my_menus');


// register widgets


if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name'=>__('Main sidebar','adaptive-framework'),
			'id'=>'main-sidebar',
			'description'=>__('this is main side bar','adaptive-framework'),
			'before_widget'=>'<div class="sidebar-widget">',
			'after_widget'=>'</div>',
			'before_title'=>'<h4>',
			'after_title'=>'</h4>'
		));


	register_sidebar(
		array(
			'name'=>__('Left Footer','adaptive-framework'),
			'id'=>'left-footer',
			'description'=>__('this is left footer side bar','adaptive-framework'),
			'before_widget'=>'<div class="footer-sidebar-widget span3">',
			'after_widget'=>'</div>',
			'before_title'=>'<h4>',
			'after_title'=>'</h4>'
		));


	register_sidebar(
		array(
			'name'=>__('Right Footer','adaptive-framework'),
			'id'=>'right-footer',
			'description'=>__('this is right footer side bar','adaptive-framework'),
			'before_widget'=>'<div class="footer-sidebar-widget span6">',
			'after_widget'=>'</div>',
			'before_title'=>'<h4>',
			'after_title'=>'</h4>'
		));
}


// add theme support

if (function_exists('add_theme_support')) {
	add_theme_support('post-formats',array('link','quote','gallery'));
	add_theme_support('post-thumbnails',array('post'));
}



//comments area

function adaptive_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;


	// if pingback or trackback 
	
	if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>
	
		<li class="pingback" id="comment-<?php comment-ID(); ?>">
			<article <?php comment_class('clearfix'); ?>>
				<header>
					<h5><?php _e('Pingback','adaptive-framework'); ?></h5>
					<p><?php edit_comment_link(); ?></p>
				</header>
					
				<p> <?php comment_author_link(); ?></p>					
				</article>							

		
	<?php endif; ?>
	

	<!-- if comment
	================================================== -->
	
	<?php if (get_comment_type() == 'comment') : ?>
		
		<li id="comment-<?php comment_ID(); ?>	 ">
			<article <?php comment_class('clearfix'); ?>>
				<header>
					<h5><?php comment_author_link(); ?></h5>
					<p><span>on <?php comment_date(); ?> at <?php comment_time(); ?> - </span>
						<?php comment_reply_link(array_merge($args,array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?></p>
				</header>
				
				<figure class="comment-avatar">
					<?php
						$avatar_size = 80;
						if($comment->comment_parent!= 0){
							$avatar_size = 64;
						} 
						echo get_avatar($comment,$avatar_size);
					 ?>
				</figure>
				

				<?php if($comment->comment_approved == 0): ?>
				<p class="awaiting-moderation"><?php _e('your comment is awaiting for moderation','adaptive-framework') ?></p>
				<?php endif; ?>


				<p><?php comment_text(); ?></p>
			</article>							
		

	<?php endif;	
}


// coustom comment form 


function adaptive_custom_comment_form($defaults){
	$defaults['comment_notes_before'] = '' ;
	$defaults['id_form'] = 'comment-form';
	$defaults['comment_field'] = '<p><textarea name="comment" id="comment" cols="30" rows="10"></textarea></p>';

	return $defaults;

}
add_filter('comment_form_defaults','adaptive_custom_comment_form');


function adaptive_custom_comment_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');
	
	$fields = array(
		'author' => '<p>'.
						'<input type="text" name="author" id="author" value=" '. esc_attr($commenter['comment_author']) .'"  '. $aria_req .' />'.
						'<label for="author">'.  __('Name','adaptive-framework'). '' . ($req ? '*':'') .'</label>'.
					'</p>',	
		'email' => '<p>'.
						'<input type="text" name="email" id="email" value=" '. esc_attr($commenter['comment_author_email']) .'"  '. $aria_req .' />'.
						'<label for="email">'.  __('Email','adaptive-framework'). '' . ($req ? '*':'') .'</label>'.
					'</p>',
		'url' => '<p>' . 
						'<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" />' .
						'<label for="url">' . __('Website', 'adaptive-framework') . '</label>' .
		            '</p>'		

	);

	return $fields;
}

add_filter('comment_form_default_fields', 'adaptive_custom_comment_fields');





// shortcodes


function showads() {  
    return '<script type="text/javascript"><!-- 
			google_ad_client = "<em>your client id</em>"; 
			google_ad_slot = "<em>your ad slot id</em>"; 
			google_ad_width = <em>width</em>; 
			google_ad_height = <em>height</em>; 
			//--> 
			</script> 
			<script type="text/javascript" 
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js"> 
			</script> 
			';  
}  
  
add_shortcode('adsense', 'showads');  



function sc_note( $atts, $content = null ) {  

     if ( current_user_can( 'publish_posts' ) )  
        return '<div class="note">'.$content.'</div>';  
    return '';  
}  
  
add_shortcode( 'note', 'sc_note' ); 



function fn_googleMaps($atts, $content) {  


   $atts = shortcode_atts(array(  
      "width" => '640',  
      "height" => '480',  
      'content' => !empty($content)? $content : 'Find your destination',
      "src" => 'http://google.com/maps/?ie=...'  
   ), $atts); 

   extract($atts);
   echo $content; 

   return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'"></iframe>';  
}  
add_shortcode("googlemap", "fn_googleMaps"); 



function twitter( $atts, $content=null ){  
/* Author: Nicholas P. Iler 
 * URL: http://www.ilertech.com/2011/07/add-twitter-share-button-to-wordpress-3-0-with-a-simple-shortcode/ 
 */  
   
	

    extract(shortcode_atts(array(  
        'url' => null,  
        'counturl' => null,  
        'via' => '',  
        'text' => '',  
        'related' => '',  
        'countbox' => 'none', // none, horizontal, vertical  
   
    ), $atts));  
   
    // Check for count url and set to $url if not provided  
    if($counturl == null) $counturl = $url;  
   
    $twitter_code = '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"><!--mce:0--></script>  
<a class="twitter-share-button" href="http://twitter.com/share"></a>  
';  
   
    return $twitter_code;  
   
}  
add_shortcode('t', 'twitter'); 



function member_check_shortcode($atts,$content){

	$atts = shortcode_atts(array(
		'content' => !empty($content)? $content : 'Find your destination',
		),$atts);

	extract($atts);

	if(is_user_logged_in() && !empty($content) && !is_feed())
		return $content;

}

add_shortcode('member','member_check_shortcode'); 



/*function related_posts_shortcode( $atts ) {  
    extract(shortcode_atts(array(  
        'limit' => '5',  
    ), $atts));  
   
    global $wpdb, $post, $table_prefix;  
   
    if ($post->ID) {  
        $retval = '<ul>';  
        // Get tags  
        $tags = wp_get_post_tags($post->ID);  
        $tagsarray = array();  
        foreach ($tags as $tag) {  
            $tagsarray[] = $tag->term_id;  
        }  
        $tagslist = implode(',', $tagsarray);  
   
        // Do the query  
        $q = "SELECT p.*, count(tr.object_id) as count 
            FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID 
                AND p.post_status = 'publish' 
                AND p.post_date_gmt < NOW() 
            GROUP BY tr.object_id 
            ORDER BY count DESC, p.post_date_gmt DESC 
            LIMIT $limit;";  
   
        $related = $wpdb->get_results($q);  
        if ( $related ) {  
            foreach($related as $r) {  
                $retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';  
            }  
        } else {  
            $retval .= ' 
    <li>No related posts found</li>';  
        }  
        $retval .= '</ul>';  
        return $retval;  
    }  
    return;  
}


add_shortcode('related_posts','related_posts_shortcode');  */



/*add_shortcode('wcs_count', 'wcs_count_shortcode_handler');
 
function wcs_count_shortcode_handler($atts)
{
    // extract parameters
    $parms = shortcode_atts(array(
        'type' => 'posts',
        'format' => 'true',
        'extra' => '1',
        ), $atts);
 
    $type = strtolower($parms['type']);
    $format = strtolower($parms['format']);
    $extra = $parms['extra'];
 
    // process t/f options
    $b_format = false;
    if (($format == 'yes') || ($format == 'y') ||
        ($format == 'true') || ($format == '1'))
    {$b_format = true;}
 
 
    // exit
    return wcs_get_count($type, $b_format, $extra);
}
function wcs_get_count($type='posts', $format='1', $extra='1')
{
    // TYPES:
    // posts, posts_by_author, pages, tags, categories
    // users, ms_users, blogroll, blogroll_categories, commenters
    // comments, comments_pending, comments_spam, comments_pingback
    // comments_by_user, comments_by_nicename, comments_by_email
    // comments_per_post
 
    // $extra is used with:
    // posts_by_author, comments_by_user, comments_by_nicename, comments_by_email
    // comments_per_post
 
    // init
    global $wpdb;
    $type = strtolower($type);
    $count = 0;
 
    // process
    switch($type)
    {
        case 'posts': // published
        $count = wp_count_posts('post');
        $count = $count->publish;
        // options: publish, future, draft, pending, private, trash, auto-draft, & inherit
        break;
 
        case 'posts_by_author': // use $extra for user/author id
        case 'posts_by_user':
        $query = "SELECT COUNT(*) FROM $wpdb->posts ";
        $where = "WHERE post_type='post' AND post_status='publish' AND post_author='$extra'";
        $count = $wpdb->get_var($query . $where);
        // alternative method is: count_user_posts()
        break;
 
        case 'pages': // published
        $count = wp_count_posts('page');
        $count = $count->publish;
        break;
 
        case 'tags':
        $count = wp_count_terms('post_tag');
        break;
 
        case 'categories':
        $count = wp_count_terms('category');
        break;
 
        case 'users':
        $count = count_users();
        $count = $count['total_users'];
        break;
 
        case 'ms_users': // multi-site
        $count = get_user_count();
        break;
 
        case 'blogroll':
        $query = "SELECT COUNT(*) FROM $wpdb->links ";
        $where = "WHERE link_visible='Y'";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'blogroll_categories':
        $count = wp_count_terms('link_category');
        break;
 
        case 'commenters':
        $query = "SELECT COUNT(DISTINCT comment_author) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='1' AND comment_type=''";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'comments':
        $query = "SELECT COUNT(*) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='1' AND comment_type=''";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'comments_pending':
        $query = "SELECT COUNT(*) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='0' AND comment_type=''";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'comments_spam':
        $query = "SELECT COUNT(*) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='spam' AND comment_type=''";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'comments_pingback':
        case 'comments_pingbacks':
        case 'comments_trackback':
        case 'comments_trackbacks':
        $query = "SELECT COUNT(*) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='1' AND comment_type='pingback'";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'comments_by_user': // use $extra for user_id
        $query = "SELECT COUNT(*) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='1' AND comment_type='' AND user_id='$extra'";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'comments_by_author': // use $extra for author nicename (case INsensitive)
        case 'comments_by_nicename':
        $query = "SELECT COUNT(*) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='1' AND comment_type='' AND comment_author='$extra'";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'comments_by_email': // use $extra for author email (case INsensitive)
        $query = "SELECT COUNT(*) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='1' AND comment_type='' AND comment_author_email='$extra'";
        $count = $wpdb->get_var($query . $where);
        break;
 
        case 'comments_per_post': // $extra is decimal place precision (0 for integer only)
        // posts
        $posts_count = wp_count_posts('post');
        $posts_count = $posts_count->publish;
        // comments
        $query = "SELECT COUNT(*) FROM $wpdb->comments ";
        $where = "WHERE comment_approved='1' AND comment_type=''";
        $comment_count = $wpdb->get_var($query . $where);
        // average
        return round($comment_count / $posts_count, $extra);
 
        default:
        $count = 0;
    }
 
    // exit
    if ($format) {$count = number_format_i18n($count);}
    return $count;
 
    /**********************************************************************
     Copyright © 2011 Gizmo Digital Fusion (http://wpCodeSnippets.info)
     you can redistribute and/or modify this code under the terms of the
     GNU GPL v2: http://www.gnu.org/licenses/gpl-2.0.html
    **********************************************************************/
/*}*/



function wcs_count_shortcode_handler($atts){



    $prams = shortcode_atts(array(

        'type' => 'post',
        'format' => 'true',
        'extra' => '1'
        ),$atts);



    $type = strtolower($prams['type']);
    $format = strtolower($prams['format']);
    $extra = $prams['extra'];

    $b_format = false;

    if( ($format == 'yes') || ($format == 'y') || ($format == 'true') || ($format == '1'))
        $b_format = true;


    return wp_get_count($type,$format,$extra);

}



function wp_get_count($type='post',$format='1',$extra='1' ){


    global $wpdb;

    $type = strtolower($type);
    $count=0;


    switch ($type) {


        case 'posts':
            $count = wp_count_posts('post');
            $count = $count->publish;
            break;

        case 'posts_by_author':
        case 'posts_by_user':
            $query = "SELECT count(*) FROM $wpdb->posts";
            $where = "WHERE post_type='post' AND post_status='publish' AND post_author='$extra' ";
            $count = $wpdb->get_var($query.$where);
            break;

        case 'pages':
            $count = wp_count_posts('page');
            $count = $count->publish;
            break;    

        case 'tags':
            $count = wp_count_terms('post_tag');
            break;

        case 'categories':
            $count = wp_count_terms('category');
            break;    

        case 'users':
            $count = count_users();
            $count = $count['total_users'];
            break;  

        case 'ms_users':
            $count = get_user_count();
            break;

        case 'blogroll':
            $query = "SELECT count(*) FROM $wpdb->links ";
            $where = "WHERE link_visible='Y' ";
            $count = $wpdb->get_var($query.$where);
            break;

        case 'blogroll_categories':
            $count = wp_count_terms('link_category');
            break;

        case 'commenters':
            $query = " SELECT count(DISTINCT comment_author) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='1' AND comment_type='' ";
            $count = $wpdb->get_var($query.$where);
            break; 

        case 'comments':
            $query = " SELECT count(*) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='1' AND comment_type='' ";
            $count = $wpdb->get_var($query.$where);
            break;  

        case 'comments_pending':
            $query = " SELECT count(*) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='0' AND comment_type='' ";
            $count = $wpdb->get_var($query.$where);
            break;

        case 'comments_spam':
            $query = " SELECT count(*) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='spam' AND comment_type='' ";
            $count = $wpdb->get_var($query.$where);
            break;                              

        case 'comments_pingback':
        case 'comments_pingbacks':
        case 'comments_trackback':
        case 'comments_trackbacks':
            $query = " SELECT count(*) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='1' AND comment_type='pingback' ";
            $count = $wpdb->get_var($query.$where);
            break;  

        case 'commenters_by_user':
            $query = " SELECT count(*) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='1' AND comment_type='' AND user_id='$extra' ";
            $count = $wpdb->get_var($query.$where);
            break;  

        case 'commenters_by_author':
        case 'comments_by_nicename':
            $query = " SELECT count(*) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='1' AND comment_type='' AND comment_author='$extra' ";
            $count = $wpdb->get_var($query.$where);
            break;     

        case 'comments_by_email':
            $query = " SELECT count(*) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='1' AND comment_type='' AND comment_author_email='$extra' ";
            $count = $wpdb->get_var($query.$where);
            break;   

        case 'comments_per_post':
            $posts_count = wp_count_posts('post');
            $posts_count = $posts_count->publish;

            $query = " SELECT count(*) FROM $wpdb->comments ";
            $where= " WHERE comment_approved='1' AND comment_type=''";
            $comment_count = $wpdb->get_var($query.$where);

            return round($comment_count/$posts_count,$extra);
            break;


        
        default:
            $count = 0;
            break;
    }

    if ($format) {$count = number_format_i18n($count);}  
        return $count; 


}

add_shortcode('wcs_count','wcs_count_shortcode_handler');



function donate_shortcode( $atts ) {  
    extract(shortcode_atts(array(  
        'text' => 'Make a donation',  
        'account' => 'REPLACE ME',  
        'for' => '',  
    ), $atts));  
   
    global $post;  
   
    if (!$for) $for = str_replace(" ","+",$post->post_title);  
   
    return '<a class="donateLink" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation+for+'.$for.'">'.$text.'</a>';  
   
}  
add_shortcode('donate', 'donate_shortcode');  



//shortcode for blockcode


function pix_blockquote($atts){

    //print_r($atts);
    extract($atts);

   return '<blockquote>
  <p>'.$content.'</p><small>'.$author.'<cite title="Source Title">english</cite></small></blockquote>';

}



add_shortcode('blockquote','pix_blockquote');



 // start custom post type....


//##########################################  
//create custom post type of Movie Reviews  
//##########################################  
  

function create_roman_movie_review(){

    register_post_type('roman_movie_review',array(

        'labels'=>array(
                    'name'=>__('Movie Reviews','adaptive-framework'),
                    'singular_name'=>__('Movie Review','adaptive-framework'),
                    'add_new'=>__('Add New Review','adaptive-framework'),
                    'edit_item'=>__('Edit Review','adaptive-framework'),
                    'new_item'=>__('Add Review','adaptive-framework'),
                    'view_item'=>__('View Review','adaptive-framework'),
                    'search_items'=>__('Search Review','adaptive-framework'),
                    'not_found'=>__('Not Found Review','adaptive-framework'),
                    'not_found_in_trash' => __('No reviews found in Trash', 'adaptive-framework') 
            ),
        'public'=>true,
        'menu_position'=>25,
        'menu_icon' => admin_url().'images/media-button-video.gif',
        'rewrite'=>array('slug'=>'movie_review'),
        'supports' => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions'), 
        'taxonomies' => array('category', 'post_tag') 
        ));

}


add_action('init','create_roman_movie_review');




//##########################################  
//create custom post type of Music Reviews  
//##########################################  


function create_roman_music_review(){

    register_post_type('roman_music_review',array(

        'labels'=>array(
                    'name'=>__('Music Reviews','adaptive-framework'),
                    'singular_name'=>__('Music Review','adaptive-framework'),
                    'add_new'=>__('Add New Review','adaptive-framework'),
                    'edit_item'=>__('Edit Review','adaptive-framework'),
                    'new_item'=>__('Add Review','adaptive-framework'),
                    'view_item'=>__('View Review','adaptive-framework'),
                    'search_items'=>__('Search Review','adaptive-framework'),
                    'not_found'=>__('Not Found Review','adaptive-framework'),
                    'not_found_in_trash' => __('No reviews found in Trash', 'adaptive-framework') 
            ),
        'public'=>true,
        'menu_position'=>26,
        'menu_icon' => admin_url().'images/media-button-music.gif',
        'rewrite'=>array('slug'=>'movie_review'),
        'supports' => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions'), 
        'taxonomies' => array('category', 'post_tag') 
        ));



        /*add_action('add_meta_boxes','add_custom_meta_box');


        function add_custom_meta_box(){

        add_meta_box('custom_meta_box','Custom Meta Box','show_custom_meta_box','roman_music_review');
        }

        function show_custom_meta_box($post){

            ?>

                <p>
                    <label for="movie_name">Movie Name : </label>
                    <input type="text" class="widefat" id="movie_name" name="movie_name" value="<?php echo $movie; ?>" />
                </p>

                 <p>
                    <label for="movie_name">Movie length : </label>
                    <input type="text" class="widefat" id="movie_name" name="movie_name" value="<?php echo $movie; ?>" />
                </p>
            <?php

        }*/

}


add_action('init','create_roman_music_review');


//##########################################  
//create custom post type of Game Reviews  
//##########################################  

function create_roman_game_review(){

    register_post_type('roman_game_review',array(

        'labels'=>array(
                    'name'=>__('Game Reviews','adaptive-framework'),
                    'singular_name'=>__('Game Review','adaptive-framework'),
                    'add_new'=>__('Add New Review','adaptive-framework'),
                    'edit_item'=>__('Edit Review','adaptive-framework'),
                    'new_item'=>__('Add Review','adaptive-framework'),
                    'view_item'=>__('View Review','adaptive-framework'),
                    'search_items'=>__('Search Review','adaptive-framework'),
                    'not_found'=>__('Not Found Review','adaptive-framework'),
                    'not_found_in_trash' => __('No reviews found in Trash', 'adaptive-framework') 
            ),
        'public'=>true,
        'menu_position'=>27,
        'menu_icon' => admin_url().'images/media-button-other.gif',
        'rewrite'=>array('slug'=>'movie_review'),
        'supports' => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions'), 
        'taxonomies' => array('category', 'post_tag') 
        ));

}


add_action('init','create_roman_game_review');




//##########################################  
//create widget area for custom post type  
//########################################## 


class roman_review_widget extends WP_Widget{

    function __construct(){

        $params = array(
            'description' => 'An amazing review widget for custom post type.it will review movie,game,and music',
            'name' => 'Reviews'
            );

        parent::__construct('roman_review_widget','',$params);

    }

    public function form($instance){
        //print_r($instance);
        $defaults = array(
                        'sort'=>'latest',
                        'showmovies'=>true,
                        'showmusic'=>true,
                        'showgames'=>true,
                        'nummovies'=>10,
                        'nummusic'=>10,
                        'numgames'=>10
            );

        $instance = wp_parse_args(array($instance),$defaults);
       
        extract($instance);
        
        ?>

        <!-- html for form goes here
        ================================================== -->

        <p>
            <input
                class="radio"
                type="radio" <?php if($instance['sort']=='highest-rated') {  ?> checked <?php } ?>
                name="<?php echo $this->get_field_name('sort'); ?>"
                value="highest-rated"
            />Order reviews by highest rated<br />

            <input
                class="radio"
                type="radio" <?php if($instance['sort']!='highest-rated') {  ?> checked <?php } ?>                 
                name="<?php echo $this->get_field_name('sort'); ?>"
                value="latest"
            />Order reviews by latest
        </p>

        <p>
            <input
                type="checkbox"
                class="checkbox" 
                id="<?php echo $this->get_field_id('showmovies'); ?>"
                name="<?php echo $this->get_field_name('showmovies'); ?>"
                <?php checked(isset($instance['showmovies'])? $instance['showmovies'] : 0); ?>
            />Display 

            <input 
                id="<?php echo $this->get_field_id( 'nummovies' ); ?>"
                name="<?php echo $this->get_field_name( 'nummovies' ); ?>"
                value="<?php echo $instance['nummovies']; ?>"
                style="width:30px"
             />movie reviews      
           
        </p>


        <p>
            <input
                type="checkbox"
                class="checkbox" 
                id="<?php echo $this->get_field_id('showmusic'); ?>"
                name="<?php echo $this->get_field_name('showmusic'); ?>"
                <?php checked(isset($instance['showmovies'])? $instance['showmusic'] : 0); ?>
            />Display 

            <input 
                id="<?php echo $this->get_field_id( 'nummusic' ); ?>"
                name="<?php echo $this->get_field_name( 'nummusic' ); ?>"
                value="<?php echo $instance['nummusic']; ?>"
                style="width:30px"
             />music reviews      
           
        </p>

         <p>
            <input
                type="checkbox"
                class="checkbox" 
                id="<?php echo $this->get_field_id('showgames'); ?>"
                name="<?php echo $this->get_field_name('showgames'); ?>"
                <?php checked(isset($instance['showmovies'])? $instance['showgames'] : 0); ?>
            />Display 

            <input 
                id="<?php echo $this->get_field_id( 'numgames' ); ?>"
                name="<?php echo $this->get_field_name( 'numgames' ); ?>"
                value="<?php echo $instance['numgames']; ?>"
                style="width:30px"
             />Games reviews      
           
        </p>



        <!-- end!!!!!!!form
        ================================================== -->
        
        


        <?php

    }

    public function widget($args,$instance){

        extract($args);
        extract($instance);
        //print_r($instance);
        
        
        if($sort=="highest-rated") {
            $feedsort="meta_value";
            $metakey="&meta_key=Rating";
        } else {
            $feedsort="date";
            $metakey="";
        }

        ?>

        <div id="tabbed-reviews">

            <ul class="tabnav">
                <?php if($showmovies) { ?><li> <a href="#tabs-movies">Movies</a></li><?php } ?>
                <?php if($showmusic) { ?><li> <a href="#tabs-music">Music</a></li><?php } ?>
                <?php if($showgames) { ?><li> <a href="#tabs-games">Games</a></li><?php } ?>
            </ul>


            <div class="tabdiv-wrapper">

                <!-- for movie reveiw
                ================================================== -->

                <?php if($showmovies) {?>

                    <div id="tabs-movies" class="tabdiv">
                        <ul>
                            <?php

                                $args=array(
                                        'suppress' => true,
                                        'posts_per_page' => $nummovies,
                                        'post_type' => 'roman_movie_review',
                                        'order' => 'DESC',
                                        'orderby' => $feedsort.$metakey 
                                    ); 
                               /* $args=array(
                                        'suppress' => true,
                                        'posts_per_page' => $nummovies,
                                        'post_type' => 'page',
                                        'no_found_rows' => true,
                                        'orderby' => 'comment_count',
                                        'ignore_sticky_posts' => 1 
                                    );*/

                                /*$args = array(
                                                'showposts' => $nummovies,
                                                'nopaging'  => 0,
                                                'no_found_rows' => true,
                                                'orderby' => 'comment_count',
                                                'post_status' => 'publish',
                                                'ignore_sticky_posts' => 1 
                                    );*/
                                $custom_loop = new WP_Query($args);

                                if ($custom_loop->have_posts()) : while ($custom_loop->have_posts()) : $custom_loop->the_post(); $postcount++;

                                            $rating = get_post_meta(get_the_ID(),"Rating",$single=true);
                                            //echo $rating;
                                            if(($rating && $feedsort == "meta_value") || ($feedsort != "meta_value")){ ?>
                                            
                                            <li>
                                                <?php roman_show_rating($rating); ?>
                                                <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                            </li>


                                            <?php
                                            }


                                    endwhile;
                                endif; 
                                wp_reset_query();           
                             ?>
                             <li class="last gentesque tooltip" title="View all movie reviews"><a href="movie-reviews/">More</a></li>
                        </ul>
                    </div>

                <?php } ?>


                <!-- end movie review
                ================================================== -->


                <!-- for music reveiws
                ================================================== -->

                <?php if($showmusic) { ?>
                    
                    <div id="tabs-music" class="tabdiv">
                        <ul>
                            <?php // setup the query
                            $args=array(
                                        'suppress' => true,
                                        'posts_per_page' => $nummusic,
                                        'post_type' => 'roman_music_review',
                                        'order' => 'DESC',
                                        'orderby' => $feedsort.$metakey 
                                    );                                
                            $custom_loop = new WP_Query($args); 
                            if ($custom_loop->have_posts()) : 
                                while ($custom_loop->have_posts()) : 
                                    $custom_loop->the_post();
                                    $postcount++;
                                
                                    $rating = get_post_meta(get_the_ID(), "Rating", $single = true); 

                                    if(($rating && $feedsort=="meta_value") || ($feedsort!="meta_value")) { ?>

                                        <li>
                                            <?php roman_show_rating($rating); // show the stars ?>                                           
                                            <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> 
                                        </li>
                                        
                                    <?php } 

                                 endwhile; 
                            endif; 
                            wp_reset_query(); ?> 
                            
                            <li class="last gentesque tooltip" title="View all music reviews"><a href="music-reviews/">More</a></li>
       
                        </ul>
                    </div>
                    
                <?php } ?>


                <!-- end music reviews
                ================================================== -->


                <!-- for games reveiw
                ================================================== -->

                <?php if($showgames) {?>

                    <div id="tabs-games" class="tabdiv">
                        <ul>
                            <?php

                                $args=array(
                                        'suppress' => true,
                                        'posts_per_page' => $numgames,
                                        'post_type' => 'roman_game_review',
                                        'order' => 'DESC',
                                        'orderby' => $feedsort.$metakey 
                                    ); 

                                $custom_loop = new WP_Query($args);

                                if($custom_loop->have_posts()) :
                                    while($custom_loop->have_posts()):
                                        $custom_loop->the_post();
                                            $postcount++;

                                            $rating = get_post_meta(get_the_ID(), "Rating", $single = true); 

                                            if(($rating && $feedsort=="meta_value") || ($feedsort!="meta_value")){ ?>
                                            
                                            <li>
                                                <?php roman_show_rating($rating); ?>
                                                 <a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> 
                                            </li>


                                            <?php
                                            }


                                    endwhile;
                                endif; 
                                wp_reset_query();           
                             ?>
                             <li class="last gentesque tooltip" title="View all movie reviews"><a href="movie-reviews/">More</a></li>
                        </ul>
                    </div>

                <?php } ?>


                <!-- end movie review
                ================================================== -->
                
                
            </div>


        </div>

        <?php





    }

    public function update($new_instance,$old_instance){

        $instance = $old_instance;

        $instance['sort'] = strip_tags($new_instance['sort']);
        $instance['showmovies'] = strip_tags($new_instance['showmovies']);
        $instance['showmusic'] = strip_tags($new_instance['showmusic']);
        $instance['showgames'] = strip_tags($new_instance['showgames']);
        $instance['nummovies'] = strip_tags($new_instance['nummovies']);
        $instance['nummusic'] = strip_tags($new_instance['nummusic']);
        $instance['numgames'] = strip_tags($new_instance['numgames']);

        return $instance;

    }


}


add_action('widgets_init','create_roman_review_widget');

function create_roman_review_widget(){
    register_widget('roman_review_widget');
}




function roman_show_rating($rating) {
    //echo "hi";
    $output = '<div class="stars">';
    $output .= '<div class="star';
    if($rating>=1) {
        $output .= ' full';
    } elseif($rating>0) { 
        $output .= ' half';
    }
    $output .= '">&nbsp;</div>';    
    $output .= '<div class="star';
    if($rating>=2) {
        $output .= ' full';
    } elseif($rating>1) { 
        $output .= ' half';
    }
    $output .= '">&nbsp;</div>';
    $output .= '<div class="star';
    if($rating>=3) {
        $output .= ' full';
    } elseif($rating>2) { 
        $output .= ' half';
    }
    $output .= '">&nbsp;</div>';
    $output .= '<div class="star';
    if($rating>=4) {
        $output .= ' full';
    } elseif($rating>3) { 
        $output .= ' half';
    }
    $output .= '">&nbsp;</div>';
    $output .= '<div class="star';
    if($rating>=5) {
        $output .= ' full';
    } elseif($rating>4) { 
        $output .= ' half';
    }
    $output .= '">&nbsp;</div>';
    $output .= '</div>';    
    echo $output;
}




 ?>