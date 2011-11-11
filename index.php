<?php

get_header();

echo "		<section>\n";

if(have_posts()) {
	while (have_posts()) { the_post();
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
		the_content();
		echo "				</article>\n";
	}
	echo "<div class=\"meta\">";
	posts_nav_link();
	echo "</div>";

	get_sidebar('Home');
} else {
	_e('Sorry, you have encountered an error.');
}

echo "		</section>\n";

get_footer(); ?>