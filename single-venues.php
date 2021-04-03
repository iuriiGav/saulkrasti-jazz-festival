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

    <h2 class="section-header pb-0 mt-5rem"><?php echo get_field('post_venues_venue_title') ? esc_html__(get_field('post_venues_venue_title'), 'saulkrasti-jazz-festival') :   esc_html__(get_field('post_venues_venue_name'), 'saulkrasti-jazz-festival') ?></h2>


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
    </div>
    <div class="single-venue__links">
        <h4 class="text-center ig_tc-brand"><a href="<?php echo $url ?>"><?php echo $website_homepage[2] ?></a></h4>
        <?php if (get_field('post_venues_waze_navigation')) : ?>
            <div class="waze-start-navigation-icon__container">
                <a class="waze-start-navigation-icon__link-image" href="https://waze.com://ul?ll=<?php echo esc_html_e(get_field('post_venues_waze_navigation'), 'saulkrasti-jazz-festival') ?>&amp;navigate=yes">
                    <img src="<?php echo get_template_directory_uri() . '/images/social/waze-icon.png' ?>"></a>

            </div>
        <?php endif; ?>

    </div>

    <!-- test waze  -->


    <!-- test waze end -->
</section>
<?php get_footer(); ?>