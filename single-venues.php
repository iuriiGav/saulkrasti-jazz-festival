<?php get_header();

$venue_title = get_field('post_venues_venue_title');
$venue_name = get_field('post_venues_venue_name');
$venue_address_1 = get_field('post_venues_address_line_1');
$venue_address_2 = get_field('post_venues_address_line_2');
$venue_postcode = get_field('post_venues_postcode');
$url = esc_url(get_field('post_venues_venue_website_link'));
$website_homepage = explode("/", $url, 3);
?>


<section class="single-venue">

    <h2 class="section-header pb-0 mt-3rem"><?php echo get_field('post_venues_venue_title') ? esc_html__(get_field('post_venues_venue_title'), 'saulkrasti-jazz-festival') :   esc_html__(get_field('post_venues_venue_name'), 'saulkrasti-jazz-festival') ?></h2>


    <div class="single-artist__event-venue">


        <div class="single-venue__address">
            <?php if ($venue_title && $venue_title !== $venue_name) : ?>
                <p><?php esc_html_e($venue_name, 'saulkrasti-jazz-festival') ?></p>
            <?php endif; ?>
            <p><?php echo $venue_address_1 . '&nbsp' ?></p>
            <p><?php echo $venue_address_2 . '&nbsp' ?></p>
            <p><?php echo $venue_postcode ?></p>
        </div>
    </div>
    <div class="row single-venue__container">

        <div class="col-lg-6 single-venue__map">
            <?php echo get_field('post_venues_venue_map_shortcode') ?>

        </div>

        <div class="col-lg-6 single-venue__photo" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src(get_field('post_venues_venue_image'), 'square')[0]); ?>)">

        </div>
        <?php
        if (!empty(get_field('post_venues_additional_information_text'))) : ?>

            <div class="col-lg-12">
                <div id="post-venues-additional-text" class="ig-card ig-card__100 ig-card__inner-padding" style="display: block;">
                    <?php echo wp_kses_post(wpautop(get_field('post_venues_additional_information_text'))) ?>

                </div>
            </div>
        <?php
        endif;
        ?>

<?php if (have_rows('post_venues_additional_photo_or_photos')) : ?>
<div class="col-lg-12">
<div class="swiper-container swiper-container__full-width swiper-container__mobile-horizonal">
            <div class="swiper-wrapper">


                <?php if (have_rows('post_venues_additional_photo_or_photos')) : while (have_rows('post_venues_additional_photo_or_photos')) : the_row();
                        $image = get_sub_field('image');
                ?>


                        <div class="swiper-slide swiper-slide--80">
                            <img src="<?php echo esc_url(wp_get_attachment_image_src($image, 'full')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
                        </div>
                <?php endwhile;
                endif; ?>

            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>

</div>

<?php endif; ?>


    </div>
    <div class="single-venue__links">
        <h4 class="text-center ig_tc-brand"><a href="<?php echo $url ?>"><?php echo $website_homepage[2] ?></a></h4>


    </div>

    <!-- test waze  -->


    <!-- test waze end -->
</section>
<?php get_footer(); ?>