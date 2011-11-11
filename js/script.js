/* GLOBAL INFO AND SETTINGS ============================================================================================= */
var debugmode = false; //debugging
stLight.options({publisher:'bc7d1f27-a73b-4d4c-8f00-8fbb8b6764ed'});

/* Author: Chris McClean (http://www.wheelercentral.net/) =============================================================== */

	/* --- smooth scrolling with jQuery (http://css-tricks.com/snippets/jquery/smooth-scrolling/ #85066 ------------------*/
	$(document).ready(function() {
		$('a[href*=#]').bind('click', function(e) {
			e.preventDefault(); //prevent the "normal" behaviour which would be a "hard" jump
			var target = $(this).attr("href"); //Get the target
			
			// perform animated scrolling by getting top-position of target-element and set it as scroll target
			$('html, body').stop().animate({ scrollTop: $(target).offset().top }, 2000, function() {
				location.hash = target;  //attach the hash (#jumptarget) to the pageurl
			});
			
			return false;
		});
	});


/* Author: tuupola (http://www.appelsiini.net/) ========================================================================= */

	/* --- lazyLoad (https://github.com/tuupola/jquery_lazyload) (depends on jquery.lazyload.min.js) -------------------- */
	$(function() {
		$("img:below-the-fold").lazyload({
			placeholder:	"../img/loading.gif",
			effect:			"fadeIn",
			event:			"waitForLoad"
		});
	});
	$(window).bind("load", function() { 
		var timeout = setTimeout(function() {$("img").trigger("waitForLoad")}, 5000);
	});


/* Author: Theo Pak (http://theopak.com) ================================================================================ */

		Cufon.replace('h1'); // Works without a selector engine
		Cufon.replace('#sub1'); // Requires a selector engine for IE 6-7, see above

		$(window).load(function() {
			$('#slider').nivoSlider({
				effect:'random', //Specify sets like: 'fold,fade,sliceDown'
				slices:15,
				animSpeed:500, //Slide transition speed
				pauseTime:5000,
				startSlide:0, //Set starting Slide (0 index)
				directionNav:true, //Next & Prev
				directionNavHide:true, //Only show on hover
				controlNav:true, //1,2,3...
				controlNavThumbs:false, //Use thumbnails for Control Nav
				controlNavThumbsFromRel:false, //Use image rel for thumbs
				controlNavThumbsSearch: '.jpg', //Replace this with...
				controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
				keyboardNav:true, //Use left & right arrows
				pauseOnHover:true, //Stop animation while hovering
				manualAdvance:false, //Force manual transitions
				captionOpacity:0.8, //Universal caption opacity
				beforeChange: function(){},
				afterChange: function(){},
				slideshowEnd: function(){}, //Triggers after all slides have been shown
				lastSlide: function(){}, //Triggers when last slide is shown
				afterLoad: function(){} //Triggers when slider has loaded
			});
		});
