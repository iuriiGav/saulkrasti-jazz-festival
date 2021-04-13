<?php

/*
* Template Name: Festival History
*/
get_header();
$festival_from_foundation_till_now_years = ig_gav_get_dates_festival_foundation_till_now();
?>

<div class="target-div-for-modal-and-spinner-js"></div>

<!-- Changing page history: section-artists.php and section-sidelinks.php; if
want to return back to sidelinks, coppy and paste pages from draft folder

copy paste teachers.scss from previous commit
ig-ajax-history.php from prev commit
-->
<div class="modal modal__invisible modal-trigger-js__fresh"></div>

<!-- <div class="history__available-years-list--separator">|</div> -->
<section class="current-year-artists__history full-screen-cover" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_page_artists_cover_image', 'options')
                                                                                                                                                            ?>)">
    <h2 class="section-header section-header--less-pb mt-5rem ig_pb-0"><?php echo esc_html__(get_field('history_page_header'), 'saulkrasti-jazz-festival') ?></h2>
    <h3 class="section-header section-header--less-padding ig_pt-0"><?php echo '<span class="extra-year-info-js">' . $festival_from_foundation_till_now_years[0]  . '—'  . $festival_from_foundation_till_now_years[1] . '</span>'  ?></h3>

    <div class="history__available-years-list-wrapper">
        <div class="history__available-years-list-and-toggle-group">

            <!-- sort-by-toggler__active -->

         
            <ul class="history__available-years-list">
                <?php

                if (have_rows('history_concrete_years_statistic')) :

                    while (have_rows('history_concrete_years_statistic')) : the_row();

                        $year = get_sub_field('year');
                        $year_im_milisecs = strtotime($year);
                        
                ?>

<?php if($year !== 2002 && $year !== 2020) : ?>

                        <li><a id="festival-<?php echo $year ?>" href="" class="festival-year-toggler-js-ajax" data-festival-year="<?php echo $year ?>"> <?php esc_html_e($year, 'saulkrasti-jazz-festival') ?></a></li>


<?php endif; ?>


                <?php
                    endwhile;


                endif;

                ?>
            </ul>
        </div>

    </div>








<div class="history-by-year-js-ajax-container">
    
</div>


    <div class="row history-wrapper">



      




        <?php


$query_args = array(

    'post_type' => 'artists',
    'posts_per_page' => 30,
    'tax_query' => array(
        array(
            'taxonomy' => 'wall_of_fame',
            'field' => 'Yes',
            'terms' => 23,
          
        )
    ),
    'orderby' => 'publish_date',
    'order' => 'ASC',



);

        get_template_part('template-parts/page-history/section', 'artists', $query_args); ?>

<?php

$args = array('field' => 'history_all_time_stats','in_ajax' => false);
get_template_part('template-parts/page-history/section', 'sidelinks', $args); ?>


    </div><!-- .history-wrapper -->

</section>



<?php get_footer(); ?>