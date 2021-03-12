<?php 

// custom taxonomy for venues
// has 'yes' and 'no' option
// if chosen yes the venue will show up in a drop down venue choice menu when creating a concert


//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'ig_hierarchical_taxonomy_for_venues', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function ig_hierarchical_taxonomy_for_venues() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Is Active This Year?', 'taxonomy general name' ),
    'singular_name' => _x( 'Is Active this Year?', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Is Active this Year?' ),
    'all_items' => __( 'Is Active this Year?' ),
    'parent_item' => __( 'Parent Is Active this Year?' ),
    'parent_item_colon' => __( 'Parent Is Active this Year?:' ),
    'edit_item' => __( 'Edit Is Active this Year?' ), 
    'update_item' => __( 'Update Is Active this Year?' ),
    'add_new_item' => __( 'Add New Is Active this Year?' ),
    'new_item_name' => __( 'New Is Active this Year? Name' ),
    'menu_name' => __( 'Is Active this Year?' ),
  );    
 
// Now register the taxonomy for Venues
  register_taxonomy('is_active',array('venues', 'artists'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'is_active' ),
    'capabilities'      => array(
        'assign_terms' => 'manage_options',
        'edit_terms'   => 'god',
        'manage_terms' => 'god',
    ),
  ));

 
}


/**
 * Use radio inputs instead of checkboxes for term checklists in specified taxonomies.
 *
 * @param   array   $args
 * @return  array
 */
function wpse_139269_term_radio_checklist( $args ) {
    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'is_active' /* <== Change to your required taxonomy */ ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
            if ( ! class_exists( 'WPSE_139269_Walker_Category_Radio_Checklist' ) ) {
                /**
                 * Custom walker for switching checkbox inputs to radio.
                 *
                 * @see Walker_Category_Checklist
                 */
                class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, ...$args ) {
                        $output = parent::walk( $elements, $max_depth, ...$args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );

                        return $output;
                    }
                }
            }

            $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
        }
    }

    return $args;
}

add_filter( 'wp_terms_checklist_args', 'wpse_139269_term_radio_checklist' );


add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'is_active' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );


add_action('admin_head', 'adminCSS');

function adminCSS(){
    ?><style type='text/css'>
    /* make sure tabs and the popular div itself are not shown */
    #is_active-tabs {
        display: none !important;
    }
   
    </style><?php
}