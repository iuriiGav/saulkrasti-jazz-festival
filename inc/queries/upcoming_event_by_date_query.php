<?php 
function ig_saulkrasti_jazz_upcoming_events_query_by_date ($date) {

   

 
    $args = array(
        
        'post_type' => 'events',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'post_events_concert_date',
                'value' => $date,
                'compare' => 'LIKE'
                )
            ),
            'meta_key' => 'post_events_concert_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
        );

        
        
        return new WP_Query($args); 
        
        
    }
