jQuery(document).ready(function($) { 

	// Our Story Expand
	$('.expand').click(function(){
		$('.part-2').slideToggle();
	})	
	
	// Slider init
	$('.flexslider').flexslider({
		slideshow: true,
		animation: 'slide',
		controlNav: false,
		slideshowSpeed: 4000,
	});


	// Matching column heights 
	var column1, column2;
	column1 = $('.news');
	column2 = $('.events');

	if ( column1.height() > column2.height() ) {
		column2.height(column1.height());
	} else {
		column1.height(column2.height());
	}

	// Side Navigation
	var menuItem = $('.side-nav > .menu-item').not('.current-menu-item');

	// 1. Append expand buttons to any menu item with a submenu
	$(menuItem).has('.sub-menu').append('<a class="icon-expand"></a>');

	// 2. Collapse sub-menu
	$(menuItem).children('.sub-menu').hide();

	// 3. Open on clicking icon-expand
	$('.icon-expand').click(function(){
		$(this).parent().children('.sub-menu').slideToggle();
		$(this).toggleClass('rotate');
	});

	// 4. Implement localScroll
	$('.side-nav').localScroll({
		offset: -30
	});

	// Contact Page toggling
	$('.summer-toggle').click(function(){
		if ( ! $(this).hasClass('active') ) {
			$('.active-address').removeClass('active-address');
			$('.summer-contact').addClass('active-address');
			$('.active').removeClass('active');
			$(this).addClass('active');
			$('body').removeClass('off-season-map');
		}
	});

	$('.off-toggle').click(function(){
		if ( ! $(this).hasClass('active') ) {
			$('.active-address').removeClass('active-address');
			$('.off-season-contact').addClass('active-address');
			$('.active').removeClass('active');
			$(this).addClass('active');
			$('body').addClass('off-season-map');
		}
	})

	// Facilities Page 
	$('.facilities .side-nav a').click(function(e){
		e.preventDefault();

		// 1. Get the last part of the url 
		var url = $(this).attr('href').split('/');
		var selection = url[4];
		console.log(selection);

		// 2. Hide current facility & show the right facility 
		$('.fac-slide').hide();
		$('.'+selection).show();

		// 3. Add highlight class to menu item
		$('.current-menu-item').removeClass('current-menu-item');
		$(this).parent('li').addClass('current-menu-item');
	});

	// 4. Start out by showing the first slide and highlighting first item
	$('.facilities .side-nav li:first-child').addClass('current-menu-item');
	var firstSlide = $('.facilities .side-nav li:first-child a');
	var url = firstSlide.attr('href').split('/');
	var selection = url[4];
	$('.'+selection).show();



});