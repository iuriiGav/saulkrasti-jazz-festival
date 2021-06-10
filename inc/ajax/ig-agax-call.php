<?php

add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');

function filter_ajax()
{

    $venueID = $_POST['venueID'];
    $datechoice = $_POST['datechoice'];
    $dateFromAjax = $_POST['dateFromAjax'];
    $showAll = $_POST['showAll'];
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

    if ($ajax_adjusted_events->post_count === 0) :

        ig_gav_print_message_if_there_are_no_events_at_location();


    endif;

    while ($ajax_adjusted_events->have_posts()) : $ajax_adjusted_events->the_post();
        $day_of_the_week = date("w", get_field('post_events_concert_date'));
        $concert_date = ig_saulkrasti_jazz_split_date_to_arr('post_events_concert_date'); // name of the month also awailable but needs to be adjusted
        $venue_name = get_field('post_venues_venue_name', get_field('post_events_venue'));
        $is_free_concert = ig_saulkrasti_jazz_get_radio_value('post_events_is_it_a_free_concert');
        $concert_date_in_milisecs = get_field('post_events_concert_date', false, false);
        $day = date('D', strtotime($concert_date_in_milisecs));
        $concert_day_language_dependent = ig_get_day_of_the_week_depending_on_language($day);


        if (!$showAll) :

?>
            <div class="col-xl-3 col-lg-4  upcoming-events__wrapp-for-single upcoming-events-js-ajax-container">

                <?php get_template_part('template-parts/homepage/partials/ig-card__upcoming-events'); ?>


            </div>
        <?php elseif ($showAll) : ?>
            <div class="col-xl-4 col-lg-4  upcoming-events__wrapp-for-single upcoming-events-js-ajax-container">

                <?php get_template_part('template-parts/homepage/partials/ig-card__upcoming-events', false, array('show_all' => true)); ?>


            </div>
        <?php else : ?>

        <?php endif; ?>

<?php endwhile;
    wp_reset_postdata();

    die();
}

?>