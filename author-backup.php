<?php
/* 
Template Name: Archive
*/
get_header();
?>
<div class="archive_topbar">
<p><b>Trending Topics</b>: <a href="">HTML6 </a><a href="">CSS4 </a><a href="">jQuery3</a><a href="">PHP</a><a href="">MySQL </a><a href="">HTML6 </a><a href="">CSS4 </a><a href="">jQuery3</a><a href="">PHP</a><a href="">MySQL </a><a href="">HTML6 </a><a href="">CSS4 </a><a href="">jQuery3</a><a href="">PHP</a><a href="">MySQL </a></p>
</div>
<div class="archive_header">
	<div class="archive_sitename">
		<h1><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></h1>
		<h2><?php bloginfo('description');?></h2>
	</div>

	<div class="archive_admenu">
		<img src="<?php echo get_template_directory_uri();?>/images/banner.gif">
	</div>
	

</div>





<div class="bar">

    <?php if (have_posts()) : ?>

        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<div class="bar2">
	<div class="title_container">
	<h2 class="title_archive">

            <?php /* If this is an author archive */ if (is_author()) { ?>
				<div class="title_author">
                <?php echo '<div class="archive_avatar">'. get_avatar( get_the_author_meta( 'ID' ), 64 )."</div>";  the_author(); ?>
				
				</div>              

            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

            <?php _e('Our Latest Archive'); ?>                                        
    <?php } ?>	

</h2>

</div>
<?php if(is_author()){
	$badge1=get_the_author_meta('badge1');
	$badge2=get_the_author_meta('badge2');
	$badge3=get_the_author_meta('badge3');
	$badge4=get_the_author_meta('badge4');
	echo '<div class="author_box" ><img src="'.$badge1.'">'.'<img src="'.$badge2.'">'.'<img src="'.$badge3.'">'.'<img src="'.$badge4.'">'.
	'</div>';
}?>

<?php
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
				<div class="smart_summary">		
				<h2 style="height:60px;"><a href="<?php the_permalink();?>">
					<?php the_title();?>	
					</a></h2>
				<div class="para" style="height:150px;">
					<p><?php echo $summary?></p>
				</div>
				</div>
		</div>		
			<?php endwhile;} ?>
		</div>
	<?php else : ?>

		<h3><?php _e('404 Error&#58; Not Found'); ?></h3>

	<?php endif; ?>
</div>			
	<div class="bar3">
	<h3 class="archive_title_sidebar">Search Arena</h3>
	<p><input id="archive_search" type="search" placeholder="Search For i.e: Web Management" />
	<input type="submit" id="archive_submit" value="&#xf002"/></p>
	
	
	
	
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
	
	
	
	
	<div class="clear:both"></div>
	<div class="archive_ad">
	<img src="<?php echo get_template_directory_uri()?>/images/advertisement/1.jpg"/>
	<img src="<?php echo get_template_directory_uri()?>/images/advertisement/2.gif"/>
	<img src="<?php echo get_template_directory_uri()?>/images/advertisement/3.jpg"/>
	<img src="<?php echo get_template_directory_uri()?>/images/advertisement/1.png"/>
	
	</div>
	
	
	</div>
</div>			
			
<?php get_template_part('archive_sidebarfun')?>
<?php get_template_part('')?>
<?php get_template_part('')?>
<?php get_template_part('')?>
<?php get_footer();?>