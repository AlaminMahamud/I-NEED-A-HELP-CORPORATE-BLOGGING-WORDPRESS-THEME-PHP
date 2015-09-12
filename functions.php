<?php 

/**
* Sherlock Holmes functions and Definitions
*

* Set up the theme and provides some helper functions, which are used in the 
*
*theme as custom template tags. Others are attached to action and filter
*
*hooks in wordpress to change core_functionality
*
*when using a child theme you can override certain functions (those wrapped 
*
*in a function_exists() call) by defining them first in your child theme's
*
*functions.php file. The child theme's functions.php is included before
*
*the parent theme's file, so the child theme functions would be used.

*@link http://ineedahelp.com/web_development/wordpress/theme_development
*@link http://ineedahelp.com/web_development/wordpress/child_theme

*
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package Sherlock
 * @subpackage Sherlcok Holmes
 * @since Sherlock_holmes 1.0
 */

 

 
 if(!function_exists('sherlock_setup')){
 /** Sherlock_Setup
 *
 *
 *
 *
 *
 */
 
 function sherlock_setup(){
	//Add RSS Feed Links to <head> for posts and comments
	add_theme_support('automatic feed links');
		
	//Enable theme Support for Post thumbnails and declare sizes
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(300,200,true);//set_post_thumbnail_size( $width, $height, $crop );//
	add_image_size('sherlock-full-width', 1038, 576,true);// add_image_size( $name, $width, $height, $crop ); $name='the new image size name'
	add_image_size('sherlock_gallery_col1',430,430,true);
	add_image_size('sherlock_gallery_col2',430,215,true);
	add_image_size('sherlock_gallery_tiny',225,110);
	add_image_size('sherlock_category_image',360,270);
	add_image_size('sherlock_news',288,175,true);
	
	
	//Enable Theme Support For Multiple Post Thumbnails
	if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(array(
	'label' => 'Secondary Image',
	'id' => 'secondary-image',
	'post_type' => 'post'
	 ) );
	 
	add_image_size('post-secondary-image-thumbnail',800,400,true);
	 }
	

	/*
	
		// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top home menu', 'sherlock' ),
		'secondary' => __( 'Secondary menu sidebar', 'sherlock' ),
	) );

	*/

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	
add_theme_support( 'post-formats', array(
   'video','link', 'gallery','image','status','quote','audio', 'chat','aside'
) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'sherlock_custom_background_args', array(
		'default-color' => 'e7e7e7',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'sherlock_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
} // sherlock_setup
add_action( 'after_setup_theme', 'sherlock_setup' );

/**
*Adjust Content Width value for image attachment template.
*
*/
function sherlock_content_width(){
	if(is_attachment() && wp_attachment_is_image()){
		$GLOBALS['content-width']=810;
	}
}
add_action('template_redirect','sherlock_content_width');

/** 
* Getter Function for featured post Plugin
*
*/
function sherlock_get_featured_posts(){
	/**
	*	Filter the featured posts to return in Sherlock Holmes
	*
	*
	*
		
	*/
return apply_filters(
	'sherlock_get_featured_posts',array()
	);
	
}

/*** A helper conditional function that returns a boolean value.
*
*
*
*/
function sherlock_has_featured_post(){
	return !is_paged() && (bool)
	sherlock_get_featured_post();
}


/**
 * Register three Sherlock widget areas.
 *
 * 
 *
 * 
 *
//function sherlock_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
//add_action( 'widgets_init', 'sherlock_widgets_init' );

*/


/**
 * Register fonts for Sherlcok Holmes.
 *
 * 
 *
 * @return string
 */

/*
function sherlock_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
/*
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

*/
/**
* Enqueue Scripts and styles for the front end.
*
*
*	@return void;
*/
/*
function sherlock_scripts(){
	//Add Font, used in the main stylesheet.
	wp_enqueue_style('sherlock-lato',sherlock_font_url(), array(),null);
	//Add Genericons font, used in the main stylesheet
	wp_enqueue_style('genericons',get_template_directory_uri().'/genericons/genericons.css',array(),'3.0.2');
	
	//Load Our  Main Stylesheet
	wp_enqueue_style('sherlock-style',get_stylesheet_uri(),array('genericons'));
	
	// load the internet Explorer Specific Stylesheet
	wp_enqueue_style('sherlock-ie',get_template_directory_uri().'/css/ie.css',array('sherlock-style','genericons'),'20131205');
	wp_style_add_data('sherlock-ie','conditional','lt IE 9');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if(is_singular() && wp_attachment_is_image()){
		wp_enqueue_script(
		'sherlock-keyboard-image-navigation.js',array('jquery'),'20130402'
		);
	}
}
add_action( 'wp_enqueue_scripts', 'sherlock_scripts' );
*///Post Count Functionfunction getPostViews($postID){    $count_key = 'post_views_count';    $count = get_post_meta($postID, $count_key, true);    if($count==''){        delete_post_meta($postID, $count_key);        add_post_meta($postID, $count_key, '0');        return "0 View";    }    return $count.' Views';}function setPostViews($postID) {    $count_key = 'post_views_count';    $count = get_post_meta($postID, $count_key, true);    if($count==''){        $count = 0;        delete_post_meta($postID, $count_key);        add_post_meta($postID, $count_key, '0');    }else{        $count++;        update_post_meta($postID, $count_key, $count);    }}// Remove issues with prefetching adding extra viewsremove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 




//Post Content for Gallery--->
/*
function sherlock_post_content_generator(){
?>
<div class="single_content">

	<div class="bar">
	<?php if(have_posts()){
	while(have_posts()) : 

	the_post();?>

	

	<div class="bar2">
		<h2 class="single_title">
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</h2>
		<p class="meta-info">
		Posted on <?php the_time('M, d'); ?> by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author();?></a> | 80 Comments
		</p>
		
		<div class="content_single">
			<div class="post_thumbnails">
				 
				 
			<?php if (class_exists('MultiPostThumbnails')) :
	 
			MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL,  'post-secondary-image-thumbnail');
			
			endif;
			?>
	 
			</div>
		<?php the_content();?>
		</div>
	</div>
	
	<div class="bar3">
	<h3 class="archive_title_sidebar">Search Arena</h3>
	<p><input id="archive_search" type="search" placeholder="Search For i.e: Web Management" />
	<input type="submit" id="archive_submit" value="&#xf002"/></p>

	
			<?php 
			$postid = get_the_ID();
			$level= get_post_meta($postid,'level',1);
			$length= get_post_meta($postid,'length',1);
			$demo= get_post_meta($postid,'demo',1);
			$designation= get_post_meta($postid,'designation',1);
			?>
			
			
			<h3 class="archive_title_sidebar">Tutorial Details</h3>
			
			<p class="level">Skill level </p><span class="span_aaa"><?php  echo $level;?> </span>
			<p class="length">Length </p><span class="span_aaa"><?php  echo $length;?> </span>
			<p class="demo">Demo</p><span class="span_aaa"><a href="<?php echo $demo; ?>">View the demo</a></span>
			
			
			<h3 class="archive_title_sidebar">Similar Topics</h3>
			
			<?php the_tags('<ul class="tags"><li>','</li><li>','</li></ul>'); ?>
			
		<!--cats-->
	<?php
 $rgs = array(
	'show_option_all'    => '',
	'orderby'            => 'name',
	'order'              => 'ASC',
	'style'              => 'list',
	'show_count'         => 1,
	'hide_empty'         => 0,
	'use_desc_for_title' => 1,
	'child_of'           => 0,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => 1,
	'title_li'           => __( '<h3 class="archive_title_sidebar">Categories</h3>' ),
	'show_option_none'   => __( 'No categories' ),
	'number'             => null,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 1,
	'pad_counts'         => 0,
	'taxonomy'           => 'category',
	'walker'             => null
    );
	echo '<ul class="category_list">';
    wp_list_categories( $rgs ); 
	echo '</ul>';
?>
	
		<div class="author_bio">

		<h3 class="archive_title_sidebar">More About the Author</h3>
		<?php echo '<div class="archive_avatar">'. get_avatar( get_the_author_meta( 'ID' ), 64 )."</div>";  ?>
				
		<?php echo '<h4 class="author_style" style="padding:0px"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'user_firstname' ).'&nbsp;'.get_the_author_meta( 'user_lastname' ).'</a></h4>';
		echo '<div class="author_description">'.get_the_author_meta('user_description').'<br>'.'<br>'.'<a href="'.get_the_author_meta('facebook').'">Visit facebook Page &nbsp;&nbsp;&nbsp;</a>'.'<a href="http://www.twitter.com/'.get_the_author_meta('twiiter').'">Visit twitter Page&nbsp;&nbsp;&nbsp;</a>'.'<a href="'.get_the_author_meta('url').'">Visit Website</a>'.'<a href="'.get_the_author_meta('user_email').'">&nbsp;&nbsp;Email him</a>'.'</div>';
		
		
		?>
		
		
		<?php $badge1=get_the_author_meta('badge1');
		$badge2=get_the_author_meta('badge2');
	$badge3=get_the_author_meta('badge3');
	$badge4=get_the_author_meta('badge4');
	echo '<div class="author_box" ><img src="'.$badge1.'">'.'<img src="'.$badge2.'">'.'<img src="'.$badge3.'">'.'<img src="'.$badge4.'">'.
	'</div>';?>
			</div>
			
			
	<div class="clear:both"></div>
	
	<div class="archive_ad">
	<img src="<?php echo get_template_directory_uri()?>/images/advertisement/1.jpg"/>
	<img src="<?php echo get_template_directory_uri()?>/images/advertisement/2.gif"/>
	<img src="<?php echo get_template_directory_uri()?>/images/advertisement/3.jpg"/>
	<img src="<?php echo get_template_directory_uri()?>/images/advertisement/1.png"/>
	</div>
	
			<div class="jobs">
	
			<h3 class="archive_title_sidebar">Available Jobs</h3>
	
				<ul class="single_ulbla">
					<li><a href="http://.com">We need a Professional Policy Maker [ROBI Axiata LTD]</a></li>
					<li><a href="http://.com">We need a Professional Policy Maker [ROBI Axiata LTD]</a></li>
					<li><a href="http://.com">We need a Professional Policy Maker [ROBI Axiata LTD]</a></li>
					<li><a href="http://.com">We need a Professional Policy Maker [ROBI Axiata LTD]</a></li>
					<li><a href="http://.com">We need a Professional Policy Maker [ROBI Axiata LTD]</a></li>
					</ul>	
			</div>
			
			
			
	</div>
</div>
<?php endwhile;} ?>
	
	
</div>

	
	
	
	<div class="bar_down">
		<div class="bar_down1">
		<?php comments_template( '', true ); ?>  
		</div>
		<div class="bar_down2">
		<?php //advertisement>?>
		</div>
	</div>
<?php }
*/

add_action( 'init', 'codex_flash_init' );
/**
 * Register a flash post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_flash_init() {
	$labels = array(
		'name'               => _x( 'Flash', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Flash-News', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Flash-News', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Flash', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'flash', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Flash', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Flash', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Flash', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Flash', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Flash', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Flash\'es', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Flash\'es:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Flash\'es found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Flash\'es found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'flash' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title','editor','custom-fields','thumbnail')
	);

	register_post_type( 'flash', $args );
}


//registering Video Post Type


add_action( 'init', 'codex_video_init' );
/**
 * Register a video post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
 
 
function codex_video_init() {
	$labels = array(
		'name'               => _x( 'video', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Video', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Video', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Video', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Video', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Video', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Video', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Video', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Video', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Video', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Video\'es', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Video\'es:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Video\'es found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Video\'es found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'video' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title','editor','custom-fields','thumbnail')
	);

	register_post_type( 'video', $args );
}



//registering Image Post Type








function sherlock_gallery_post_snippet_generator(){

query_posts('post_type=post&cat=33&&post_status=publish&posts_per_page=2&paged='. get_query_var('paged'));

if(have_posts()){
while(have_posts()) : the_post();?>
<div class="col">
<div class="post_thumb_gallery">

<div class="thumb_cats">
			<p class="hover_card"><a href="<?php bloginfo('url')?>/category/featured/">Featured</a></p>
			</div>
	<?php 
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
		the_post_thumbnail('sherlock_gallery_col1');
	} 
	?>
	<div class="gallery_h2_back">
	<h2 class="gallery_h2">
	<a href="<?php the_permalink();?>"><?php the_title();?></a>
	</h2>
	</div>
</div>
</div>
	  

	  <?php endwhile;} 
}


function sherlock_gallery_post_snippet_generator_small(){

query_posts('post_type=post&cat=30&post_status=publish&posts_per_page=2&paged='. get_query_var('paged'));

if(have_posts()){
while(have_posts()) : the_post();?>
<div class="col1">
<div class="post_thumb_gallery">
<div class="thumb_cats">
			<p class="hover_card"><a href="<?php bloginfo('url')?>/category/course/">Courses</a></p>
			</div>
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
	the_post_thumbnail('sherlock_gallery_col2',array('class'=>'amy'));
} 
?>
	<div class="gallery_h2_back">
	<h2 class="gallery_h2">
	<a href="<?php the_permalink();?>"><?php the_title();?></a>
	</h2>
	</div>
</div>
</div>
	  <?php endwhile;} 
}


function sherlock_gallery_post_snippet_generator_tiny(){

query_posts('post_type=post&cat=31&post_status=publish&posts_per_page=6&paged='. get_query_var('paged'));

if(have_posts()){
while(have_posts()) : the_post();?>
<div class="group">
<div class="gimg">
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
	the_post_thumbnail('sherlock_gallery_tiny',array('class'=>'amy2'));
} 
?>		
</a>		
<div class="cats"><p>
<?php the_category(', ') ?>				
</p></div>
<div class="gtitle">
<h2><a href="<?php the_permalink();?>"><?php the_title();?></a>
</h2>
</div>

</div>
</div>
	  <?php endwhile;} 
}

function sherlock_news_post_generator(){
query_posts('post_type=flash&post_status=publish&posts_per_page=6&paged='. get_query_var('paged'));
 if(have_posts()){
	while(have_posts()) : the_post();

$postid = get_the_ID();
																$post_url  = get_post_meta($postid,'post_url',1);
$site_name = get_post_meta($postid,'site_name',1);
$site_url  = get_post_meta($postid,'site_url',1);									
?>
	
	<div class="snippet">
		<h2 class="newsh1"><a href="<?php echo $post_url;?>"><?php the_title();?></a></h2>
		<p><a href="<?php echo $site_url; ?>">
		<?php echo $site_name ?></a>
		</p>

	</div>
	 <?php endwhile;} 
	
}



function sherlock_video_post_generator(){
query_posts('post_type=video&post_status=publish&posts_per_page=2&paged='. get_query_var('paged'));
if(have_posts()){
	while(have_posts()) :the_post();?>
	
		
	<div class="video-half1">
		
		<?php the_content();?>
		<h2><?php the_title();?></h2>		
	</div>
		
	 <?php endwhile;
	} 
	

}

		
		
function sherlock_news_post_snippet_generator_large(){
query_posts('post_type=post&post_status=publish&posts_per_page=9&paged='. get_query_var('paged'));

			$postid = get_the_ID();
			$summary= get_post_meta($postid,'summary',1);
?>


<div class="news_content">
	<?php if(have_posts()){
		while(have_posts()) : the_post();?>
			<div class="news_content_snippet">
				
			<div class="thumb_cats">
			<?php the_category();?>
			</div>
			
				<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					
				?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php
				the_post_thumbnail('sherlock_news');
					} 
				?>	
					</a>
			<h2><a href="<?php the_permalink();?>">
				<?php the_title();?>	
				</a></h2>
			<div class="para">
			<p><?php echo $summary?></p>	</div>
		
	
	</div>		
	<?php endwhile;} ?>
	</div>
	
<?php

}
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="speciality">speciality</label></th>

			<td>
				<input type="text" name="speciality" id="speciality" placeholder="i.e: Web Developing Expert" value="<?php echo esc_attr( get_the_author_meta( 'speciality', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Specialty.</span>
			</td>
		</tr>
			
		<tr>
			<th><label for="facebook">Facebook</label></th>

			<td>
				<input type="text" name="facebook" id="facebook" placeholder="i.e:alamin.mahamud" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your facebook url.</span>
			</td>
		</tr>
<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>

<tr>
			<th><label for="badge1">Skill Badge 1</label></th>

			<td>
				<input type="text" name="badge1" id="badge1" value="<?php echo esc_attr( get_the_author_meta( 'badge1', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">upload the link of the image of that badge </span>
			</td>
		</tr>

<tr>
			<th><label for="badge2">Skills Badge 2</label></th>

			<td>
				<input type="text" name="badge2" id="badge2" value="<?php echo esc_attr( get_the_author_meta( 'badge2', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">upload the link of the image of that badge</span>
			</td>
		</tr>
<tr>
			<th><label for="badge3">Skills Badge 3</label></th>

			<td>
				<input type="text" name="badge3" id="badge3" value="<?php echo esc_attr( get_the_author_meta( 'badge3', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">upload the link of the image of that badge</span>
			</td>
		</tr>

<tr>
			<th><label for="badge4">Skills Badge 4</label></th>

			<td>
				<input type="text" name="badge4" id="badge4" value="<?php echo esc_attr( get_the_author_meta( 'badge4', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">upload the link of the image of that badge</span>
			</td>
		</tr>

<tr>
			<th><label for="badge5">Skills Badge 5</label></th>

			<td>
				<input type="text" name="badge5" id="badge5" value="<?php echo esc_attr( get_the_author_meta( 'badge5', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">upload the link of the image of that badge</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );	
	update_usermeta( $user_id, 'speciality', $_POST['speciality'] );
	update_usermeta( $user_id, 'badge1', $_POST['badge1'] );
	update_usermeta( $user_id, 'badge2', $_POST['badge2'] );
	update_usermeta( $user_id, 'badge3', $_POST['badge3'] );
	update_usermeta( $user_id, 'badge4', $_POST['badge4'] );
	update_usermeta( $user_id, 'badge5', $_POST['badge5'] );
}

function loop_blogpost(){
										if(have_posts()){
										while(have_posts()):
											the_post();
														$postid = get_the_ID();
														$summary= get_post_meta($postid,'summary',1);
											?>
										
											<article class="article_post">
												<header>
													<h2 class="single_title">
													<a href="<?php the_permalink();?>"><?php the_title();?></a>
													</h2>
													<p class="meta-info">
													<i class="fa fa-user fa-fw"></i>	
													<a href="
																<?php
																$userid=get_the_author_meta( 'ID' );	
															    echo get_author_posts_url( $userid );?>
														    ">
														    
														    <?php
														    the_author();
															$user_post_count = count_user_posts( $userid );
															echo '&nbsp;('.$user_post_count.')';
															?>

														</a> <i class="fa fa-tags fa-fw"></i><?php the_category(', '); ?> <i class="fa fa-clock-o fa-fw"></i><?php the_time('F j, Y');?> <i class="fa fa-comments fa-fw"></i><?php $comments_count = wp_count_comments();
													echo $comments_count->total_comments .'&nbsp;Comments';
													?>
													</p>
												</header>
												<div class="post_thumbnails">
					 		
					 
													<?php if (class_exists('MultiPostThumbnails')) :
													MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL,  'post-secondary-image-thumbnail');
													endif;
													?>
												</div>
												<div class="article_summary">
												<?php echo $summary;?>		
												</div>
												<div class="readmore">
														<a href="<?php the_permalink();?>">Full Story</a>
												</form>
												
												</div>
											</article>
										
										<?php endwhile;} ?>	
												
										<?php }


?>
