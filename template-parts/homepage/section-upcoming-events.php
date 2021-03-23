<?php

include get_template_directory() . '/inc/queries/upcoming_events_query.php';
include get_template_directory() . '/inc/queries/current_venues_query.php';
include get_template_directory() . '/inc/queries/main_stage_concerts_query.php';


// $num_of_concerts_to_display = is_front_page() ? 6 : -1; // this worked when we allowed only  concerts to be displayed
$num_of_concerts_to_display = -1;
$all_upcoming_events = ig_saulkrasti_jazz_upcoming_events_query($num_of_concerts_to_display);
$all_upcoming_events_count = $all_upcoming_events->found_posts;
$main_stage_concerts = ig_saulkrasti_jazz_upcoming_events_main_stage_query(-1);
$main_stage_concerts_count = $main_stage_concerts->found_posts;
$more_concerts_to_show = $all_upcoming_events_count - $main_stage_concerts_count;
$venues = ig_saulkrasti_jazz_current_venues(-1);


?>

<?php

?>

<?php $festival_dates_array = ig_saulkrasti_jazz_get_dates_of_festival(ig_saulkrasti_jazz_festival_start_date(), ig_saulkrasti_jazz_festival_end_date(), 'd M y'); ?>

<div class="target-div-for-modal-and-spinner-js"></div>
<div class="concert-cards-wrapper">

    <div class="row">
        <div class="col-12">
            <?php if (is_front_page()) : ?>
                <h2 class="section-header"><?php esc_html_e(get_field('homepage_header_upcoming_events'), 'saulkrasti-jazz-festival') ?></h2>
            <?php else : ?>
                <h2 class="section-header mt-5rem"><?php esc_html_e(get_field('concerts_page_header'), 'saulkrasti-jazz-festival') ?></h2>

            <?php endif; ?>
            <div class="taxonomy-triggers-container">
            <?php if (is_front_page()) : ?>

                <a id="ig-sort-by-venue" href="" class="sort-by-toggler sort-by-toggler__active">
                    <?php echo ig_gav_get_global_text('btn_text_sort_by_venue') ?>
                </a>

                <?php else : ?>
                    <a id="ig-sort-by-venue" href="" class="sort-by-toggler">
                    <?php echo ig_gav_get_global_text('btn_text_sort_by_venue') ?>
                </a>
                <?php endif; ?>

                <a id="ig-sort-by-date" href="" class="sort-by-toggler">
                    <?php echo ig_gav_get_global_text('btn_text_sort_by_date') ?>
                </a>
                <a id="ig-sort-show-all" href="" class="sort-by-toggler ig_gav-invisible show-all-concerts-js-ajax">
                    <?php echo ig_gav_get_global_text('btn_text_sort_show_all') ?>
                </a>

            </div><!-- .taxonomy-triggers-container -->

            <div class="sort-by-venue sort-by-menu--on-screen">

                <div class="sort-by-options sort-by-options__venue">
                    <?php

                    while ($venues->have_posts()) : $venues->the_post();
                        $main_stage_in_position++;
                        $venue_name;
                        if (get_field('post_venues_venue_title')) :
                            $venue_name = esc_html__(get_field('post_venues_venue_title'), 'saulkrasti-jazz-festival');

                        else :
                            $venue_name =  esc_html__(get_field('post_venues_venue_name'), 'saulkrasti-jazz-festival');

                        endif;
                    ?>

                        <?php if (is_front_page()) : ?>
                            <h5 class="sort-by-options"> <a href="" class="sort-by-options__link sort-by-venue-js-ajax <?php echo $main_stage_in_position === 1 ?  'sort-by-options__link--active' : null; ?>" data-venue-id="<?php echo get_the_ID(); ?>"><?php echo  $venue_name ?></a></h5>
                        <?php else : ?>
                            <h5 class="sort-by-options"> <a href="" class="sort-by-options__link sort-by-venue-js-ajax" data-venue-id="<?php echo get_the_ID(); ?>"><?php echo  $venue_name ?></a></h5>


                    <?php
                        endif;
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="sort-by-date sort-by-menu--off-screen">


                <div class="sort-by-options sort-by-options__date">
                    <?php foreach ($festival_dates_array as $date) : ?>
                        <a href="" class="sort-by-options__link sort-by-date-js-ajax" data-concert-date="<?php echo strtotime($date) ?>"><?php echo $date; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <hr class="light-hr">


            <div class="row upcoming-events__wrapper ajax-js-change-events-target">


                <?php 
                
                $querried_concerts = is_front_page() ? $main_stage_concerts : $all_upcoming_events;
                
                while ($querried_concerts->have_posts()) : $querried_concerts->the_post();
                    $day_of_the_week = date("w", get_field('post_events_concert_date'));
                    $concert_date = ig_saulkrasti_jazz_split_date_to_arr('post_events_concert_date'); // name of the month also awailable but needs to be adjusted
                    $venue_name = get_field('post_venues_venue_name', get_field('post_events_venue'));
                    $is_free_concert = ig_saulkrasti_jazz_get_radio_value('post_events_is_it_a_free_concert');
                ?>


                    <div class="col-xl-3 col-lg-4  upcoming-events__wrapp-for-single upcoming-events-js-ajax-container">

                        <div class="ig-card ig-card__100">

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
                wp_reset_postdata(); ?>


            </div>


        </div><!-- .col-12 -->
    </div>

    <?php if (is_front_page()) : ?>
        <div class="plus-more-concerts-to-show-wrap js-hide-div-on-ajax">


            <?php if ($more_concerts_to_show > 0) :
                $page_concerts_url = ig_saulkrasti_jazz_get_page_url('page-templates/page-concerts');
            ?>
                <h4 class="more-concerts-text t-light">+ <?php echo $more_concerts_to_show, ' ', ig_gav_get_global_text('btn_text_more_concerts') ?> </h4>
                <button class="btnc btnc-smoke btnc-smoke--wide ml-3 btnc-l"><a href="<?php echo $page_concerts_url ?>"><?php echo ig_gav_get_global_text('btn_text_see_all') ?></a></button>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div><!-- .concert-cards-wrapper -->