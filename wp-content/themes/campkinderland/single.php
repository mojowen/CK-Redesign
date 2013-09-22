<?php

get_header(); ?>

<div class="container clearfix">

	<div class="secondary">
		<?php $kc_link = get_page_by_title('Kinderland Community')->ID; ?>
		<h1 class="page-title"><a href="<?php echo get_permalink($kc_link); ?>">Kinderland Community</a></h1>
		<?php 	wp_nav_menu(array('menu'=>'Kinderland Community', 'menu_class'=>'side-nav')); ?>
		<div class="blog-side">
			<?php dynamic_sidebar('blog'); ?>
		</div>
	</div> <!-- .secondary -->

	<div class="primary">
		<?php while ( have_posts() ): the_post(); ?>
		<h1 class="post-title"><?php the_title(); ?></h1>
		<span class="post-date">Posted: <?php echo get_the_date(); ?> | </span>
		<span class="post-author">By: <?php the_author(); ?></span>
		<?php the_content(); ?>
		<div class="nav-previous"><?php previous_post_link('%link', '&laquo; Previous Post'); ?></div>
		<div class="nav-next"><?php previous_post_link('%link', 'Next post &raquo;' ); ?></div>
		<?php endwhile; ?>
	</div> <!-- .primary -->
</div> <!-- .container -->
<?php get_footer(); ?>