<?php
function ig_saulkrasti_jazz_venues() {
	$labels = array(
		'name'               => _x( 'Venues', 'satiksanos-saulkrastos' ),
		'singular_name'      => _x( 'Venue', 'post type singular name', 'satiksanos-saulkrastos' ),
		'menu_name'          => _x( 'Venues', 'admin menu', 'satiksanos-saulkrastos' ),
		'name_admin_bar'     => _x( 'Venues', 'add new on admin bar', 'satiksanos-saulkrastos' ),
		'add_new'            => _x( 'Add New', 'book', 'satiksanos-saulkrastos' ),
		'add_new_item'       => __( 'Add New Venue', 'satiksanos-saulkrastos' ),
		'new_item'           => __( 'New Venues', 'satiksanos-saulkrastos' ),
		'edit_item'          => __( 'Edit Venues', 'satiksanos-saulkrastos' ),
		'view_item'          => __( 'View Venues', 'satiksanos-saulkrastos' ),
		'all_items'          => __( 'All Venues', 'satiksanos-saulkrastos' ),
		'search_items'       => __( 'Search Venues', 'satiksanos-saulkrastos' ),
		'parent_item_colon'  => __( 'Parent Venues:', 'satiksanos-saulkrastos' ),
		'not_found'          => __( 'No Venues found.', 'satiksanos-saulkrastos' ),
		'not_found_in_trash' => __( 'No Venues found in Trash.', 'satiksanos-saulkrastos' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Upcoming and past venues list, displayed in Home and Venues pages', 'satiksanos-saulkrastos' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'edit.php?post_type=events',
        'menu_icon'          => 'dashicons-megaphone',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'venues' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title','thumbnail' ),
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'venues', $args );
}

add_action( 'init', 'ig_saulkrasti_jazz_venues' );