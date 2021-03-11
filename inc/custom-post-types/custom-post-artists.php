<?php

function ig_saulkrasti_jazz_artists() {
	$labels = array(
		'name'               => _x( 'Artists', 'saulkrasti-jazz-festival' ),
		'singular_name'      => _x( 'Artist', 'post type singular name', 'saulkrasti-jazz-festival' ),
		'menu_name'          => _x( 'Artists', 'admin menu', 'saulkrasti-jazz-festival' ),
		'name_admin_bar'     => _x( 'Artists', 'add new on admin bar', 'saulkrasti-jazz-festival' ),
		'add_new'            => _x( 'Add New', 'book', 'saulkrasti-jazz-festival' ),
		'add_new_item'       => __( 'Add New Artist', 'saulkrasti-jazz-festival' ),
		'new_item'           => __( 'New Artists', 'saulkrasti-jazz-festival' ),
		'edit_item'          => __( 'Edit Artists', 'saulkrasti-jazz-festival' ),
		'view_item'          => __( 'View Artists', 'saulkrasti-jazz-festival' ),
		'all_items'          => __( 'All Artists', 'saulkrasti-jazz-festival' ),
		'search_items'       => __( 'Search Artists', 'saulkrasti-jazz-festival' ),
		'parent_item_colon'  => __( 'Parent Artists:', 'saulkrasti-jazz-festival' ),
		'not_found'          => __( 'No Artists found.', 'saulkrasti-jazz-festival' ),
		'not_found_in_trash' => __( 'No Artists found in Trash.', 'saulkrasti-jazz-festival' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Upcoming and past concerts list, displayed in Home and Artists pages', 'saulkrasti-jazz-festival' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-groups',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'artists' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category', 'post_tag' ),
	);

	register_post_type( 'artists', $args );
}

add_action( 'init', 'ig_saulkrasti_jazz_artists' );