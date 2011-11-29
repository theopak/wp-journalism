<?php

/**
 * author.php
 * 
 * @package WordPress
 * @subpackage wp-journalism
 */

get_header();

// start the loop so the author hooks can be used
if(have_posts()) {
	the_post();
		echo "		<section class=\"author\">\n			";
		echo get_avatar($author,120);
		echo "			<h1>".get_the_author()."</h1>\n";
		 ?>
			<p><?php echo the_author_meta('description'); ?></p>
		<?php 
		echo "		</section>\n";
}

// reset for a new author loop
rewind_posts();
get_template_part('loop','author');

// display all posts by this author
echo "		<section>\n";
if(have_posts()) {
	echo "			<h2 style=\"margin: 0 280px 0 40px;\">All Posts by ".get_the_author()."</h2>\n";
	while (have_posts()) { the_post();
		echo "				<article class=\"single\">\n";
		echo "					<h3><a href=\"";
		the_permalink();
		echo "\">";
		the_title();
		echo "</a></h3>\n					<div class=\"meta\">";
		echo "by <em><a class=\"author\" href=\"".get_author_posts_url( get_the_author_meta('ID') )."\">".get_the_author()."</a></em> on <em>";
		the_time('F j');
		echo "</em></div>\n					";
		if(has_post_thumbnail()) {
			echo "					";
			the_post_thumbnail();
			echo "\n";
		}
		the_excerpt();
		echo "				</article>\n";
	}
	echo "<div class=\"meta\">";
	posts_nav_link();
	echo "</div>";
} else {
	_e('Sorry, you have encountered an error.');
}
get_sidebar('Home');
echo "		</section>\n";

get_footer();

?>
