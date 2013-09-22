<?php 
/* Template Name: Facilities
*/

get_header(); ?>

<?php the_post(); ?>

<div class="facilities container clearfix">
	<div class="stitch stitch-ul"></div>
	<div class="stitch stitch-ur"></div>
	<div class="stitch stitch-lr"></div>
	<div class="stitch stitch-ll"></div>
	<div class="secondary">
		<h1 class="page-title">Facilities</h1>
		<?php include 'side-navigation.php'; ?>
		<div class="rental-link">
			<a href="<?php bloginfo('url'); ?>/facilities/rentals" title="Rental Information">Rental Information</a>
		</div> <!-- .rental-link -->
	</div> <!-- .secondary -->

	<div class="primary">
		<?php $args = array(
			'post_type' => 'facility',
			);
			$wp_query = new WP_Query( $args );

			while ( have_posts() ) : the_post(); ?>

			<div class="fac-slide <?php echo $post->post_name; ?>">
				<div class="fac-images clearfix">
					<?php if ( get_field('fac_photo_1') ) { ?>
						<div class="fac-image"><?php echo wp_get_attachment_image(get_field('fac_photo_1'), "full"); ?></div>
					<?php } if ( get_field('fac_photo_2') ) { ?>
						<div class="fac-image"><?php echo wp_get_attachment_image(get_field('fac_photo_2'), "full"); ?></div>
					<?php } ?>
				</div> <!-- .fac-images -->
				<div class="fac-content">
					<h2 class="fac-title"><?php the_title(); ?></h2>
					<div class="fac-description">
						<?php the_field('fac_description'); ?>
					</div> <!-- .fac-description -->
				</div> <!-- .fac-content -->
			</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</div> <!-- .primary -->
</div> <!-- .container -->
<?php get_footer(); ?>