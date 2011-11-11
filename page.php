<?php

get_header();

//WP loop
if(have_posts()) {
	while (have_posts()) { the_post();
		//featured image, if applicable, goes before everything
		if(has_post_thumbnail()) {
			echo "		<figure>";
			the_post_thumbnail('featured');
			echo "</figure>";
		}

		//open section
		echo "		<section>\n";

		echo "			<article class=\"single post\" id=\"post-";
		the_ID();
		echo "\">\n";
		echo "				<h3>";
		the_title();
		echo "</h3>\n				<div class=\"meta\">";
		edit_post_link('(admin: edit this page)', ' ', '');
		echo "</div>\n				";
		the_content();
		echo "\n			</article>";

		//sidebar
		get_sidebar('Default');

		//close section
		echo "\n		</section>\n";
	}
} else {
	_e('<section><h3>Sorry, you have encountered an error.</h3></section>');
}

get_footer();

?>