<?php
//the footer

?>
<div class="endfooter">
	<div class="footer_top"></div>
	<h3>I Need A Help <span>&copy;2014</span>  &rarr; a product of <span>AMT Network &trade;</span>...</h3>
	<h4> Proudly Powered By &rarr;</h4>
	<ul>
		<li class="apsarap" id="html5"></li>
		<li class="apsarap" id="css3"></li>
		<li class="apsarap" id="jquery"></li>
		<li class="apsarap" id="php"></li>
		<li class="apsarap" id="wpress"></li>		
	</ul>
	<div class="wtf3"></div>
</section>

</div>
</div>

<div id="the_end"></div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquerymin.js"></script>
<script type="text/javascript"> 

	/*$(window).load(function(){ //make sure the whole site is loaded
		$('#mainContent').hide();//will first fade out the loading animation	
		$('#status').delay(1000);
		$('#status').delay(1000).fadeOut(500);
		$('#preloader').delay(1000).slideUp(400);//will fade out the white DIV that covers the website	
		$('#sitehead').hide();
		$('#mainContent').fadeIn(500);
		$('.home-summary').delay(2000).fadeIn(900);
	})();*/
</script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.about-team-navigation .about-team-small a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.about-team-navigation ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('div').addClass('active-tab').siblings().removeClass('active-tab');
 
        e.preventDefault();
    });
});
</script>

<script>
	$(function(){
		//function to toggle megamenu
		
		$('#topnav2 ul li a').click(function(){
			$(this).toggleClass('togg2');
			$(this).parent().find('div.innerli').toggleClass('togg');
			
		});
		
		
	});
</script>
</body>
</html>
