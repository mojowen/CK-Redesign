<div class="blog-sidebar">
<?php 
	$args = array(
		'depth'        => 0,
		'show_date'    => '',
		'date_format'  => get_option('date_format'),
		'child_of'     => 0,
		'exclude'      => '',
		'include'      => '',
		'title_li'     => __('Recent Posts'),
		'echo'         => 1,
		'authors'      => '',
		'sort_column'  => 'menu_order, post_title',
		'link_before'  => '',
		'link_after'   => '',
		'walker'       => '',
		'post_type'    => 'post',
	);
	wp_list_pages( $args ); 
?> 
</div> <!-- .blog-sidebar -->