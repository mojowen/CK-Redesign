jQuery(document).ready(function($) { 

	// Our Story Expand
	$('.expand').click(function(){
		$('.part-2').slideToggle();
	})	
	
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


});