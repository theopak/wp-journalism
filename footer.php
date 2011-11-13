	</div>
	<footer>
		<span>
			<h1><?php bloginfo('name'); ?></h1>
			<a class="button" href="#top">(back to top)</a>
		</span>
		<em><?php bloginfo('description'); ?></em>
		<!--<section id="browser">
			<h2>Browse All Articles by Section</h2>
			<ul id="categories">
				<?php
				//$cat = get_the_category();
				//$cat_current = $cat[0]->cat_ID;
				//wp_list_categories('orderby=ID&title_li=&depth=1&hide_empty=0&exclude=1&current_category='.$cat_current); ?>
			</ul>
			<ul id="articles">
				<li class="current">
					<h3>Article Title</h3>
					<small>by <em>Author</em> on Nov 27, 2010</small>
				</li>
				<li>
					<h3>Article Title</h3>
					<small>by <em>Author</em> on Nov 27, 2010</small>
				</li>
				<li>
					<h3>Article Title</h3>
					<small>by <em>Author</em> on Nov 27, 2010</small>
				</li>
			</ul>
			<div>
				<?php
				//	$dir = bloginfo('stylesheet_directory');
				//	include($dir.'browser.php');
				//	getArticle(6);
				?>
			</div>
		</section>-->
		<p>Content &copy; <?php date('Y'); ?> <em></em><?php bloginfo('name'); ?></em>. Web design by <a href="http://theopak.com">Theo Pak</a>.</p>
	</footer>

	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>


	
	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/libs/jquery-1.6.4.min.js'>\x3C/script>")</script>

	<!-- scripts concatenated and minified via ant build script-->
		<!--<script src="js/plugins.js"></script>
		<script src="js/script.js"></script>-->
		<script src='<?php bloginfo('stylesheet_directory'); ?>/js/d8d1d18dfad533c401409af08fa5cb3be3ff85b2.js'></script>
	<!-- end scripts-->

	<script>
		// Typekit
		try{Typekit.load();}catch(e){}
		
		// Google Analytics (asyncronous)
		/*
		window._gaq = [['_setAccount','UA-XXXXXXXX'],['_trackPageview'],['_trackPageLoadTime']];
		Modernizr.load({
			load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
		});
		*/
	</script>

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6. -->
	<!--[if lt IE 7 ]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); ?>

</body>
</html>
