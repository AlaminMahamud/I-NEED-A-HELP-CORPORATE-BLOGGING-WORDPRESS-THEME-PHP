<?php
/** 
* The 404 template File
*
*
* This is the most generic template file in a Wordpress theme and one 
* of the two required files for a theme (the other being style.css)
* It is used to display a page when nothing more specific matches a query,
* it puts together the home page when no home.php file exists.
*
* @link http://codex.wordpress.org/Tempalate_hierarchy
*
*/
get_header();?>

<div id="error">
<h1>It Seems you are in the wrong place<h1>
<h2>so we humbly request you to go back to one of the following pages</h2>
<ul class="single_ulbla">
<li><a href="<?php bloginfo('url')?>">Our Home Page</a></li>
<li><a href="<?php bloginfo('url')?>#Summary">A brief introduction to our site</a></li>
<li><a href="<?php bloginfo('url')?>#Portfolio">Our Latest Projects</a></li>


</ul>
</div>
<section class="intro" id="section3">
	<h3><span>#3 </span> Check Our Fresh and brief tutorials & guidelines & Start <span>exploring</span>...</h3>
	<p>This site is all about those who are passionate, and also for those who needs guideline, fresh content & information and guidelines</p>
</section>
<section id="gallery">
	<div id="carousel">
			<?php sherlock_gallery_post_snippet_generator(); ?>
		
			<div class="col">
					<?php sherlock_gallery_post_snippet_generator_small(); ?>
			</div>
			<div style="clear:both"></div>
			<div class="column">
			<?php sherlock_gallery_post_snippet_generator_tiny(); ?>
		    </div>
	</div>
</section>

<section id="news">

		
		<div id="ncol">
			<p>Stories That You</p>
			<h4>MUST READ</h4>
			<hr/>
			<?php sherlock_news_post_generator();?>
		</div>
		<div id="ncoll">
			<?php sherlock_news_post_snippet_generator_large()?>
		</div>
	

</section>
<?php get_footer();?>