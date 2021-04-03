<div class="single-artist__bio">
    <div class="single-artist__event-date-time-venue">

        <div class="single-artist__event-date">

            <h4><?php echo $date_arr[0], ' ', $date_arr[1], ',', ' ', $concert_time ?></h4>
            <h3 class="ig_tc-rare"> <?php echo $concert_day ?> </h3>
        </div>

        <div class="single-artist__event-venue">


            <?php if ($venue_title) : ?>
                <a target="_blank" href="<?php echo $venue_page_link?>">
                <h4><?php esc_html_e($venue_title, 'saulkrasti-jazz-festival') ?></h4>
                </a>
            <?php else : ?>
                <a target="_blank" href="<?php echo $venue_page_link?>">

                <h4><?php esc_html_e($venue_name, 'saulkrasti-jazz-festival') ?></h4>
                </a>
            <?php endif; ?>

            <div class="single-artist__event-venue--address-lines">
                <?php if ($venue_title && $venue_title !== $venue_name) : ?>
                    <p><?php esc_html_e($venue_name, 'saulkrasti-jazz-festival') ?></p>
                <?php endif; ?>
                <p><?php echo $venue_address_1 ?></p>
                <p><?php echo $venue_address_2 ?></p>
                <p><?php echo $venue_postcode ?></p>
            </div>
        </div>
    </div>

    
    <?php if (have_rows('post_events_artists_time_slot_repeater')) :  ?>

        <div class="single-artist__artist-or-lineup">







            <?php

            if (have_rows('post_events_artists_time_slot_repeater')) :

                while (have_rows('post_events_artists_time_slot_repeater')) : the_row();

                    $artistID_from_repeater = get_sub_field('artist');
                    $time_from_repeater = get_sub_field('time');

            ?>


                    <div class="single-artist__artist-or-lineup--single">
                        <div class="single-artist__artist-or-lineup--time-wrapper">

                            <h2 class="single-artist__artist-or-lineup--single-time"><?php esc_html_e($time_from_repeater, 'saulkrasti-jazz-festival') ?></h2>
                        </div>
                        <div class="single-artist__artist-or-lineup--artist-container">
                            <a href="<?php the_permalink($artistID_from_repeater); ?>">
                                <h2 class="single-artist__artist-or-lineup--single-artist"><?php esc_html_e(get_field('post_artists_artist_name', $artistID_from_repeater), 'saulkrasti-jazz-festival') ?></h2>
                            </a>

                            <h5><?php esc_html_e(get_field('post_artists_country', $artistID_from_repeater), 'saulkrasti-jazz-festival') ?></h5>
                        </div>
                    </div>

            <?php
                endwhile;


            endif; ?>

        </div>

        <?php
    else :


?>
        <div class="single-artist__artist-or-lineup">


        <div class="single-artist__artist-or-lineup--artist-container">
<?php
        if (!empty($artists_IDs)) :
            foreach ($artists_IDs as $ID) : ?>
       
                    <a href="<?php the_permalink($ID); ?>">
                        <h2 class="single-artist__artist-or-lineup--single-artist text-center"><?php esc_html_e(get_field('post_artists_artist_name', $ID), 'saulkrasti-jazz-festival') ?></h2>
                    </a>

        <?php
            endforeach;

elseif(get_field('post_events_concert_title')) :   ?>
    <a href="<?php the_permalink($ID); ?>">
    <h2 class="single-artist__artist-or-lineup--single-artist text-center"><?php esc_html_e(get_field('post_events_concert_title'), 'saulkrasti-jazz-festival') ?></h2>
</a>

<?php

        endif;

        ?>

</div> </div>




    <?php endif; ?>




    <div class="single-artist__get_event_ticket">
        <?php
        $is_free_concert = ig_saulkrasti_jazz_get_radio_value('post_events_is_it_a_free_concert');

        ?>
        <?php if (!empty(get_field('post_events_link_to_ticket_sale'))) : ?>
            <div class="btnc btnc-brand btnc-lg single-artist__get_event_ticket--single-btn"><a href="<?php echo esc_url(get_field('post_events_link_to_ticket_sale')) ?>"><?php echo ig_gav_get_global_text('btn_text_get_ticket') ?></a></div>


            <?php if(get_field('options_link_to_week_pass_ticket_sail', 'options')) : ?>
<div class="btnc btnc-dark btnc-lg single-artist__get_event_ticket--single-btn"><a href="<?php echo esc_url(get_field('options_link_to_week_pass_ticket_sail', 'options')) ?>"><?php echo ig_gav_get_global_text('btn_text_get_ticket_for_a_week') ?></a></div>
    
    
    <?php endif; 


        elseif ($is_free_concert === 'true') : ?>
            <button class="btnc btnc-brand btnc-xl btnc-free-concert" disabled> <?php echo ig_gav_get_global_text('btn_text_free_entry') ?></button>



        <?php endif; ?>

    
    
    </div>

</div>