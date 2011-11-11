<?php

get_header();

//var
$cat = get_the_category();


//first page only
if($paged<2) {

	echo "		<section class=\"featured\">\n			<h2>Featured <em>".$cat[0]->cat_name."</em> Articles</h2>\n";

	//4 featured articles, each in an article.newhalf
	query_posts(array(
		'cat'	=>	$cat[0]->cat_ID,
		'posts_per_page'	=>	4
	));
	if(have_posts()) {
		while (have_posts()) { the_post();
			echo "			<article class=\"newhalf\">\n";
			echo "				<article id=\"post-";
			the_ID();
			echo "\">\n";
			if(has_post_thumbnail()) {
				echo "					<figure>\n					";
				the_post_thumbnail('featured-thumb');
				echo "\n					</figure>\n";
			}
			echo "					<h3><a href=\"";
			the_permalink();
			echo "\">";
			the_title();
			echo "</a></h3>\n					<div class=\"meta\">by <em><a class=\"author\" href=\"".
				get_author_posts_url( get_the_author_meta('ID') )."\">".get_the_author()."</a></em> on <em>";
			the_time('F j, Y');
			echo "</em>";
			edit_post_link('(edit)',' ', '');
			echo "</div>\n					";
			echo "				</article>\n";
			echo "			</article>\n";
		}
	} else {
		_e('Sorry, you have encountered an error.');
	}
	wp_reset_query();

	echo "		</section>\n";
}

//all articles in the category listed by page, offset by 4
query_posts(array(
	'cat'				=>	$cat[0]->cat_ID,
	'posts_per_page'	=>	5,
	'offset'			=>	4
));
if(have_posts()) {
	echo "		<section>\n";
	echo "			<article>\n";
	while (have_posts()) { the_post();
		echo "				<article class=\"single\">\n";
		echo "					<h3><a href=\"";
		the_permalink();
		echo "\">";
		the_title();
		echo "</a></h3>\n					<div class=\"meta\">";
		echo "by <em><a class=\"author\" href=\"".get_author_posts_url( get_the_author_meta('ID') )."\">".get_the_author()."</a></em> on <em>";
		the_time('F j');
		echo "</em>\n";
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

	get_sidebar('Default');

	echo "		</section>\n";
}
wp_reset_query();

get_footer();

?>