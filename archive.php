<?php 
/* Template Name: Single.php
 * This is the most generic file used in wordpress
 * Constructing the page 
 * Start @1.24am nov.25.2014
 */


//menu
get_header();
?>
<div class="single_wrapper">
	
<!--Modo Menu-->


								<div class="menu_modo">
									<div class="menu_modo_container">
										<div class="menu1st">
										<h1><a href="<?php bloginfo('url')?>">
											
										<?php bloginfo('name')?>	
										</a></h1>
										</div>
										<div class="menu2nd">
											<ul>
												<li><a href="">Courses</a></li>
												<li><a href="">EBooks</a></li>

											</ul>

										</div>

										<div class="menu3rd">
											<ul>
												<li><a href="">Share</a></li>
												<li><a href="">Search</a></li>
												<li><a href="">sign In</a></li>
											</ul>

										</div>
									</div>
										

									</div>

<!--container-->
							
									<div id="content-wrapper">
										<?php if (have_posts()) : ?>

							        	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
									
							        <div class="articles-wrapper">
										<div class='single-article'>
											<header>
												<h2 class="single_title">
										
												<?php /* If this is a category archive */ if (is_category()) { ?>

                								<?php echo single_cat_title(); ?>

            									<?php /* If this is a tag archive */  } elseif( is_tag() ) { ?>

                								<?php single_tag_title(); ?> 
            									<?php /* If this is a daily archive */ } elseif (is_day()) { ?>

                								<?php _e('Archive for'); ?> <?php the_time('F jS, Y'); ?>                                        

            									<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>

                								<?php _e('Archive for'); ?> <?php the_time('F, Y'); ?>                                    

            									<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>

                								<?php _e('Archive for'); ?> <?php the_time('Y'); ?>                                        

            									<?php /* If this is a search */ } elseif (is_search()) { ?>

                								<?php _e('Search Results'); ?>                            

            									<?php /* If this is an author archive */ } elseif (is_author()) { ?>
												
												<div class="title_author">
                								<?php echo '<div class="archive_avatar">'. get_avatar( get_the_author_meta( 'ID' ), 64 )."</div>";  the_author(); ?>
				
												</div>              

									            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

            									<?php _e('Our Latest Archive'); ?>                                        
    											<?php } ?>	

    											</h2>
											</header>
											<?php if(is_author()){
											$badge1=get_the_author_meta('badge1');
											$badge2=get_the_author_meta('badge2');
											$badge3=get_the_author_meta('badge3');
											$badge4=get_the_author_meta('badge4');
											echo '<div class="author_box" ><img src="'.$badge1.'">'.'<img src="'.$badge2.'">'.'<img src="'.$badge3.'">'.'<img src="'.$badge4.'">'.'</div>';
											}?>

											
											<?php else : ?>

											<h3><?php _e('404 Error&#58; Not Found'); ?></h3>

											<?php endif; ?>

    										</div>
										</div>
										
										<?php //loop for post
										loop_blogpost();?>

</div>