<?php 
   require_once get_template_directory() . '/inc/queries/current_venues_query.php';
function ig_saulkrasti_jazz_upcoming_events_main_stage_query ($number) {

$all_venues = ig_saulkrasti_jazz_current_venues(-1);
$main_venue_ID = null;

if($all_venues->have_posts()) : while($all_venues->have_posts()): $all_venues->the_post(); 


if(get_field('post_venues_priority') === '1') :


$main_venue_ID = get_the_ID();

endif;
endwhile; wp_reset_postdata(); endif; 

  
    $today = date('Ymd');
    $textdate = date('Ymd', 1626825600);

 
    $args = array(
        
        'post_type' => 'events',
        'posts_per_page' => $number,
        'meta_query' => array(
            array(
                'key' => 'post_events_concert_date',
                'value' => $today,
                'type' => 'DATE',
                'compare' => '>='
            ),
            array(
                'key' => 'post_events_concert_date',
                'value' => $today,
                'type' => 'DATE',
                'compare' => '>='
            ),
            array(
                'key' => 'post_events_venue',
                'value' => $main_venue_ID,
                'compare' => 'LIKE'
            )
            ),
            'meta_key' => 'post_events_concert_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
        );

        
        
        return new WP_Query($args); 
        
        
    }
