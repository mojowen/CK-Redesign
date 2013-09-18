<?php  
	/* First, figure out which menu to get */
	if ( $post->post_parent ) {
		$menu = get_post($post->post_parent)->post_title;
	} else {
		$menu = $post->post_title;
	}

	/* Second, generate the menu */
	$args = array(
		'theme_location'  => '',
		'menu'            => $menu,
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