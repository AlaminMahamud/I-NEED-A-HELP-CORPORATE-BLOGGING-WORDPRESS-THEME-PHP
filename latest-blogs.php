<?php 
// Latest Post
?>
<section id="lates-posts">
	<div id="latest-posts-wrapper">
		<h5>Our Latest Courses</h5>
		
<?php 
query_posts('post_type=post&cat=30&post_status=publish&posts_per_page=3&paged='. get_query_var('paged'));
 if(have_posts()){
	while(have_posts()) : the_post();
		$postid = get_the_ID();
	 	?>	

		<div class="single-latest-post">
		<?php 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
			the_post_thumbnail('sherlock_category_image');
		} 
		?></a>
		<div class="single-latest-post-details">
			<div class="single-latest-post-details-content">
				<h2>
					<a href="<?php the_permalink()?>">
						<?php the_title();?>
					</a>
				 </h2>
				
				<p><?php echo $summary?></p>
				</div>
				<div class="single-latest-post-author">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 )?> <p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>"><?php the_author();?></a></p>
				<p><?php echo get_the_author_meta('speciality')?></p>	
				</div>
			</div>	
		</div>	
			
	 <?php endwhile;
	} 

?>
			<div style="clear:both"></div>
	</div>
</section>

