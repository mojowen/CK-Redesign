<?php
	
register_nav_menus( );  

add_action( 'widgets_init', 'ul_widgets_init' );

// This is the function for adding the sidebar
function ul_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Home Sidebar', 'ul' ),
		'id' => 'home',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer', 'ul' ),
		'id' => 'footer',
		'before_widget' => '<div class="widget">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

  register_sidebar( array(
    'name' => __( 'News & Announcements', 'ul' ),
    'id' => 'blog',
    'before_widget' => '<div class="widget">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}

function add_my_script() {
  wp_enqueue_script('scrollto',get_stylesheet_directory_uri().'/js/scrollto.js', array('jquery') );
  wp_enqueue_script('localscroll',get_stylesheet_directory_uri().'/js/localscroll.js', array('jquery', 'scrollto') );
  wp_enqueue_script('flexslider', get_stylesheet_directory_uri().'/js/flexslider.js', array('jquery') );
	wp_enqueue_script('script',	get_stylesheet_directory_uri().'/js/script.js', array('jquery')	);
	}    

	add_action('wp_enqueue_scripts', 'add_my_script'); // The action that will add your script

// Custom excerpt length
function custom_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Custom excerpt more
function new_excerpt_more( $more ) {
	return ' [...]';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Creating custom post types
add_action('init', 'events_init');
  function events_init() {
    $labels = array(
      'name' => 'Event',
      'singular_name' => 'Event',
      'menu_name' => 'Events',
      'add_new' => 'Add New',
      'add_new_item' => __('Add New Event'),
      'edit_item' => __('Edit Event'),
      'new_item' => __('New Event'),
      'view_item' => __('View Event'),
      'search_items' => __('Search Events'),
      'not_found' =>  __('No Events found'),
      'not_found_in_trash' => __('No Events found in Trash'),
    );

    $args = array(
      'label' => 'Event',
      'labels' => $labels,
      'description' => 'An Event',
      'public' => true, //most admin display flows from this by default
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'menu_position' => 20,
      'hierarchical' => true,
      'taxonomies' => array(''),
      'supports' =>  array('title','editor','author','thumbnail','excerpt','custom-fields','revisions'),
      'has_archive' => false,
    );

    register_post_type('Event', $args);
}

add_action('init', 'facilities_init');
  function facilities_init() {
    $labels = array(
      'name' => 'facility',
      'singular_name' => 'Facility',
      'menu_name' => 'Facilities',
      'add_new' => 'Add New',
      'add_new_item' => __('Add New Facility'),
      'edit_item' => __('Edit Facility'),
      'new_item' => __('New Facility'),
      'view_item' => __('View Facility'),
      'search_items' => __('Search Facilities'),
      'not_found' =>  __('No Facilities found'),
      'not_found_in_trash' => __('No Facilities found in Trash'),
    );

    $args = array(
      'label' => 'Facility',
      'labels' => $labels,
      'description' => 'A Facility',
      'public' => true, //most admin display flows from this by default
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'menu_position' => 20,
      'hierarchical' => true,
      'taxonomies' => array(''),
      'supports' =>  array('title','editor','author','thumbnail','excerpt','custom-fields','revisions'),
      'has_archive' => false,
    );

    register_post_type('facility', $args);
}
add_action('init', 'donate_page_init');
  function donate_page_init() {
    $labels = array(
      'name' => 'Donation Page',
      'singular_name' => 'Donate Page',
      'menu_name' => 'Donate Pages',
      'add_new' => 'Add New',
      'add_new_item' => __('Add New Donate Page'),
      'edit_item' => __('Edit Donate Page'),
      'new_item' => __('New Donate Page'),
      'view_item' => __('View Donate Page'),
      'search_items' => __('Search Donate Pages'),
      'not_found' =>  __('No Donate Pages found'),
      'not_found_in_trash' => __('No Donate Pages found in Trash'),
    );

    $args = array(
      'label' => 'Donate Page',
      'labels' => $labels,
      'description' => 'A Donate Page',
      'public' => true, //most admin display flows from this by default
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'menu_position' => 21,
      'hierarchical' => true,
      'taxonomies' => array('category'),
      'supports' =>  array('title','editor','author','thumbnail','custom-fields','revisions','taxonomies'),
      'has_archive' => false,
    );

    register_post_type('donate_page', $args);
}

// Get the current time and return each component
function ck_current_time() {
  $time = current_time('timestamp');
  $date = date('d', $time);
  $month = date('F', $time);
  $year = date('y', $time);
  return array($date, $month, $year);
} 

// Fancy event date 
function event_date() {
  ?>
    <div class="event-date">
       <?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
           $month = $date->format('F');
           $day = $date->format('d');
       ?>
       <span class="month"><?php echo $month ; ?></span>
       <span class="day"><?php echo $day ; ?></span>
    </div> <!-- .event-date -->
<?php 

}

require get_template_directory().'/wepay/init.php';
?>