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
<div class="single_wrapper">	<!--Modo Menu-->								<div class="menu_modo">									<div class="menu_modo_container">										<div class="menu1st">										<h1><a href="	<?php bloginfo('url')?>	">																					<?php bloginfo('name')?>											</a></h1>										</div>										<div class="menu2nd">											<ul>												<li><a href="">Courses</a></li>												<li><a href="">EBooks</a></li>											</ul>										</div>										<div class="menu3rd">											<ul>												<li><a href="">Share</a></li>												<li><a href="">Search</a></li>												<li><a href="">sign In</a></li>											</ul>										</div>									</div>																			</div><!--container-->								<div id="content-wrapper">																<div class="error404">								<h2>Oops, I screwed up and you discovered my fatal flaw</h2>								<div class="post_thumbnails">								<img src="<?php echo get_template_directory_uri();?>/images/404.jpg">								</div>									<blockquote class="meta-info">"Well, we're not all perfect, but we try.  Can you try this again or maybe visit our <a title="I Need A Help" href="http://www.ineedahelp.com">HomePage</a> to start fresh.  We'll do better next time."</blockquote>								</div>																</div></div>
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