<?php 

function ig_saulkrasti_jazz_gallery() {
	$labels = array(
		'name'               => _x( 'Galleries', 'saulkrasti-jazz-festival' ),
		'singular_name'      => _x( 'Gallery', 'post type singular name', 'saulkrasti-jazz-festival' ),
		'menu_name'          => _x( 'Galleries', 'admin menu', 'saulkrasti-jazz-festival' ),
		'name_admin_bar'     => _x( 'Galleries', 'add new on admin bar', 'saulkrasti-jazz-festival' ),
		'add_new'            => _x( 'Add New', 'book', 'saulkrasti-jazz-festival' ),
		'add_new_item'       => __( 'Add New Gallery', 'saulkrasti-jazz-festival' ),
		'new_item'           => __( 'New Galleries', 'saulkrasti-jazz-festival' ),
		'edit_item'          => __( 'Edit Galleries', 'saulkrasti-jazz-festival' ),
		'view_item'          => __( 'View Galleries', 'saulkrasti-jazz-festival' ),
		'all_items'          => __( 'All Galleries', 'saulkrasti-jazz-festival' ),
		'search_items'       => __( 'Search Galleries', 'saulkrasti-jazz-festival' ),
		'parent_item_colon'  => __( 'Parent Galleries:', 'saulkrasti-jazz-festival' ),
		'not_found'          => __( 'No Galleries found.', 'saulkrasti-jazz-festival' ),
		'not_found_in_trash' => __( 'No Galleries found in Trash.', 'saulkrasti-jazz-festival' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Post type that is containing galleries', 'saulkrasti-jazz-festival' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-format-gallery',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'gallery' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', ),
	);

	register_post_type( 'gallery', $args );
}

add_action( 'init', 'ig_saulkrasti_jazz_gallery' );