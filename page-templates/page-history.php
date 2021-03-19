<?php

/*
* Template Name: Festival History
*/
get_header();
$festival_start_year = '1997';
$current_year = date("Y");
$headliners_header = esc_html__(get_field('history_headliners_header'), 'saulkrasti-jazz-festival')
?>


<!-- <div class="history__available-years-list--separator">|</div> -->
<section class="current-year-artists__history full-screen-cover" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_page_artists_cover_image', 'options')
                                                                                                                                                            ?>)">
    <h2 class="section-header mt-5rem"><?php esc_html_e(get_field('history_page_header'), 'saulkrasti-jazz-festival') ?></h2>

    <div class="history__available-years-list-wrapper">
        <div class="history__available-years-list-and-toggle-group">

            <!-- sort-by-toggler__active -->

            <a id="ig-sort-by-year" href="" class="sort-by-toggler history__sort-by-year-toggler">
                <?php echo ig_gav_get_global_text('btn_sort_by_year') ?>
            </a>
            <ul class="history__available-years-list">
                <?php

                if (have_rows('history_concrete_years_statistic')) :

                    while (have_rows('history_concrete_years_statistic')) : the_row();

                        $year = get_sub_field('year');
                ?>


                        <li><a id="festival-<?php echo $year ?>" href="" class="festival-year-toggler-ajax" data-festival-year="festival-<?php echo $year ?>"> <?php esc_html_e($year, 'saulkrasti-jazz-festival') ?></a></li>




                <?php
                    endwhile;


                endif;

                ?>
            </ul>
        </div>

    </div>











    <div class="row history-wrapper">


        <div class="col-md-3 order-2 order-sm-2 order-md-1 order-lg-1 order-xl-1">
            <div class="side-links__wrapper side-links__wrapper--full">
                <ul class="side-links__list side-links__list--full-height">

                    <h4 class="side-links__header"><?php echo $festival_start_year  . '—'  . $current_year  ?></h4>
                    <?php

                    if (have_rows('history_all_time_stats')) :

                        while (have_rows('history_all_time_stats')) : the_row();
                            $stats_name = get_sub_field('stats_name');
                            $stats_number = get_sub_field('stats_number');
                    ?>




                            <li class="side-links__item side-links__item--center ">

                                <div class="side-links__item-group">
                                    <h4 class="side-links__item-group-inner-item"><?php esc_html_e($stats_name, 'saulkrasti-jazz-festival') ?></h4>
                                    <h2 class="side-links__item-group-inner-item--larger"><?php esc_html_e($stats_number, 'saulkrasti-jazz-festival') ?></h2>
                                </div>



                            </li>





                    <?php
                        endwhile;


                    endif;
                    ?>

                </ul>
            </div>
        </div>


        <?php

        $args = array(

            'post_type' => 'artists',
            'posts_per_page' => 30,
            'tax_query' => array(
                array(
                    'taxonomy' => 'wall_of_fame',
                    'field' => 'Yes',
                    'terms' => 23
                )
            ),



        );

        $current_festival_artists = new WP_Query($args); ?>


        <div class="col-md-9 order-1 order-sm-1 order-md-2 order-lg-2 order-xl-2 history__artists-container">
            <div class="row history__artists-cols-wrap">
                <h4 class="sub-section-header"><?php echo $headliners_header . ' ' . $festival_start_year  . '—'  . $current_year ?></h4>

                <?php
                while ($current_festival_artists->have_posts()) : $current_festival_artists->the_post();
                    $artist_name = get_field('post_artists_artist_name');
                    $artist_country = get_field('post_artists_country');
                    $artist_photo = get_field('post_artists_artists_photo');
                ?>





                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-5">

                        <div class="card-artist card-artist--100">
                        <a href="<?php the_permalink() ?>">

                            <div class="card-artist__image">
                                <img src="<?php echo esc_url(wp_get_attachment_image_src($artist_photo, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

                            </div>
                                <div class="card-artist__text card-artist__text--flex ">
                                    <h4 class="text-center"><?php esc_html_e($artist_name, 'saulkrasti-jazz-festival') ?></h4>
                                    <h6 class="text-center t-gray"><?php esc_html_e($artist_country, 'saulkrasti-jazz-festival') ?></h6>



                                </div>
                            </div>
                        </a>
                    </div>

                <?php endwhile;
                wp_reset_postdata(); ?>
            </div><!-- .history__artists-wrapper row -->
        </div>

    </div><!-- .history-wrapper -->

</section>



<?php get_footer(); ?>