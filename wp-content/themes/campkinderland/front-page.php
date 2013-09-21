<?php
/**
 * Template Name: Front Page Template
 *
 */

get_header(); ?>

<?php 	$images = get_field('home_gallery');
		if ( $images ): ?>
	<section class="flexslider clearfix">
		<ul class="slides">
			<?php foreach( $images as $image ): ?>
				<li class="slide">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</li>
			<?php endforeach; ?>
		</ul> <!-- .slides -->
	</section> <!-- .home-slider -->
<?php endif; ?>

<section class="our-story clearfix">
	<div class="container">
		<div class="story-logo">
			<a class="down-arrow expand"></a>
		</div>
		<div class="part-1">
			<h1 class="expand">Our Story</h1>
			<?php the_field('our_story_1'); ?>
		</div> <!-- .part-1 -->
		<div class="part-2">
			<?php the_field('our_story_2'); ?>
		</div> <!-- .part-2 -->
	</div> <!-- .container -->
</section> <!-- .our-story -->

<section class="home-content map clearfix">
	<div class="container">
		<div class="news column">
			<div class="banner">
				<h2>News &amp; Announcements</h2>
			</div> <!-- .banner -->
			<?php 	$args = array(
					'post_type' => 'post',
					);
					$wp_query = new WP_Query( $args );
					while ( have_posts() ) : the_post(); ?>

			<article class="post">
				<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="post-content">
					<?php the_excerpt(); ?> 
				</div>
			</article> <!-- .post -->

			<?php endwhile; ?>		
		</div> <!-- .news -->

		<div class="events column">
			<div class="banner">
				<h2>Upcoming Events</h2>
			</div> <!-- .banner -->			
			<?php  $args = array(
				'post_type' => 'event',
				'meta_key' => 'event_date',
				'order_by' => 'meta_value_num',
				'order' => 'asc'
				);
				$wp_query = new WP_Query( $args );
				while ( have_posts() ) : the_post();  ?>

				<article class="event clearfix">
					<?php event_date(); ?>
					<h3 class="event-title post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="event-blurb">
						<?php the_field('event_blurb'); ?>
					</div> <!-- .event-description -->
				</article> <!-- .event -->
			<?php  endwhile;  ?>
			<div class="read-more">
				<a href="/kinderland-community/events">View All Events</a>
			</div> <!-- .read-more -->
		</div> <!-- .events -->
	</div> <!-- .container -->
</section>

<?php get_footer(); ?>