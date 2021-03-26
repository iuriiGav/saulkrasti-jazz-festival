<?php

include get_template_directory() . '/inc/queries/upcoming_events_query.php';
include get_template_directory() . '/inc/queries/current_venues_query.php';
include get_template_directory() . '/inc/queries/main_stage_concerts_query.php';


// $num_of_concerts_to_display = is_front_page() ? 6 : -1; // this worked when we allowed only  concerts to be displayed
$num_of_concerts_to_display = -1;
$all_upcoming_events = ig_saulkrasti_jazz_upcoming_events_query($num_of_concerts_to_display);
// $all_upcoming_events_count = $all_upcoming_events->found_posts;
$main_stage_concerts = ig_saulkrasti_jazz_upcoming_events_main_stage_query(-1);
$main_stage_concerts_count = $main_stage_concerts->found_posts;
// $more_concerts_to_show = $all_upcoming_events_count - $main_stage_concerts_count;
$venues = ig_saulkrasti_jazz_current_venues(-1);
$current_year = date("Y");
$page_concerts_url = ig_saulkrasti_jazz_get_page_url('page-templates/page-concerts');


?>

<?php

?>

<?php $festival_dates_array = ig_saulkrasti_jazz_get_dates_of_festival(ig_saulkrasti_jazz_festival_start_date(), ig_saulkrasti_jazz_festival_end_date(), 'd M y'); 

?>

<div class="target-div-for-modal-and-spinner-js"></div>
<div class="concert-cards-wrapper">

    <div class="row">
        <div class="col-12">
            <?php if (is_front_page()) : ?>
                <h2 class="section-header section-header--less-padding "><?php esc_html_e(get_field('homepage_header_upcoming_events'), 'saulkrasti-jazz-festival') ?></h2>
            <?php else : ?>
                <h2 class="section-header ig_pb-0 mt-5rem"><?php esc_html_e(get_field('concerts_page_header'), 'saulkrasti-jazz-festival') ?></h2>
                <h2 class="section-header section-header--less-pb ig_pt-0"><?php echo $current_year ?></h2>

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
                <a id="ig-sort-show-all" href="" class="sort-by-toggler <?php echo $args['page_concerts'] ? 'ig_gav-invisible' : null ?>  show-all-concerts-js-ajax">
                    <?php echo ig_gav_get_global_text('btn_text_sort_show_all') ?>
                </a>

            </div><!-- .taxonomy-triggers-container -->

            <div class="sort-by-venue <?php echo is_front_page() ?  'sort-by-menu--on-screen' : 'sort-by-menu--off-screen'; ?>">

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
                    
if($args['page_concerts'] ) : 
    ?>

    <div class="col-xl-4 col-lg-4  upcoming-events__wrapp-for-single upcoming-events-js-ajax-container">

                     <?php get_template_part('template-parts/homepage/partials/ig-card__upcoming-events', false, array('show_all' => true)); ?>

                    </div>




<?php else : ?>
    <div class="col-xl-3 col-lg-4  upcoming-events__wrapp-for-single upcoming-events-js-ajax-container">

<?php get_template_part('template-parts/homepage/partials/ig-card__upcoming-events'); ?>

</div>
<?php endif; ?>

                

                <?php endwhile;
                wp_reset_postdata(); ?>


            </div>


        </div><!-- .col-12 -->
    </div>

    <?php if (is_front_page()) : ?>
        <div class="plus-more-concerts-to-show-wrap js-hide-div-on-ajax">


          
                <button class="btnc btnc-smoke btnc-smoke--wide ml-3 btnc-l"><a href="<?php echo $page_concerts_url ?>"><?php echo ig_gav_get_global_text('btn_text_see_all') ?></a></button>
        </div>
    <?php endif; ?>
</div><!-- .concert-cards-wrapper -->