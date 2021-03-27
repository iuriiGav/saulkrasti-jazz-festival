<?php get_header(); ?>

<div class="ig_mt-7rem"></div>
<?php if (have_posts()) : while (have_posts()) : the_post();
        require 'inc/queries/upcoming_events_query.php';

        $date_arr = ig_saulkrasti_jazz_split_date_to_arr('post_events_concert_date');
        $concert_time =  esc_html__(get_field('post_events_concert_time'), 'saulkrasti-jazz-festival');
        $venue_ID = get_field('post_events_venue');
        $venue_page_link = get_the_permalink($venue_ID);
        $venue_title = get_field('post_venues_venue_title', $venue_ID);
        $venue_name = get_field('post_venues_venue_name', $venue_ID);
        $venue_address_1 = get_field('post_venues_address_line_1', $venue_ID);
        $venue_address_2 = get_field('post_venues_address_line_2', $venue_ID);
        $venue_postcode = get_field('post_venues_postcode', $venue_ID);
        $artists_IDs = ig_gav_get_this_event_artists_IDs();
        $concert_date_in_milisecs = get_field('post_events_concert_date', false, false);
        $day = date('D', strtotime($concert_date_in_milisecs));
        $concert_day = ig_get_day_of_the_week_depending_on_language($day);

?>

        <section class=" full-screen-cover" style="background: linear-gradient(180deg, #070707 0%, rgba(53, 53, 53, 0) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_single_event_cover', 'options')
                                                                                                                                    ?>)">

            <div class="single-artist__wrapper ig_w-60 ig_w-60--r">


                <div class="single-artist__content">


                    <?php include get_template_directory() . '/template-parts/single-events/get-concert-details.php'; ?>
                    <?php include get_template_directory() . '/template-parts/single-events/get-header-image.php'; ?>

                </div>








        </section>


<?php endwhile;
endif; ?>


<?php get_footer(); ?>