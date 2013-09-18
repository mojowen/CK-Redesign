<?php 
/* Template for all pages
*/

get_header(); ?>

<?php the_post(); ?>

<div class="container clearfix">

<div class="secondary">
	<?php if ($post->post_parent) { 
	 	$title = get_post($post->post_parent)->post_title;
	} else { 
		$title = $post->post_title;
	}	?>
	<h1 class="page-title"><?php echo $title ?></h1>
	<?php include 'side-navigation.php'; ?>
	</div> <!-- .secondary -->

	<div class="primary">
	<?php the_content(); ?>
	</div> <!-- .primary -->
</div> <!-- .container -->
<?php get_footer(); ?>