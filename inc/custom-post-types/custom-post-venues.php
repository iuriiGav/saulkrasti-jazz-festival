<?php
function ig_saulkrasti_jazz_venues() {
	$labels = array(
		'name'               => _x( 'Venues', 'saulkrasti-jazz-festival' ),
		'singular_name'      => _x( 'Venue', 'post type singular name', 'saulkrasti-jazz-festival' ),
		'menu_name'          => _x( 'Venues', 'admin menu', 'saulkrasti-jazz-festival' ),
		'name_admin_bar'     => _x( 'Venues', 'add new on admin bar', 'saulkrasti-jazz-festival' ),
		'add_new'            => _x( 'Add New', 'book', 'saulkrasti-jazz-festival' ),
		'add_new_item'       => __( 'Add New Venue', 'saulkrasti-jazz-festival' ),
		'new_item'           => __( 'New Venues', 'saulkrasti-jazz-festival' ),
		'edit_item'          => __( 'Edit Venues', 'saulkrasti-jazz-festival' ),
		'view_item'          => __( 'View Venues', 'saulkrasti-jazz-festival' ),
		'all_items'          => __( 'All Venues', 'saulkrasti-jazz-festival' ),
		'search_items'       => __( 'Search Venues', 'saulkrasti-jazz-festival' ),
		'parent_item_colon'  => __( 'Parent Venues:', 'saulkrasti-jazz-festival' ),
		'not_found'          => __( 'No Venues found.', 'saulkrasti-jazz-festival' ),
		'not_found_in_trash' => __( 'No Venues found in Trash.', 'saulkrasti-jazz-festival' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Upcoming and past venues list, displayed in Home and Venues pages', 'saulkrasti-jazz-festival' ),
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