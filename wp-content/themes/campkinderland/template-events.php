<?php 
/* Template Name: Events
*/
get_header(); ?>

<div class="container clearfix">

<div class="secondary">
	<?php if ($post->post_parent) {
		$parent = get_post($post->post_parent); 
	 	$title = $parent->post_title; ?>
 		<h1 class="page-title"><a href="<?php echo get_permalink($parent); ?>"><?php echo $title ?></a></h1>
	<?php } else { 
		$title = $post->post_title; ?>
		<h1 class="page-title"><?php echo $title ?></h1>
	<?php }	?>
	<?php 
		include 'side-navigation.php'; 
	?>
		<div class="blog-side">
			<?php dynamic_sidebar('blog'); ?>
		</div>
	</div> <!-- .secondary -->

	<div class="primary">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'event',
				'posts_per_page' => 10,
				'paged' => $paged,
				'meta_key' => 'event_date',
				'order_by' => 'meta_value_num',
				'order' => 'asc'

			);
			$wp_query = new WP_Query( $args );
			while ( have_posts() ) : the_post(); ?>

			<article class="post">
				<?php event_date(); ?>
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