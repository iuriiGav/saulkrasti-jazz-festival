<?php 
add_action('wp_ajax_nopriv_getSingleArtist', 'getSingleArtist_ajax');
add_action('wp_ajax_getSingleArtist', 'getSingleArtist_ajax');

function getSingleArtist_ajax(){ 
    $queriedArtistID = $_POST['queriedArtistID'];


    $args = array(
        'p'         => $queriedArtistID, 
        'post_type' => 'any'
        );

        
        
        $single_artist = new WP_Query($args); 
       
         if ($single_artist->have_posts()) : while ($single_artist->have_posts()) : $single_artist->the_post(); ?>
         <div class="single-artist__wrapper single-artist__wrapper--60 single-artist-dynamic-container">


         <?php
         get_template_part('template-parts/single-artists/section', 'artistcontent', array('in_ajax' => true, 'artist_ID' => $queriedArtistID));
     
         ?>
     
     
     
     
     
     
     
     
     
     
     
     
     </div>
     <?php
 endwhile;
 wp_reset_postdata();
endif;
die();
    }
