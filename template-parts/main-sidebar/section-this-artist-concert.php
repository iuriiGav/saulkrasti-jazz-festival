
<?php 
$this_artist_ID = get_the_ID();
$this_artist_name = esc_html__(get_field('post_artists_artist_name'));

if ($args['query_object']->have_posts()) : while ($args['query_object']->have_posts()) : $args['query_object']->the_post();
$artists = get_field('post_events_artists');





        if ( is_array($artists) && in_array($this_artist_ID, $artists)) : 
            $concert_venue_ID = get_field('post_events_venue')->ID;
           $date_arr = ig_saulkrasti_jazz_split_date_to_arr(esc_html__('post_events_concert_date', 'saulkrasti-jazz-festival'));
          
 
        ?>

<h4 class="main-sidebar__current-artist-concert-header t-light">
<?php echo $this_artist_name . ' ' . ig_gav_get_global_text('global_listen_to_artist_on') ?>

</h4>







        <?php
         
require 'subparts/partial-sidebar-card.php';








        endif;
        ?>







<?php endwhile;
                            wp_reset_postdata();
                        endif; ?>