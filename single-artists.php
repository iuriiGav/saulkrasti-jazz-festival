<?php get_header();
require 'inc/queries/upcoming_events_query.php';
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class=" full-screen-cover" style="background: linear-gradient(180deg, #070707 0%, rgba(53, 53, 53, 0) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_single_artist_cover', 'options')
                                                                                                                                    ?>)">
            <h2 class="section-header section-header--less-pb  mt-5rem"><?php esc_html_e(get_field('post_artists_artist_name'), 'saulkrasti-jazz-festival') ?></h2>

            <?php




            $concerts = ig_saulkrasti_jazz_upcoming_events_query(-1);
            $this_artist_ID = get_the_ID();
            $this_artist_name = esc_html__(get_field('post_artists_artist_name'));
            $event_of_the_current_shown_artist_date = null;
            $event_of_the_current_shown_artist_ID = null;
            $concert_date_in_milisecs = null;

            if ($concerts->have_posts()) : while ($concerts->have_posts()) : $concerts->the_post();
                    $artists = get_field('post_events_artists');





                    if (is_array($artists) && in_array($this_artist_ID, $artists)) :
                        $concert_venue_ID = get_field('post_events_venue')->ID;
                        $date_arr = ig_saulkrasti_jazz_split_date_to_arr(esc_html__('post_events_concert_date', 'saulkrasti-jazz-festival'));
                        $event_of_the_current_shown_artist_date = get_field('post_events_concert_date', false, false);
                        $event_of_the_current_shown_artist_ID = get_the_ID();
                        $concert_date_in_milisecs = get_field('post_events_concert_date', false, false);
                        $day = date('D', strtotime($concert_date_in_milisecs));
                        $concert_day = ig_get_day_of_the_week_depending_on_language($day);
            ?>







                        <div class="single-artist-concert-details-wrapper">




                            <div class="single-artist__current-concert-date-container">

                                <div>
                                    <h4><?php echo $date_arr[0], ' ', $date_arr[1], ', ', ' ', $date_arr[2], ' ', ' | ',  esc_html_e(get_field('post_events_concert_time'), 'saulkrasti-jazz-festival') ?></h4>
                                    <h3 ><?php echo $concert_day ?></h3>
                                    <?php if (get_field('post_venues_venue_title', $concert_venue_ID)) : ?>

                                        <h3 class="ig_align-self-center ig_tc-brand d-md-only">
                                            <?php esc_html_e(get_field('post_venues_venue_title', $concert_venue_ID), 'saulkrasti-jazz-festival') ?>
                                        </h3>
                                    <?php else : ?>
                                        <h3 class="ig_align-self-center ig_tc-brand d-md-only">
                                            <?php esc_html_e(get_field('post_venues_venue_name', $concert_venue_ID), 'saulkrasti-jazz-festival') ?>
                                        </h3>
                                    <?php endif; ?>
                                </div>
                                <?php if (get_field('post_venues_venue_title', $concert_venue_ID)) : ?>

                                    <h3 class="ig_align-self-center ig_tc-brand md-none">
                                        <?php esc_html_e(get_field('post_venues_venue_title', $concert_venue_ID), 'saulkrasti-jazz-festival') ?>
                                    </h3>
                                <?php else : ?>
                                    <h3 class="ig_align-self-center ig_tc-brand md-none">
                                        <?php esc_html_e(get_field('post_venues_venue_name', $concert_venue_ID), 'saulkrasti-jazz-festival') ?>
                                    </h3>
                                <?php endif; ?>
                                <div class="sidebar-card__venue">

                                    <div class="sidebar-card__read-more">
                                        <a href="<?php the_permalink() ?>" class="btnc btnc-underlined btnc-xl"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a>
                                    </div>

                                    <?php if (get_field('post_events_link_to_ticket_sale') && get_field('post_events_is_it_a_free_concert') !== 'true') : ?>
                                        <div class="sidebar-card__get-ticket">

                                            <a href="<?php echo esc_url(get_field('post_events_link_to_ticket_sale')) ?>" class="btnc btnc-lg btnc-dark"><?php echo ig_gav_get_global_text('btn_text_get_ticket') ?></a>
                                        </div>
                                </div>

                            <?php elseif (get_field('post_events_is_it_a_free_concert') === 'true') : ?>
                                <div class="sidebar-card__get-ticket">
                                <button class="btnc btnc-brand btnc-sm btnc-free-concert" disabled> <?php echo ig_gav_get_global_text('btn_text_free_entry') ?></button>

                                </div>
                            <?php endif ?>
                            </div>
                        </div>






                    <?php









                    endif;
                    ?>







            <?php endwhile;
                wp_reset_postdata();
            endif; ?>













            <div class="single-artist__wrapper single-artist__wrapper--60">


                <?php
                get_template_part('template-parts/single-artists/section', 'artistcontent');

                ?>




                <?php get_template_part('template-parts/main-sidebar/main', 'sidebar', array('concert_date_in_milisecs' => $concert_date_in_milisecs, 'event_of_the_current_shown_artist_ID' => $event_of_the_current_shown_artist_ID)) ?>








            </div>


        </section>


<?php endwhile;
endif; ?>

<?php get_footer(); ?>