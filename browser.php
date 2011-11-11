<?php
/*
 * Article Selection by Post
 * To be accessed with javascript and inserted into a page without reloading the page
 */

wp_head();

//list title,author,date of 5 most recent articles given a category
function getCategory($cat) {
	query_posts('cat='.$cat.'&posts_per_page=5');
	if(have_posts()) {
		while (have_posts()) { the_post();
			echo "				<li>\n					<h3>";
			the_title();
			echo "</h3>\n					<small>by <em><a href=\"\">".get_the_author()."</a></em> on ";
			the_time('F j');
			echo "</small>\n				</li>\n";
		}
	} else {
		_e('ERROR - no posts found.');
	}
}

//write excerpt and read more link of an article given its ID
function getArticle($id) {
	$post = get_post($id);
	if(have_posts()) {
		while (have_posts()) { the_post();
			echo $post->post_excerpt;
		}
	} else {
		_e('ERROR - no posts found.');
	}
}

?>