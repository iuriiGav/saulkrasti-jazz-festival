<?php 

// custom taxonomy for venues
// has 'yes' and 'no' option
// if chosen yes the venue will show up in a drop down venue choice menu when creating a concert


//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'ig_hierarchical_taxonomy_for_artists', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function ig_hierarchical_taxonomy_for_artists() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Wall of Fame', 'taxonomy general name' ),
    'singular_name' => _x( 'Wall of Fame', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Wall of Fame' ),
    'all_items' => __( 'Wall of Fame' ),
    'parent_item' => __( 'Parent Wall of Fame' ),
    'parent_item_colon' => __( 'Parent Wall of Fame:' ),
    'edit_item' => __( 'Edit Wall of Fame' ), 
    'update_item' => __( 'Update Wall of Fame' ),
    'add_new_item' => __( 'Add New Wall of Fame' ),
    'new_item_name' => __( 'New Wall of Fame Name' ),
    'menu_name' => __( 'Wall of Fame' ),
  );    
 
// Now register the taxonomy for Venues
  register_taxonomy('wall_of_fame',array('artists'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'wall_of_fame' ),
    'capabilities'      => array(
        'assign_terms' => 'manage_options',
        'edit_terms'   => 'god',
        'manage_terms' => 'god',
    ),
  ));

 
}





// add_action( 'pre_insert_term', function ( $term, $taxonomy )
// {
//     return ( 'wall_of_fame' === $taxonomy )
//         ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
//         : $term;
// }, 0, 2 );


