// Smooth internal link scrolling
function scrollToDiv(element,navheight){
    var offset = element.offset();
    var offsetTop = offset.top;
    var totalScroll = offsetTop-navheight;
 	$('#device').css('height', '200px'); // fix for iOS: links become unclickable on position fixed
    $('html, body').animate({
            scrollTop: totalScroll
    }, 900, 'easeInOutBack',
    	function() {
    		$('#device').css('height', '1px'); // fix for iOS: links become unclickable on position fixed
    	}
    );
}


$('body,html').bind('scroll mousedown DOMMouseScroll mousewheel keyup', function(e){
 if ( e.which > 0 || e.type == "mousedown" || e.type == "mousewheel"){
  $("html,body").stop();
 }
})

function product_heights() {
	if($(window).width() >= 599) {
		var highest_product = 0;
		$('#pricing li.hproduct').each(
			function() {
				var my_height = $(this).height();
				if($(this).height() > highest_product) {
					highest_product = $(this).height();
				}
			}
		);
	} else {
		var highest_product = 'auto';
	}
	$('#pricing li.hproduct').css({'height' : highest_product});
}

function setup_smooth_scroll() {
	// slide to internal links
	$('.to_top_link a, header[role="banner"] nav li:not(:nth-child(2)) a, #elevator_pitch #call_to_action a, #pricing li.hproduct p.button a').click(function(){
	    var el = $(this).attr('href');
	    var elWrapped = $(el);
	    scrollToDiv(elWrapped,0);
	    return false;
	});
	// account for negative margin on pricing block
	$('header[role="banner"] nav li:nth-child(2) a').click(function(){
	    var el = $(this).attr('href');
	    var elWrapped = $(el);
	    scrollToDiv(elWrapped,80);
	    return false;
	});
}

function setup_smooth_scroll_mobile() {
	// slide to internal links
	$('header[role="banner"] nav li:nth-child(3) a, #elevator_pitch #call_to_action a, #pricing li.hproduct p.button a').click(function(){
	    var el = $(this).attr('href');
	    var elWrapped = $(el);
	    scrollToDiv(elWrapped,0);
	    return false;
	});

	$('header[role="banner"] nav li:nth-child(1) a, #elevator_pitch #call_to_action a, #pricing li.hproduct p.button a').click(function(){
	    var el = $(this).attr('href');
	    var elWrapped = $(el);
	    scrollToDiv(elWrapped,40);
	    return false;
	});

	// account for negative margin on pricing block
	$('header[role="banner"] nav li:nth-child(2) a').click(function(){
	    var el = $(this).attr('href');
	    var elWrapped = $(el);
	    scrollToDiv(elWrapped,80);
	    return false;
	});
}

$(window).setBreakpoints({
// array of widths in pixels where breakpoints
// should be triggered
    breakpoints: [
        590
    ] 
});


// Load functions on resize
var TO = false;
$(window).resize(function(){
 if(TO !== false)
    clearTimeout(TO);
 TO = setTimeout(function() {
	    product_heights();
		}, 200); //200 is time in miliseconds
});

function checkImagesLoaded() {
	if(howManyLoaded == howMany) {
		clearInterval(slideShowLoadedInterval);
		$("#prev_slide, #next_slide, #slideshow_nav").css({ 'opacity' : '1' });
		swappingSlides = setInterval(function() { swapSlides(undefined) }, 4000);
	}
}


function swapSlides(selectedSlide) {
	// Select next slide
	if(selectedSlide == undefined) {
		whichSlide++;
	} else {
		whichSlide = selectedSlide;
	}
	
	if(whichSlide == howMany + 1 ) { whichSlide = 1; }

	// Highlight correct navigation label
	$('#slideshow_nav li').removeClass('current');
	$('#slideshow_nav li:nth-child(' + whichSlide + ')').addClass('current');

	$('#slide_' + whichSlide).css({'z-index' : 800});
	$('#slide_' + whichSlide).fadeIn(1500);
	for (var x = 1; x < howMany + 1; x++) {
		if(x != whichSlide) {
			$('#slide_' + x).css({'z-index' : (100 + x)});
			$('#slide_' + x).fadeOut(1500);
		}
	}
}


