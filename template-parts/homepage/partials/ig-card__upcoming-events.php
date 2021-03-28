<?php
$day_of_the_week = date("w", get_field('post_events_concert_date'));
$concert_date = ig_saulkrasti_jazz_split_date_to_arr('post_events_concert_date'); // name of the month also awailable but needs to be adjusted
$venue_ID = get_field('post_events_venue');
$venue_name = get_field('post_venues_venue_title', $venue_ID) ? get_field('post_venues_venue_title', $venue_ID) :  get_field('post_venues_venue_name', $venue_ID);
$is_free_concert = ig_saulkrasti_jazz_get_radio_value('post_events_is_it_a_free_concert');
$concert_date_in_milisecs = get_field('post_events_concert_date', false, false);
$day = date('D', strtotime($concert_date_in_milisecs));
$concert_day_language_dependent = ig_get_day_of_the_week_depending_on_language($day); 
$in_show_all_ajax = $args['show_all'];
$current_event_ID = get_the_ID();

?>


<div class="ig-card <?php echo $in_show_all_ajax ?  'ig-card__80' : 'ig-card__100'; ?> ">

    <div class="ig-card__img  ">

        <?php if (get_field('post_events_concert_image')) : ?>
            <img src="<?php ig_saulkrasti_jazz_image_from_field_custom_size('post_events_concert_image', 'ig-square') ?>" alt="" class="img-fluid">

        <?php else :
            $random_image_ID = ig_gav_random_image_ID();
        ?>


            <img src="<?php echo esc_url(wp_get_attachment_image_src($random_image_ID, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($random_image_ID, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">


        <?php endif; ?>
    </div>
    <div class="ig-card__content">

        <div class="ig-card__date-venue-container">
            <div class="ig-card__date-time-container">
                <div class="ig-card__date-and-day-container">
                    <div class="d-flex">
                        <h6 class="ig-card__date"><?php echo $concert_date[0], '.', ' ', $concert_date[1] ?></h6>
                        <h6 class="ig-card__time"><?php esc_html_e(get_field('post_events_concert_time'), 'saulkrasti-jazz-festival') ?></h6>
                    </div>
                    <h6 class="ig-card__day"><?php echo $concert_day_language_dependent ?></h6>
                </div>
            </div>
            <a target="_blank" href="<?php the_permalink($venue_ID)?>">
            <h6 class="ig-card__venue-name"><?php esc_html_e($venue_name, 'saulkrasti-jazz-festival') ?></h6>
            </a>
        </div>
        <div class="ig-card__artists">

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

        </div>


        <div class="ig-card__buttons">
            <a href="<?php the_permalink() ?>" data-event-id="<?php echo $current_event_ID; ?>" class="btnc btnc-underlined mb-2"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a>

            <?php if ($is_free_concert === 'true') : ?>
                <button class="btnc btnc-brand btnc-sm btnc-free-concert" disabled> <?php echo ig_gav_get_global_text('btn_text_free_entry') ?></button>


            <?php elseif ($is_free_concert === 'false' && !empty(get_field('post_events_link_to_ticket_sale'))) : ?>
                <button class="btnc btnc-dark btnc-sm"><a href="<?php echo esc_url(get_field('post_events_link_to_ticket_sale')) ?>"><?php echo ig_gav_get_global_text('btn_text_get_ticket') ?></a> </button>
            <?php endif; ?>
        </div>

    </div>
</div>