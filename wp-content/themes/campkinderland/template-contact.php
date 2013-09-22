<?php 
/* Template Name: Contact
*/

get_header(); ?>

<?php the_post(); ?>

<div class="container clearfix">

	<div class="primary contact">
		<h1>Locations &amp; Phone</h1>
		<div class="season-toggle-container clearfix">
			<a class="season-toggle summer-toggle active">Summer</a>
			<a class="season-toggle off-toggle">Off-Season</a>
		</div> <!-- .season-toggle -->
		<div class="address active-address summer-contact">
			<h2>Summer Contact</h2>
			<?php the_field('summer_contact'); ?>
		</div> <!-- .summer-contact -->
		<div class="address off-season-contact">
			<h2>Off-Season Contact</h2>
			<?php the_field('off-season_contact'); ?>
		</div> <!-- .off-season-contact -->
		<div class="email-contact">
			<h1>Email the Staff</h1>
			<?php the_field('staff_email'); ?>
		</div> <!-- .email-contact -->
	</div> <!-- .primary -->

</div> <!-- .container -->
<?php get_footer(); ?>