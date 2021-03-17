<?php get_header(); ?>

<div class="mt-5rem"></div>
<?php if (have_posts()) : while (have_posts()) : the_post();
require 'inc/queries/upcoming_events_query.php';

        $date_arr = ig_saulkrasti_jazz_split_date_to_arr('post_events_concert_date');
        $concert_time =  esc_html__(get_field('post_events_concert_time'), 'saulkrasti-jazz-festival');
        $venue_ID = get_field('post_events_venue');
        $venue_title = get_field('post_venues_venue_title', $venue_ID);
        $venue_name = get_field('post_venues_venue_name', $venue_ID);
        $venue_address_1 = get_field('post_venues_address_line_1', $venue_ID);
        $venue_address_2 = get_field('post_venues_address_line_2', $venue_ID);
        $venue_postcode = get_field('post_venues_postcode', $venue_ID);
        $artists_IDs = ig_gav_get_this_event_artists_IDs();

?>

        <section class=" full-screen-cover" style="background: linear-gradient(180deg, #070707 0%, rgba(53, 53, 53, 0) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_single_event_cover', 'options')
                                                                                                                                    ?>)">
            <h2 class="section-header mt-5rem"><?php esc_html_e(get_field('post_artists_artist_name'), 'saulkrasti-jazz-festival') ?></h2>

            <div class="single-artist__wrapper">

                <div class="row">
                    <div class="col-lg-8">

                        <div class="single-artist__content">


                            <?php include get_template_directory() . '/template-parts/single-events/get-header-image.php'; ?>
                            <?php include get_template_directory() . '/template-parts/single-events/get-concert-details.php'; ?>

                        </div>
                    </div>

                    <div class="main-sidebar col-lg-4">


                        <?php get_template_part('template-parts/main-sidebar/main', 'sidebar') ?>




                    </div>


                </div>


            </div>


        </section>


<?php endwhile;
endif; ?>


<?php get_footer(); ?>