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
});