<?php

/**
 * single.php
 * 
 * @package WordPress
 * @subpackage wp-journalism
 */

get_header();

// WP loop to display a single post
if(have_posts()) {
	while (have_posts()) { the_post();
	
		// featured image, if applicable, goes before everything
		if(has_post_thumbnail()) {
			echo "		<figure>";
			the_post_thumbnail('featured');
			echo "</figure>";
		}

		// open section
		echo "		<section>\n";

		echo "		<article class=\"single post\" id=\"post-";
		the_ID();
		echo "\">\n";
		echo "				<!--<h2>";
		the_category(', ','single');
		echo "</h2>-->\n				";
		echo "\n				<h3>";
		the_title();
		echo "</h3>\n				<div class=\"meta\">by <em><a class=\"author\" href=\"".
			get_author_posts_url( get_the_author_meta('ID') )."\">".get_the_author()."</a></em> on <em>";
		the_time('F j, Y');
		echo "</em> in the <em><a href=\"";
		$cat = get_the_category();
		echo get_category_link($cat[0]->cat_ID);
		echo "\">".$cat[0]->cat_name."</a></em> section\n";
		edit_post_link('(admin: edit this post)', ' ', '');
		echo "</div>\n			";
		the_content();
		echo "\n		</article>";

		// comments
		echo "		<article class=\"single post comments\" id=\"comments-";
		the_ID();
		echo "\">\n";
		if (function_exists('facebook_comments')) {
			facebook_comments();
		} else {
			comment_form();
		}
		echo "\n		</article>\n";

		// sidebar
		?>
			<div id="sidebar">
				<ul>
					<li>
						<h2>About The Author</h2>
						<?php echo get_avatar( get_the_author_meta('ID'), 50 ); ?>
						<a class="author" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php 
							echo get_the_author(); ?></a>
						<p><?php echo the_author_meta('description'); ?></p>
					</li>
					<li>
						<h2>Share This</h2>
						<span class="st_twitter_large" displayText="Tweet"></span><span class="st_facebook_large" displayText="Facebook"></span><span class="st_ybuzz_large" displayText="Yahoo! Buzz"></span><span class="st_email_large" displayText="Email"></span><span class="st_sharethis_large" displayText="ShareThis"></span>
					</li>
					<!--<li>
						<h2>Find us on Facebook</h2>
						<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FThe-Monument-High-Points-School-Paper%2F100292076718334&amp;width=210&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:210px; min-height: 200px;" allowTransparency="true"></iframe>
					</li>-->
				</ul>
			</div>
		<?php

		// close section
		echo "\n		</section>\n";

	}
} else {
	_e('<section><h3>Sorry, you have encountered an error.</h3></section>');
}

get_footer();

?>