$('document').ready(
	function() {
		$("#container").append("<div id=\"device\"></div>");
		if($(window).width() > 590) {
			setup_smooth_scroll();
		} else {
			setup_smooth_scroll_mobile();
		}

		/************
		/ SLIDESHOW
		*************/

		// set image text / image file
		var slideShowImages = [
			["traffic info", "FlatScreenTraffic.jpg"],
			["public transport info", "FlatScreenPublic.jpg"],
			["social media", "FlatScreenSocial.jpg"],
			["stock exchange", "FlatScreenStock.jpg"],
			["control screen", "FlatScreenControl.jpg"]
		];
		whichSlide = 1;
		howMany = slideShowImages.length;
		howManyLoaded = 1;
		if(howMany > 1) {
			// Add slideshow nav below slides
			var slideshow_nav_content = "<ul>";
			for(var x = 0; x < slideShowImages.length; x++) {
				var current = "";
				if(x == 0) { 
					current = " class=\"current\""; 
				}
				slideshow_nav_content += "<li" + current + "><a href=\"" + (x + 1) + "\">" + slideShowImages[x][0] + "</a></li>";
			}
			slideshow_nav_content += "</ul>";
			// $('#content').append($('<section>').attr('id', 'about').html('<h1>About Us</h1><p>some text</p>'));
			//$("section#slideshow").after(slideshow_nav);//.attr();
			var slideshow_nav = $("<nav>");
			slideshow_nav.attr('id', 'slideshow_nav');
			slideshow_nav.html(slideshow_nav_content);
			$("section#slideshow").after(slideshow_nav);

			//slideshow_nav.attr('id', 'slideshow_nav').html(slideshow_nav);//.attr();

			// Connect slideshow navigation
			$("#slideshow_nav a").click(
				function() {
					clearInterval(swappingSlides);
					swapSlides($(this).attr("href"));
					swappingSlides = setInterval(swapSlides, 4000);
					//alert($(this).attr("href"));
					return false;
				}
			);

			// Add Next/previous buttons
			$("section#slideshow").append("<a id=\"prev_slide\" href=\"#\">&lt;</a> <a href=\"#\" id=\"next_slide\">></a>");

			// Connect prev/next buttons
			$("section#slideshow #prev_slide").click(
				function() {
					var prevSlide = whichSlide - 1;
					if(prevSlide < 1) {
						prevSlide = howMany;
					}
					clearInterval(swappingSlides);
					swapSlides(prevSlide);
					swappingSlides = setInterval(swapSlides, 4000);
					return false;
				}
			);

			$("section#slideshow #next_slide").click(
				function() {
					var nextSlide = whichSlide + 1;
					
					if(nextSlide > howMany ) {
						nextSlide = 1
					}
					clearInterval(swappingSlides);
					swapSlides(nextSlide);
					swappingSlides = setInterval(swapSlides, 4000);
					
					return false;
				}
			);

			// Add slides
			for(var x = 2; x <= slideShowImages.length; x++) {
				$('#slide_holder').append("<img class=\"slide\" id=\"slide_" + x + "\" alt=\"" + slideShowImages[x-1][0] + "\" />");
				$('#slide_' + x).css({ 'display' : 'none' });
				$('#slide_' + x).attr('src', base_url + 'themes/site/img/' + slideShowImages[x-1][1]).load(function(){
					howManyLoaded++;
				});
			}
			slideShowLoadedInterval = setInterval(checkImagesLoaded, 100);
		}


		/***************
		/ END SLIDESHOW
		***************/

		// Hide vcards for iOS devices
		var deviceAgent = navigator.userAgent.toLowerCase();
		var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
		if (agentID) {
		  $('.download_vcard').css({'display':'none'}); 
		}


		// Style selectbox
		$("#company_application").selectbox({ // http://www.bulgaria-web-developers.com/projects/javascript/selectbox/
			onOpen: function (inst) {
				//console.log("open", inst);
			},
			onClose: function (inst) {
				//console.log("close", inst);
			},
			onChange: function (val, inst) {
				//alert('val');
			},
			effect: "slide"
		});

		$(window).bind('enterBreakpoint590',function() {
			product_heights();
			setup_smooth_scroll();

		});

		$(window).bind('exitBreakpoint590',function() {
			product_heights();
			setup_smooth_scroll_mobile();
		});


		/**
		 * Checking URL if we need to scroll to the contactform.
		 * Initialize smooth scroll after appending the Slideshow HTML.
		 */

		/* scroll to form after submission (for iOS) */
		var my_url = document.URL;
		if(my_url.substring(my_url.length - 1) == "/") {
			my_url = my_url.substring(0, my_url.length-1);
		}
		my_url = my_url.split("/");
		var my_last_url_segment = my_url[my_url.length - 1];
		if(my_last_url_segment == "form" || my_last_url_segment == "form/") {
			    var el = "#contact_form";
			    var elWrapped = $(el);
			    scrollToDiv(elWrapped,0);
		}

	}
);