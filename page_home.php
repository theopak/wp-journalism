<?php
/*
 * Template Name: Overview w/ Slider
 */

get_header();

//intro (cat #45 'featured')
$feat_query = new WP_Query();
$feat_query->query(array(
	'category_name'		=>	'featured',
	'posts_per_page'	=>	1,
	'nopaging'			=>	true
	
));
if($feat_query->have_posts()&&$paged<2) {
	echo "		<aside id=\"intro\">\n			<div id=\"slider\">\n";
	while ($feat_query->have_posts()) { $feat_query->the_post(); 
		$id = get_the_id();
		$cat = get_the_category();
		$title = strip_tags(the_title('','',0));
		echo "				<a href=\"";
		the_permalink();
		echo "\">\n					";
		if(has_post_thumbnail()) {
			the_post_thumbnail('featured',array(
				'title'	=>	"Featured <em>".$cat[0]->cat_name."</em> Article: $title"
			));
		} else {
			echo "<img alt=\"\" title=\"Featured <em>".$cat[0]->cat_name."</em> Article: ";
			echo "$title\" src=\"http://sandbox.theopak.com/monument/wp-content/themes/MONUMENT/assets/logo-big.png\"/>";
		}
		echo "\n				</a>\n";
	}
	echo "			</div>\n		</aside>\n";
}
wp_reset_query();

echo "		<section>\n";

//all articles, in pages of 5
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'			=> 'post',
	'posts_per_page'	=>	7,
	'paged'				=>	$paged
));
if($wp_query->have_posts()) {
	echo "			<article>\n";
	while ($wp_query->have_posts()) { $wp_query->the_post();
		$cat = get_the_category();
		echo "				<article class=\"single\">\n";
		echo "					<h3><a href=\"";
		the_permalink();
		echo "\">";
		the_title();
		echo "</a></h3>\n					<div class=\"meta\">";
		echo "by <em><a class=\"author\" href=\"".get_author_posts_url( get_the_author_meta('ID') )."\">".get_the_author()."</a></em> on <em>";
		the_time('F j');
		echo "</em> in the <em><a href=\"";
		echo get_category_link($cat[0]->cat_ID);
		echo "\">".$cat[0]->cat_name."</a></em> section\n";
		edit_post_link('(admin: edit this post)', ' ', '');
		echo "</div>\n			";
		if(has_post_thumbnail()) {
			echo "					";
			the_post_thumbnail();
			echo "\n";
		}
		the_excerpt();
		echo "				</article>\n";
	}

	//pagination
	echo "<div class=\"meta\">";
	posts_nav_link();
	echo "</div>";

	echo "			</article>\n";

	get_sidebar('Home');
} else {
	_e('Sorry, you have encountered an error.');
}
wp_reset_query();

echo "		</section>\n";

get_footer(); ?>