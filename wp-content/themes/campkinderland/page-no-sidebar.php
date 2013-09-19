<?php 
/* Template Name: Page (No Sidebar)
*/

get_header(); ?>

<?php the_post(); ?>

<div class="container clearfix">

	<div class="primary  no-side">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div> <!-- .primary -->

</div> <!-- .container -->
<?php get_footer(); ?>