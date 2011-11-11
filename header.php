<!DOCTYPE html>
<!--[if lt IE 7 ]>	<html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7 ]>		<html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>		<html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>"><!-- utf-8, I would hope -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php
		wp_title( '|', true, 'right' );
		if($post->post_parent) {
			$parent_title = get_the_title($post->post_parent);
			echo $parent_title." &laquo; ";
		}
		bloginfo('name');
	?></title>
	<meta name="description" content="<?php
		//if (is_single()) {
			//single_post_title('', true);
			//the_tags(" - Tags:"); //NOTE: this outputs HTML with <a href="~">tag</a>
			//echo " - "; the_excerpt();
		//} else {
			bloginfo('name');
			echo " - ";
			bloginfo('description');
		//}
	?>" />
	<meta name="keywords" content="">
	<meta name="geo.region" content="US-NJ">
	<meta name="author" content="Theo Pak">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/apple-touch-icon.png">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> - RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

	<link rel="stylesheet" href="css/style.css?v=2">
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/libs/modernizr-2.0.6.min.js"></script>

	<?php wp_head(); ?>

</head>
<body>
	<header id="head">
		<h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php wp_nav_menu(array(
			'theme_location'	=> 'header_side',
		)); ?>
		<form style="float: right;" role="search" method="get" action="<?php bloginfo('url'); ?>">
				<input
					type="text"
					id="s"
					name = "s"
					value="Search"
					onclick="if(this.value=='Search'){this.value='';this.style.color='#333'}" 
					onblur="if(this.value==''){this.value='Search';this.style.color='#999';}">
			</form>
	</header>
	<div id="main">
		<nav>
			<ul>
				<li<?php if(is_front_page()){echo" class=\"current_page_item\"";} ?>><a href="<?php echo home_url('/'); ?>">Home</a></li>
				<?php
				if(!is_front_page()) {
					$cat = get_the_category();
					$cat_current = $cat[0]->cat_ID;
				}
				wp_list_categories(array(
					'orderby'	=>	'ID',
					'title_li'	=>	'',
					'depth'		=>	'1',
					'hide_empty'=>	'1',
					'exclude'	=>	'1,45',
					'current_category'	=>	$cat_current
				));
				//wp_list_categories('sort_order=asc&style=list&children=false&title_li=0'); ?>
			</ul>
		</nav>
