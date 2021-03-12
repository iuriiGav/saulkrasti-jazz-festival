<?php 

function ig_saulkrasti_jazz_current_venues($num) {
    $args = array(
        'post_type'      => 'venues',
        'posts_per_page' => $num,
        'meta_key'       => 'post_venues_priority',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'tax_query'      => array(
    
            array(
                'taxonomy' => 'is_active',
                'field' => 'Yes',
                'terms' => 15
            )
    
        )
    );
    
    return new WP_Query($args); 
}

?>