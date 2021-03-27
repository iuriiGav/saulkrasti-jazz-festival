<?php

/*
* Template Name: About Festival
*/
get_header();

include get_template_directory() . '/inc/queries/current_venues_query.php';
$venues = ig_saulkrasti_jazz_current_venues(-1);
?>

<section class="full-screen-cover" style="background: <?php ig_saulkrasti_jazz_linear_gradient_dark() ?> url(<?php ig_saulkrasti_jazz_image_from_field('options_about_festival_cover', 'options')
                                                                                                                ?>)">
    <h2 class="section-header section-header--less-pb mt-5rem"><?php esc_html_e(get_field('page_about_page_heading'), 'saulkrasti-jazz-festival') ?></h2>
    <div class="page-about__wrapper">


        <div class="row">
            <div class="col-12">
                <div class="ig-card ig-card__100 ig-card__inner-padding">
                    <div class="workshop__camp-text ig-card__line-high">
                        <?php echo wp_kses_post(wpautop(get_field('page_about_about_festival_text'))) ?>

                    </div>
                </div>
            </div>

        </div>

    </div>


</section>

<section class="page-about__venues" style="background-color: var(--color-dark)">
    <h4 class="section-header section-header--less-padding ig_pb-1em"><?php esc_html_e(get_field('page_about_venues_header'), 'saulkrasti-jazz-festival') ?></h4>
    <div class="page-about__venues-container">
        <div class="row">


            <?php if ($venues->have_posts()) : while ($venues->have_posts()) : $venues->the_post();

                    $image = get_field('post_venues_venue_image');
                    $venue_name = get_field('post_venues_venue_title') ? get_field('post_venues_venue_title') : get_field('post_venues_venue_name');
                    $venue_title = get_field('post_venues_venue_title');
                    $original_venue_name = get_field('post_venues_venue_name');
                                 ?>

                    <div class="col-md-4">


                    <a class="ig_height-100" href="<?php the_permalink(); ?>">

                        <div class="card-artist ig_no-shadow card-artist--wide ig_height-100">


                            <div class="card-artist__extra-note-top">

                                <?php if (get_field('post_venues_is_free_concerts_venue') === 'true') : ?>
                                    <h4 class="text-center t-light"><?php echo ig_gav_get_global_text('global_free_concerts_tag_label')  ?></h4>
                                <?php else : ?>
                                    <h4 class="text-center t-light"><?php echo ig_gav_get_global_text('global_paid_concerts_tag')  ?></h4>


                                <?php endif; ?>

                            </div>


                            <div class="card-artist__image">
                                <img src="<?php echo esc_url(wp_get_attachment_image_src($image, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

                            </div>
                            <div class="card-artist__text card-artist__text--flex ">
                                    <h3 class="text-center"><?php esc_html_e($venue_name, 'saulkrasti-jazz-festival') ?></h3>
                                <div class="single-artist__event-venue--address-lines ig_pt-1em">
                                    <?php if ($venue_title && $venue_title !== $original_venue_name) : ?>
                                        <p><?php esc_html_e($original_venue_name, 'saulkrasti-jazz-festival') ?></p>
                                    <?php endif; ?>
                                    <p><?php esc_html_e(get_field('post_venues_address_line_1'), 'saulkrasti-jazz-festival') ?></p>
                                    <p><?php esc_html_e(get_field('post_venues_address_line_2'), 'saulkrasti-jazz-festival') ?></p>
                                    <p><?php esc_html_e(get_field('post_venues_postcode'), 'saulkrasti-jazz-festival') ?></p>
                                </div>

                            </div>

                        </div>
                        </a>

                    </div>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?> ?>


        </div>


    </div>



</section>

<section class="page-about__gallery" style="background-color: var(--color-dark)">
    <div class="row ">
        <div class="col-12 ig_w-80">
            <div class="ig-card ig-card__80 ig-card__inner-padding">
                <div class="workshop__camp-text ig-card__line-high">
                    <?php echo wp_kses_post(wpautop(get_field('page_about_about_festival_extra_text'))) ?>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12">
        <div class="page-about__big-gallery-container">
            <?php the_field('page_about_lower_gallery') ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>