<div class="main-sidebar__content">


    <?php
    require get_template_directory() . '/inc/queries/upcoming_event_by_date_query.php';
    $concerts = ig_saulkrasti_jazz_upcoming_events_query(-1);


    $this_artist_ID = get_the_ID();
    $this_artist_name = esc_html__(get_field('post_artists_artist_name'));
    $event_of_the_current_shown_artist_date = null;
    $event_of_the_current_shown_artist_ID = null;


    if ($concerts->have_posts()) : while ($concerts->have_posts()) : $concerts->the_post();
            $artists = get_field('post_events_artists');





            if (is_array($artists) && in_array($this_artist_ID, $artists)) :
                $concert_venue_ID = get_field('post_events_venue')->ID;
                $date_arr = ig_saulkrasti_jazz_split_date_to_arr(esc_html__('post_events_concert_date', 'saulkrasti-jazz-festival'));
                $event_of_the_current_shown_artist_date = get_field('post_events_concert_date', false, false);
                $event_of_the_current_shown_artist_ID = get_the_ID();
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




    <h4 class="main-sidebar__current-artist-concert-header t-light">
        <?php echo ig_gav_get_global_text('global_more_upcoming_concerts') ?>

    </h4>



    <?php

    //this piece of code changes the behaviour depending if we are in 
    //single-concert or single-artist
    $currently_shown_artists_concert_timestamp = null;
    if ($event_of_the_current_shown_artist_date) :
        $currently_shown_artists_concert_timestamp = strtotime($event_of_the_current_shown_artist_date);
    else :
        $current_event_date = get_field('post_events_concert_date', get_the_ID(), false);
        $currently_shown_artists_concert_timestamp = strtotime($current_event_date);

    endif;

    $date = date('Ymd', $currently_shown_artists_concert_timestamp);

    $more_concerts_on_this_day =  ig_saulkrasti_jazz_upcoming_events_query_by_date($date);



    $currently_displayed_concert_ID = get_the_ID();
    if ($more_concerts_on_this_day->have_posts()) : while ($more_concerts_on_this_day->have_posts()) : $more_concerts_on_this_day->the_post();

            $concert_venue_ID = get_field('post_events_venue')->ID;
            $date_arr = ig_saulkrasti_jazz_split_date_to_arr(esc_html__('post_events_concert_date', 'saulkrasti-jazz-festival'));

            $id_to_check = null;

            if ($event_of_the_current_shown_artist_date) :
                $id_to_check = $event_of_the_current_shown_artist_ID;
            else :
                $id_to_check = $currently_displayed_concert_ID;
            endif;
            //wrap this paart of if statement in conditional block to change 
            //what it is checking
            if (get_the_ID() !== $id_to_check) :




    ?>

                <div class="sidebar-card">


                    <?php if (get_field('post_events_concert_image')) : ?>
                        <div class="sidebar-card__image" style="background-image: url('<?php echo esc_url(wp_get_attachment_image_src(get_field('post_events_concert_image'), 'ig-square')[0]) ?>')">
                        </div>


                    <?php else : ?>
                        <div class="sidebar-card__image" style="background-image: url('<?php echo esc_url(wp_get_attachment_image_src(get_field('options_backup_events_image', 'options'), 'ig-square')[0]) ?>')">
                        </div>
                    <?php endif; ?>

                    <div class="sidebar-card__content">

                            <div class="sidebar-card__date-time">
                                <h5><?php echo $date_arr[0], ' ', $date_arr[1] ?></h5>
                                <h5><?php esc_html_e(get_field('post_events_concert_time'), 'saulkrasti-jazz-festival') ?></h5>
                            </div>
                            <div class="sidebar-card__venue ig_pb-1em">

                                <?php if (get_field('post_venues_venue_title', $concert_venue_ID)) : ?>

                                    <?php esc_html_e(get_field('post_venues_venue_title', $concert_venue_ID), 'saulkrasti-jazz-festival') ?>

                                <?php else : ?>

                                    <?php esc_html_e(get_field('post_venues_venue_name', $concert_venue_ID), 'saulkrasti-jazz-festival') ?>

                                <?php endif; ?>

                            </div>



                        <?php
                        // Check rows exists.
                        if (have_rows('post_events_artists_time_slot_repeater')) :

                            // Loop through rows.
                            while (have_rows('post_events_artists_time_slot_repeater')) : the_row(); ?>

                                <div class="ig-card__multyartist-event">

                                    <h5 class="ig-card__event-name medium-title"> <?php echo get_field('post_artists_artist_name',  get_sub_field('artist')) ?> </h5>
                                </div>

                            <?php
                                // Load sub field value.
                                $sub_value = get_sub_field('sub_field');
                            // Do something...

                            // End loop.
                            endwhile;

                        // No value.
                        else : ?>

                            <?php if (get_field('post_events_concert_title')) : ?>
                                <h5 class="ig-card__event-name medium-title"> <a href="<?php the_permalink(); ?>"><?php esc_html_e(get_field('post_events_concert_title'), 'saulkrasti-jazz-festival') ?></a> </h5>
                            <?php else : ?>

                                <?php
                                $artist_object = get_field('post_events_artists');
                                ?>
                                <h5 class="ig-card__event-name medium-title"> <a href="<?php the_permalink(); ?>"><?php esc_html_e(get_field('post_artists_artist_name', $artist_object[0]), 'saulkrasti-jazz-festival') ?></a> </h5>

                            <?php endif; ?>

                        <?php
                        endif;
                        ?>


                        <div class="sidebar-card__read-more">
                            <a href="<?php the_permalink() ?>" class="btnc btnc-underlined btnc-xs"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a>
                        </div>

                        <?php if (get_field('post_events_link_to_ticket_sale')) : ?>
                            <div class="sidebar-card__get-ticket">

                                <a href="<?php echo esc_url(get_field('post_events_link_to_ticket_sale')) ?>" class="btnc btnc-sm btnc-dark mb-2"><?php echo ig_gav_get_global_text('btn_text_get_ticket') ?></a>
                            </div>

                        <?php endif; ?>

                    </div>
                </div><!-- .sidebar-card -->




    <?php
            endif;

        endwhile;
        wp_reset_postdata();
    endif; ?>
</div>