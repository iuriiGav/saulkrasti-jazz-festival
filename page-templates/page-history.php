<?php

/*
* Template Name: Festival History
*/
get_header(); ?>



<section class="current-year-artists__history full-screen-cover" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_page_artists_cover_image', 'options')
                                                                                                                                                            ?>)">
    <h2 class="section-header mt-5rem"><?php esc_html_e(get_field('history_page_header'), 'saulkrasti-jazz-festival') ?></h2>
    <div class="row history-wrapper">


<div class="col-lg-3">
<div class="side-links__wrapper">
<ul class="side-links__list">
<?php

if( have_rows('teachers_available_masterclass_instrument_options') ):

    while( have_rows('teachers_available_masterclass_instrument_options') ) : the_row(); 
        $i_g++;
        $instrument = get_sub_field('instrument_name');

        ?>
<li class="side-links__item "><a class="side-link--target-instrument" id="instrument-<?php echo $i_g?>" href=""><?php esc_html_e($instrument, 'saulkrasti-jazz-festival') ?></a> </li>

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
    'meta_query'	=> array(
        'key'		=> 'years_in_which_this_artist_participated_$_year_of_participation',
        'compare'	=> '=',
        'value'		=> '2019',
    )



);

$current_festival_artists = new WP_Query($args); ?>


<div class="col-lg-9 history__artists-container">
    <div class="row history__artists-cols-wrap">

        <?php
        while ($current_festival_artists->have_posts()) : $current_festival_artists->the_post();
            $artist_name = get_field('post_artists_artist_name');
            $artist_country = get_field('post_artists_country');
            $artist_photo = get_field('post_artists_artists_photo');
        ?>





                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-5">

                    <div class="card-artist card-artist--100">

                        <div class="card-artist__image">
                            <img src="<?php echo esc_url(wp_get_attachment_image_src($artist_photo, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

                        </div>
                        <div class="card-artist__text card-artist__text--flex ">
                            <h4 class="text-center"><?php esc_html_e($artist_name, 'saulkrasti-jazz-festival') ?></h4>
                            <h6 class="text-center t-gray"><?php esc_html_e($artist_country, 'saulkrasti-jazz-festival') ?></h6>
                            <a href="<?php the_permalink() ?>" class="btnc btnc-underlined mb-2"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a>


                        </div>

                    </div>
                </div>
                
                <?php endwhile;
        wp_reset_postdata(); ?>
        </div><!-- .history__artists-wrapper row -->
        </div>

    </div><!-- .history-wrapper -->

</section>



<h5 style='color: red; font-style: italic;'> <?php echo 'this is from ' . basename(__FILE__); ?></h5>
<?php get_footer(); ?>