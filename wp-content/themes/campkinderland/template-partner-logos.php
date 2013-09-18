<?php
/**
 * Template Name: Partner Logos
 * This page isn't displayed as a standalone page on the site
 * It is just used to grab all the logos and put them in a row
 * It can then be referenced by other templates
 */
	$logos = get_field('partner_logos', 54); ?>
	<h2>Our Partners &amp; Affiliates</h2>
	<img class="arrow-top" src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow-top.png" alt="arrow">
	<ul class="partner-logos horizontal">
		<?php foreach( $logos as $logo ) : ?>
			<li class="partner-logo">
				<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
			</li>
		<?php endforeach; ?>
	</ul> <!-- .partner-logos -->
	<img class="arrow-botom" src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow-bottom.png" alt="arrow">
