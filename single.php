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
										<h1><a href="	<?php bloginfo('url')?>	">
											
										<?php bloginfo('name')?>	
										</a></h1>
										</div>
										<div class="menu2nd">
											<ul>
												<li><a href="<?php bloginfo('url');?>/category/course" title="All Posts under Courses">Courses</a></li>
												<li><a href="<?php bloginfo('url');?>/category/news"  title="All Posts under Courses">News</a></li>

											</ul>

										</div>

										<div class="menu3rd">
											<ul>
												<li><a href="">Share</a></li>
												<li><a href="">Search</a></li>
												<li><a href="<?php bloginfo('url')?>/wp-admin">sign In</a></li>
											</ul>

										</div>
									</div>
										

									</div>

<!--container-->
								<div id="content-wrapper">
									<?php if(have_posts()){
										while(have_posts()):
											the_post();
									 ?>
									<div class="articles-wrapper">
										<article class='single-article'>
											<header>
												<h2 class="">
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

											<div class="content_single">
												

												<div class="post_thumbnails">
															 
												<?php if (class_exists('MultiPostThumbnails')) :
												MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL,  'post-secondary-image-thumbnail');
												endif;
												?>
			 									
			 									</div>	
			 									<div class="sidebar-wrapper right">
		
													<div class="post-details">
																<h4 style="padding:0px;margin:20px 0">Post Details</h4>
																<?php 
																$postid = get_the_ID();
																$level= get_post_meta($postid,'level',1);
																$length= get_post_meta($postid,'length',1);
																$demo= get_post_meta($postid,'demo',1);
																$designation= get_post_meta($postid,'designation',1);
																$r1= get_post_meta($postid,'r1',1);
																$r2= get_post_meta($postid,'r2',1);
																$r3= get_post_meta($postid,'r3',1);
																$r4= get_post_meta($postid,'r4',1);
																
																
																
																?>
																
																<p class="level">Skill level </p><span class="span_aaa"><?php  echo $level;?> </span>
																<p class="length">Length </p><span class="span_aaa"><?php  echo $length;?> </span>
																<p class="demo">Demo</p><span class="span_aaa"><a href="<?php echo $demo; ?>">View the demo</a></span>
				
															
													
													</div>
												</div>
												
												
											

										
												<div class="content_container">
													<div class="post_content">
														<?php the_content()?>


														<div class="meta-comments">

														<i class="fa fa-tag fa-fw"></i><b>Tags: &nbsp;</b><?php the_tags(' '); ?> <br/>
														
														</div>																	  
														
														<div class="reference-links">
															
<?php if($r1!='' || $r2!="" || $r3!="" || $r4!=""){
echo '<h4>Reference</h4><ol>';

if($r1!=''){echo '<li>'.$r1.'</li>';}
if($r2!=''){echo '<li>'.$r2.'</li>';}
if($r3!=''){echo '<li>'.$r3.'</li>';}
if($r4!=''){echo '<li>'.$r4.'</li>';}
echo '</ol>';
}?>

																
																
			
														</div>
															
														</div>


														<div class="author_biodata">	
															<h5 class="" style="padding:10px 0px">About the Author</h5>
															<?php echo '<div class="archive_avatar" style="float: left;position: absolute;right: 0px;margin: 0px;top:10px">'. get_avatar( get_the_author_meta( 'ID' ), 64 )."</div>";  ?>
															<?php echo '<h4 class="author_style"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'user_firstname' ).'&nbsp;'.get_the_author_meta( 'user_lastname' ).'</a></h4>';

$description_encrypted=get_the_author_meta('user_description');
if($description_encrypted=='')
{

$description_encrypted="Keep in touch with The Honourable author.";

}															echo '<div class="author_description">'.$description_encrypted.'<br>'.'<br>'.'<a href="http://www.facebook.com/'.get_the_author_meta('facebook').'"><i class="fa  fa-facebook fa-fw"></i> Facebook</a>'.'<a href="http://www.twitter.com/'.get_the_author_meta('twiiter').'">&nbsp;&nbsp;<i class="fa  fa-twitter fa-fw"></i> Twitter</a>'.'<a href="'.get_the_author_meta('url').'">&nbsp;&nbsp;<i class="fa  fa-globe fa-fw"></i> Website</a>'.'<a href="mailto:'.get_the_author_meta('user_email').'?subject=Your%20Post%20was%20pretty%20Amazing&body=I%20read%20your%20post%20at%20I%20Need%20A%20Help.%20Your%20Post%20was%pretty%20amazing!" target="_top">&nbsp;&nbsp;<i class="fa  fa-envelope fa-fw"></i>Email</a>'.'</div>';
															?>	
															
							
															<?php $badge1=get_the_author_meta('badge1');	
															$badge2=get_the_author_meta('badge2');
															$badge3=get_the_author_meta('badge3');
															$badge4=get_the_author_meta('badge4');
																								$badge5=get_the_author_meta('badge5');
if($badge1!='' || $badge2!="" || $badge3!="" || $badge4!=""|| $badge5!=""){
echo '<div class="author_box2" >';

if($badge1!=''){echo '<img src="'.$badge1.'"/>';}
if($badge2!=''){echo '<img src="'.$badge2.'"/>';}
if($badge3!=''){echo '<img src="'.$badge3.'"/>';}
if($badge4!=''){echo '<img src="'.$badge4.'"/>';}
if($badge5!=''){echo '<img src="'.$badge5.'"/>';}
echo '</div></div>';
}?>

															

																
														<div class="comments_template">
															<?php comments_template( '', true ); ?>
														</div> 
													</div>
												</div>	
												<div style="clear:both">
											</div>	

											<!--end-->
										</article>
									</div>
								<?php endwhile;} ?>
								</div>
</div>

<?php
get_header();
?>
