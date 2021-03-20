<?php

/*
* Template Name: Festival History
*/
get_header();
$festival_from_foundation_till_now_years = ig_gav_get_dates_festival_foundation_till_now();
?>


<!-- <div class="history__available-years-list--separator">|</div> -->
<section class="current-year-artists__history full-screen-cover" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_page_artists_cover_image', 'options')
                                                                                                                                                            ?>)">
    <h2 class="section-header mt-5rem"><?php echo esc_html__(get_field('history_page_header'), 'saulkrasti-jazz-festival') . ' ' . '<span class="extra-year-info-js">' . $festival_from_foundation_till_now_years[0]  . '—'  . $festival_from_foundation_till_now_years[1] . '</span>'  ?></h2>

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
                        $year_im_milisecs = strtotime($year);
                       
                ?>


                        <li><a id="festival-<?php echo $year ?>" href="" class="festival-year-toggler-js-ajax" data-festival-year="<?php echo $year ?>"> <?php esc_html_e($year, 'saulkrasti-jazz-festival') ?></a></li>




                <?php
                    endwhile;


                endif;

                ?>
            </ul>
        </div>

    </div>











    <div class="row history-wrapper">



        <?php

        $args = array('field' => 'history_all_time_stats','in_ajax' => false);
        get_template_part('template-parts/page-history/section', 'sidelinks', $args); ?>




        <?php


$query_args = array(

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

        get_template_part('template-parts/page-history/section', 'artists', $query_args); ?>




    </div><!-- .history-wrapper -->

</section>



<?php get_footer(); ?>