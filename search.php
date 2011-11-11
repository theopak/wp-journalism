<?php

//setup the search results
global $wp_query;
$total_results = $wp_query->found_posts;

get_header();

echo "	<section>\n";

echo "		<h1>";
printf( __("Search Results for: \"%s\""), '<span>' . get_search_query() . '</span>' );
echo "</h1>\n		<div class=\"meta\">".$total_results." results found</div>\n";

//WP loop to display results
if(have_posts()) {
	while (have_posts()) { the_post();
		echo "	<article>\n";
		echo "		<h3><a href=\"";
		the_permalink();
		echo "\">";
		the_title();
		echo "</a></h3>\n";
		the_excerpt();
		echo "	</article>\n";
	}
} else {
	_e("<h1>Nothing found</h1>\n<p>Sorry, please try again with different keywords.</p>");
}

echo "	</section>\n";

get_footer();

?>