<?php 
function ig_saulkrasti_jazz_upcoming_events_query ($number) {

    $today = date('Ymd');
    

    
    $args = array(
        
        'post_type' => 'events',
        'posts_per_page' => $number,
        'meta_query' => array(
            array(
                'key' => 'post_events_concert_date',
                'value' => $today,
                'type' => 'DATE',
                'compare' => '>='
                )
            ),
            'meta_key' => 'post_events_concert_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
        );
        
        
        return new WP_Query($args); 
        
        
    }
