<?php

get_header(); ?>

<div class="container clearfix">

<div class="secondary">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</div> <!-- .secondary -->

	<div class="primary">
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