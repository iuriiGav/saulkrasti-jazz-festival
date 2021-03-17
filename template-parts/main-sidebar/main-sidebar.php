<div class="main-sidebar__content">


    <?php

    $concerts = ig_saulkrasti_jazz_upcoming_events_query(-1);

    $args = array('query_object' => $concerts, 'this_artist_concert' => true);
    get_template_part('template-parts/main-sidebar/section', 'this-artist-concert', $args); ?>




    <h4 class="main-sidebar__current-artist-concert-header t-light">
        <?php echo ig_gav_get_global_text('global_more_upcoming_concerts') ?>

    </h4>


    <?php if ($concerts->have_posts()) : while ($concerts->have_posts() && $i <= 4) : $concerts->the_post();
            $i++;

            $concert_venue_ID = get_field('post_events_venue')->ID;
            $date_arr = ig_saulkrasti_jazz_split_date_to_arr(esc_html__('post_events_concert_date', 'saulkrasti-jazz-festival'));

    ?>

            <a href="<?php the_permalink(); ?>" class="sidebar-small-card-link">
                <div class="card-small">
                    <div class="card-small__date-time">
                        <h6 class="card-small__date"><?php echo $date_arr[0] ?> </h6>
                        <h6> <?php echo $date_arr[1] ?></h6>
                        <h6 class="card-small__time"><?php esc_html_e(get_field('post_events_concert_time'), 'saulkrasti-jazz-festival') ?></h6>
                    </div>
                    <div class="card-small__name-country">
                        <?php
                        if (have_rows('post_events_artists_time_slot_repeater')) :

                            while (have_rows('post_events_artists_time_slot_repeater')) : the_row(); ?>

                                <div class="ig-card__multyartist-event">

                                    <h6 class="card-small__name"> <?php echo get_field('post_artists_artist_name',  get_sub_field('artist')) ?> </h6>
                                </div>

                            <?php

                            endwhile;

                        else : ?>

                            <?php if (get_field('post_events_concert_title')) : ?>
                                <h6 class="card-small__name"> <?php esc_html_e(get_field('post_events_concert_title'), 'saulkrasti-jazz-festival') ?> </h6>
                            <?php else : ?>

                                <?php
                                $artist_object = get_field('post_events_artists');
                                ?>
                                <h6 class="card-small__name"> <?php esc_html_e(get_field('post_artists_artist_name', $artist_object[0]), 'saulkrasti-jazz-festival') ?> </h6>

                            <?php endif; ?>

                        <?php
                        endif;
                        ?>

                    </div>

                </div>
            </a>

            <!-- //   require  get_template_directory() . '/template-parts/main-sidebar/subparts/partial-sidebar-card.php'; -->



    <?php endwhile;
        wp_reset_postdata();
    endif; ?>
</div>