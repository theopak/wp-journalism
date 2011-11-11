<?php

if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'			=>	'Default'
	));
	register_sidebar(array(
		'name'			=>	'Home',
		'description'	=>	'Displayed only on the home page'
	));
	/*register_sidebar(array(
		'name'			=>	'Article',
		'description'	=>	'Displayed only for single posts'
	));*/
}

if(function_exists('register_nav_menus')) {
	register_nav_menus(
		array(
			'header_side'	=> 'Quick Links Menu'
		)
	);
}

add_custom_background();

add_theme_support("post-thumbnails");
add_image_size('featured',960,350,true); //crop-resize
add_image_size('featured-thumb',460,168,true); //crop-resize
set_post_thumbnail_size(120,120); //box-resize (maintain aspect ratio)

function new_excerpt_more($more) {
	global $post;
	return " <a class=\"readmore\" href=\"".get_permalink($post->ID)."\">"."read more"."</a>";
}
add_filter('excerpt_more', 'new_excerpt_more');

?>