<?php
/** 
* The main template File
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

<!-- Preloader
<div id="preloader">
    <div id="status">
	<p><img src="<?php echo get_template_directory_uri();?>/images/preloader/circle.jpg">
           <img src="<?php echo get_template_directory_uri();?>/images/preloader/spin.gif" class="spinner"></p>
	</div>
</div> -->
<div id="mainContent">
<!-- Section Starts-->
<?php

//this part contains Top Nav & Home
get_template_part('home1');
?>



<?php  
// i am deleting Section 1

?>
<!--
<section class="intro" id="section1">
	<h3><a style="color:#333" href="<?php bloginfo('url') ?>"><?php bloginfo('name')?></a> : Provides fresh Contents in a much more Organized Way</h3>
	<p>Scroll Down to Figure Out our true potentials & be a part of us.</p>
</section>
-->

<!---Endless Oppurtunities-->
<?php get_template_part('endless');
?>


<?php 
//featured Posts

?>
<section id="gallery">
	<div id="carousel">
					<?php sherlock_gallery_post_snippet_generator(); ?>
		
			<div class="col">
					<?php sherlock_gallery_post_snippet_generator_small(); ?>
		
			
			</div>
			<div style="clear:both"></div>

			<section class="intro" id="section5">
				<h3>Episode Based Tutorials...</h3>
				<p>Episode Tutorials Are written in a Chained Process, One After Another. Be Sure To Check The Previous Ones Before Stepping into the latest </p>
				<div class="sqr" style="top:80%"></div>
			</section>

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
		<section class="intro" id="section6" style="margin-bottom:30px;overflow:visible">
		<h3>Latest Posts</h3>
		<p>fresh contents of our Teams</p>
		<div class="sqr" style="top:80%"></div>

</section>
		<div id="ncoll">
			<?php  sherlock_news_post_snippet_generator_large()?>
		</div>
	

</section>

<!-- latest - Blogs-->
<?php get_template_part('latest-blogs');
?>


<!--Video View-->
<?php get_template_part('video');
?>


<!--About-part-3! Jquery Tabs-->
<?php get_template_part('about_part3');
?>

<!--What The Fuck! -->
<?php  get_template_part('about_part2');
?>


<!--Section Summary-->

<?php  get_template_part('summary');?>
<!--Iphone-->
<?php get_template_part('iphone');?>

<!--Mountain View-->
<?php get_template_part('mountain-view');
?>

<!--about_3 View-->
<?php get_template_part('about_3');
?>




<!--Professional View-->
<?php get_template_part('clean_professional');
?>

<!--best-services-->
<?php get_template_part('best-part-of-services');
?>
<?php //get_template_part('aboutteam');
?>


<?php //get_template_part('cats');
?>
<!--
<section class="intro" id="section2">
	<h3><span>#2 </span> Check Our Fresh and brief tutorials & guidelines & Start <span>exploring</span>...</h3>
	<p>This site is all about those who are passionate, and also for those who needs guideline, fresh content & information and guidelines</p>

</section>
-->


<!---
<section class="intro" id="section3">
	<h3><span>#3 </span>Now We will talk about who we are : Why <span>you</span> should choose us...</h3>
	<p>This site is all about those who are passionate, and also for those who needs guidelines, fresh contents & information</p>
</section>

--->

<!--Section portfolio-->
<?php //get_template_part('portfolio')
?>

<!--Section cubeport-->
<?php // get_template_part('cubeport')
?>

<!--Section Partner-->
<?php // get_template_part('partner')
?>



<!--Subscription-->
<?php get_template_part('subscription')?>



<!--Section Opinion-->
<?php get_template_part('opinion')
?>

<!--Contacts-->
<section id="contacts">
	<div class="contacts_content">
		<div class="lol">
		<h2>Where?</h2>
		<p>CUET, Chittagong, 
		Bangladesh</p>
		</div>
	
		<div class="lol">
		<h2>Working Hours</h2>
		<p>24/7</p>
		</div>
		
		
		<div class="loll">
		<h2>Telephone</h2>
		<p>Coming Soon...</p>
		
		</div>
		
		<div class="poll">
		<h2>Email</h2>
		<p>CEO: <a href="mailto:">ceo@ineedahelp.com</a><br/>
		<p>CFO: <a href="mailto:">cfo@ineedahelp.com</a><br/>
		<p>Media: <a href="mailto:">media@ineedahelp.com</a><br/>
		<p>Marketing: <a href="mailto:">marketing@ineedahelp.com</a>
		</p>
		</div>
		<div class="lolll"><h1><a href="">How to  Connect With Us</a></h1>
		<p>Be a Part of Us.</p>
		</div>
	</div>
			<div id="scroll_top">
				<a href="#home_way">Scroll to the Top<br/><br/><br/></a>
			</div>
</section>


<!--
<section class="intro" id="section4" style="background:#333">
	<h3 style="color:#fff"><span>#4 </span> As you have spent <span></span>Minutes & <span></span>Seconds...</h3>
	<p>So I believe this site may be useful in your next browsing session. Bookmark Now</p>
	<div class="sqr" style="top:80%"></div>
	</section>-->
<?php get_footer();?>