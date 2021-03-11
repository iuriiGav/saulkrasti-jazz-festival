<?php 

function ig_saulkrasti_jazz_events() {
	$labels = array(
		'name'               => _x( 'Events', 'saulkrasti-jazz-festival' ),
		'singular_name'      => _x( 'Event', 'post type singular name', 'saulkrasti-jazz-festival' ),
		'menu_name'          => _x( 'Events', 'admin menu', 'saulkrasti-jazz-festival' ),
		'name_admin_bar'     => _x( 'Events', 'add new on admin bar', 'saulkrasti-jazz-festival' ),
		'add_new'            => _x( 'Add New', 'book', 'saulkrasti-jazz-festival' ),
		'add_new_item'       => __( 'Add New Event', 'saulkrasti-jazz-festival' ),
		'new_item'           => __( 'New Events', 'saulkrasti-jazz-festival' ),
		'edit_item'          => __( 'Edit Events', 'saulkrasti-jazz-festival' ),
		'view_item'          => __( 'View Events', 'saulkrasti-jazz-festival' ),
		'all_items'          => __( 'All Events', 'saulkrasti-jazz-festival' ),
		'search_items'       => __( 'Search Events', 'saulkrasti-jazz-festival' ),
		'parent_item_colon'  => __( 'Parent Events:', 'saulkrasti-jazz-festival' ),
		'not_found'          => __( 'No Events found.', 'saulkrasti-jazz-festival' ),
		'not_found_in_trash' => __( 'No Events found in Trash.', 'saulkrasti-jazz-festival' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Upcoming and past events list, displayed in Home and Events pages', 'saulkrasti-jazz-festival' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-megaphone',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'events' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'events', $args );
}

add_action( 'init', 'ig_saulkrasti_jazz_events' );