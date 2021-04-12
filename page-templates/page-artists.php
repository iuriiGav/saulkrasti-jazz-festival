<?php
/* 
* Template Name: Artists
*/
get_header(); ?>

<section class="current-year-artists full-screen-cover" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_page_artists_cover_image', 'options')
                                                                                                                                                    ?>)">
    <h2 class="section-header section-header--less-pb mt-5rem"><?php esc_html_e(get_field('page_artists_header'), 'saulkrasti-jazz-festival') ?></h2>



    <?php 
    
    $args = array(

        'post_type' => 'artists',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'is_active',
                'field' => 'Yes',
                'terms' => 15
            )
        ),
        'meta_key'			=> 'post_artists_artist_name',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC'
        


    );

    // $args = array( // array using a repeater field

    //     'post_type' => 'artists',
    //     'posts_per_page' => 30,
    //     'meta_query'	=> array(
    //         array(
    //         'key'		=> 'years_in_which_this_artist_participated_$_year_of_participation',
    //         'compare'	=> '=',
    //         'value'		=> '2018'
    //             )
    //     )
    
    
    
    // );

    $current_festival_artists = new WP_Query($args); ?>
    <div class="row ig_wrap-90">
        <?php
        while ($current_festival_artists->have_posts()) : $current_festival_artists->the_post();
            $artist_name = get_field('post_artists_artist_name');
            $artist_country = get_field('post_artists_country');
            $artist_photo = get_field('post_artists_artists_photo');
        ?>

            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-5  d-flex">
                <a href="<?php the_permalink() ?>" class="d-flex mx-auto">
                    <div class="card-artist card-artist--100">

                        <div class="card-artist__image">

                            <?php if (empty($artist_photo)) :

                              
                                $random_image_ID = ig_gav_random_image_ID();
                            ?>

                                <img src="<?php echo esc_url(wp_get_attachment_image_src($random_image_ID, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($random_image_ID, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

                            <?php else : ?>
                                <img src="<?php echo esc_url(wp_get_attachment_image_src($artist_photo, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($artist_photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
                            <?php endif; ?>
                        </div>
                        <div class="card-artist__text card-artist__text--flex ">
                            <h4 class="text-center"><?php esc_html_e($artist_name, 'saulkrasti-jazz-festival') ?></h4>
                            <h6 class="text-center t-gray"><?php esc_html_e($artist_country, 'saulkrasti-jazz-festival') ?></h6>
                            <!-- <a href="<?php the_permalink() ?>" class="btnc btnc-underlined mb-2"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a> -->


                        </div>

                    </div>
                </a>

            </div>

        <?php endwhile;
        wp_reset_postdata(); ?>

    </div>
</section>

<?php get_footer(); ?>