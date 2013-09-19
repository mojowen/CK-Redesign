<?php 
/* Template for all pages
*/

get_header(); ?>

<?php the_post(); ?>

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
	<?php include 'side-navigation.php'; ?>
	</div> <!-- .secondary -->

	<div class="primary">
		<?php if ($post ->post_parent) { ?>
			<h1><?php the_title(); ?></h1>
		<?php } ?>
		<?php the_content(); ?>
	</div> <!-- .primary -->
</div> <!-- .container -->
<?php get_footer(); ?>