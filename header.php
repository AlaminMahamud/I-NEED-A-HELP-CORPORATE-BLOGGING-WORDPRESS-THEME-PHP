<!DOCTYPE html>
<html>
<head>

<?php //Title Tag
?>
<title>I Need A Help</title>
<?php//put all meta tags Here
?>
<meta charset="<?php bloginfo('charset');?>"/>
<meta name="p:domain_verify" content="e7923c73aa8df1b1e22b9291207fd02c"/>
<meta name="google-site-verification" content="-nEP2J-pRDxvjicu4gG3TEyDjuWxULbQ6HRYdSfJ83I" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title();?></title>
<?php //Put all Stylesheet Here
?>

<?php//Main Stylesheet?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url');?>"/>

<?php//Retina Ready Stylesheet?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/lessframework4.css"/>

<?php//fonts stylesheet?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/fonts/font-awesome/css/font-awesome.min.css"/>

<?php//slider stylesheet?>
<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/flexslider.css"/>
<?php//cubeportfolio stylesheet?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/cubeportfolio.css"/>
-->
<?php//pingback
?>
	<link rel="pingback" href="bloginfo('pingback_url');"/>
	
<?php //profile
?>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>

<?php //calling the comment reply script
	if(is_singular() && get_option('thread_comments')) wp_enqueue_script('comment_reply');
	?>
	


</head>
<body>
<div id="home_way"></div>
