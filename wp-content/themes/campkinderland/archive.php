<?php

get_header(); ?>

<div class="container clearfix">

<div class="secondary">
 	<?php $parent = get_page_by_title('Kinderland Community')->ID; ?>
 		<h1 class="page-title"><a href="<?php echo get_permalink($parent); ?>">Kinderland Community</a></h1>

	<?php 	

	$args = array(
		'theme_location'  => '',
		'menu'            => 'Kinderland Community',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'side-nav',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	); 
	wp_nav_menu($args); ?>
		<div class="blog-side">
			<?php dynamic_sidebar('blog'); ?>
		</div> <!-- .blog-side -->
	</div> <!-- .secondary -->

	<div class="primary">
		<h1 class="page-title">News Archive: <?php echo get_the_date('F Y'); ?></h1>
		<?php while ( have_posts() ) : the_post(); ?>
		<article class="post">
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<span class="post-date">Posted: <?php echo get_the_date(); ?> | </span>
			<span class="post-author">By: <?php the_author(); ?></span>
			<div class="post-text"><?php the_content(); ?></div> 
		</article> <!-- .post -->
		<?php endwhile; ?>
			<div class="nav-previous"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
			<div class="nav-next"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
		<?php wp_reset_query(); ?>
	</div> <!-- .primary -->
</div> <!-- .container -->
<?php get_footer(); ?>