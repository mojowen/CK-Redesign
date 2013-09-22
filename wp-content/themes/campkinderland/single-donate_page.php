<?php

get_header(); ?>

<div class="container clearfix">

	<div class="secondary">

		<?php wepay_donate_button(); ?>
		<?php wepay_progress_bar(); ?>

	</div> <!-- .secondary -->

	<div class="primary">
		<?php while ( have_posts() ): the_post(); ?>

		<h1 class="post-title"><?php the_title(); ?></h1>

		<?php the_content(); ?>


		<?php endwhile; ?>

	</div> <!-- .primary -->
</div> <!-- .container -->

<?php get_footer(); ?>