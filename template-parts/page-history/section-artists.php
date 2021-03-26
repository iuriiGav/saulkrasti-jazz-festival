 
 <?php 
$festival_from_foundation_till_now_years = ig_gav_get_dates_festival_foundation_till_now();
$headliners_header = esc_html__(get_field('history_headliners_header'), 'saulkrasti-jazz-festival');


 if(!$args['in_ajax'] === true) : 

$current_festival_artists = new WP_Query($args); 


else: 
$current_festival_artists = new WP_Query($args['query_args']); 
    
endif;
 ?>



<div class="col-12 history__artists-container">

            <div class="row history__artists-cols-wrap">

            <?php if(!$args['in_ajax'] === true) : ?>
                <h4 class="sub-section-header"><?php echo $headliners_header ?></h4>

                <?php

            endif;
                while ($current_festival_artists->have_posts()) : $current_festival_artists->the_post();
                    $artist_name = get_field('post_artists_artist_name');
                    $artist_country = get_field('post_artists_country');
                    $artist_photo = get_field('post_artists_artists_photo');
                    $artist_card_link = null;
                    $is_blank_page = null;

                    if(get_field('post_artists_artists_page_type') === 'full_bio' ) :

                        $artist_card_link = get_permalink();
                        elseif(get_field('post_artists_artists_page_type') === 'link_to_artist') :

                            $possible_artists_links = array();

                            if( have_rows('post_artists_link_to_ofiicial_website') ):

                                while( have_rows('post_artists_link_to_ofiicial_website') ) : the_row(); 
                            
                                    $field_name = get_sub_field('url');
                                    if($field_name) :
                                        array_push($possible_artists_links, $field_name);
                                    endif;
                              
                                endwhile;
                            
                            
                            endif;
                
                        $artist_card_link = $possible_artists_links[0];
                            $is_blank_page = true;
                        elseif(get_field('post_artists_artists_page_type') === 'no_page'): 
                            $artist_card_link = null;
                            else : 
                                $artist_card_link = get_permalink();
                        endif;

                ?>





                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-5 d-flex">

                        <div class="card-artist card-artist--100">


                        <a <?php echo $is_blank_page ? 'target="_blank"' : null ?>  href="<?php echo $artist_card_link ?>" style="<?php echo $artist_card_link === null ? ' pointer-events: none;  cursor: default;' : null ?>">

                            <div class="card-artist__image">
                                <img src="<?php echo esc_url(wp_get_attachment_image_src($artist_photo, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

                            </div>
                                <div class="card-artist__text card-artist__text--flex ">
                                    <h4 class="text-center"><?php esc_html_e($artist_name, 'saulkrasti-jazz-festival') ?></h4>
                                    <h6 class="text-center t-gray"><?php esc_html_e($artist_country, 'saulkrasti-jazz-festival') ?></h6>



                                </div>
                            </div>
                        </a>
                    </div>

                <?php endwhile;
                wp_reset_postdata(); ?>
            </div><!-- .history__artists-wrapper row -->
        </div>