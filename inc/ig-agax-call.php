<?php

add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax()
{

    $venueID = $_POST['venueID'];
    $datechoice = $_POST['datechoice'];
    $dateFromAjax = $_POST['dateFromAjax'];
    $date = date('Ymd', $datechoice);

    $today = date('Ymd');

   

    $args = array(

        'post_type' => 'events',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'post_events_venue',
                'value' => NULL,
                'compare' => 'LIKE'
            )
        ),
        'meta_key' => 'post_events_concert_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    );
    if ($venueID !== 'non-venue-choice') :
        $args['meta_query']['value'] = $venueID;
        
    endif;

    if (isset($dateFromAjax)) :
        $args['meta_query']['key'] = 'post_events_concert_date';
        $args['meta_query']['value'] = $date;


    endif;

    $ajax_adjusted_events = new WP_Query($args);

    while ($ajax_adjusted_events->have_posts()) : $ajax_adjusted_events->the_post();
        $day_of_the_week = date("w", get_field('post_events_concert_date'));
        $concert_date = ig_saulkrasti_jazz_split_date_to_arr('post_events_concert_date'); // name of the month also awailable but needs to be adjusted
        $venue_name = get_field('post_venues_venue_name', get_field('post_events_venue'));
        $is_free_concert = ig_saulkrasti_jazz_get_radio_value('post_events_is_it_a_free_concert');
?>


        <div class="col-lg-4 upcoming-events__wrapp-for-single upcoming-events-js-ajax-container">

            <div class="ig-card">

                <div class="ig-card__img">

                    <?php if (get_field('post_events_concert_image')) : ?>
                        <img src="<?php ig_saulkrasti_jazz_image_from_field_custom_size('post_events_concert_image', 'ig-square') ?>" alt="" class="img-fluid">

                    <?php else : ?>
                        <img src="<?php ig_saulkrasti_jazz_image_from_field_custom_size('options_backup_events_image', 'ig-square', 'options') ?>" alt="" class="img-fluid">

                    <?php endif; ?>
                </div>
                <div class="ig-card__content">

                    <div class="ig-card__date-venue-container">
                        <div class="ig-card__date-time-container">
                            <h6 class="ig-card__date"><?php echo $concert_date[0], '.', ' ', $concert_date[1] ?></h6>
                            <h6 class="ig-card__time"><?php esc_html_e(get_field('post_events_concert_time'), 'saulkrasti-jazz-festival') ?></h6>
                        </div>
                        <h6 class="ig-card__venue-name"><?php esc_html_e($venue_name, 'saulkrasti-jazz-festival') ?></h6>
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
                        <a href="<?php the_permalink() ?>" class="btnc btnc-underlined mb-2"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a>

                        <?php if ($is_free_concert === 'true') : ?>
                            <button class="btnc btnc-brand btnc-sm btnc-free-concert" disabled> <?php echo ig_gav_get_global_text('btn_text_free_entry') ?></button>


                        <?php elseif ($is_free_concert === 'false' && !empty(get_field('post_events_link_to_ticket_sale'))) : ?>
                            <button class="btnc btnc-dark btnc-sm"><a href="<?php echo esc_url(get_field('post_events_link_to_ticket_sale')) ?>"><?php echo ig_gav_get_global_text('btn_text_get_ticket') ?></a> </button>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

        </div>

<?php endwhile;
    wp_reset_postdata();

    die();
}

?>