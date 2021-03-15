
<?php 
$location = get_field('contact_us_main_stage_location'); 

$location_address = $location['address'];
$location_lat = $location['lat'];
$location_lng = $location['lng'];

?>



<div class="row contact-venue__wrapper">

    <div class="col-xl-4 col-lg-6 contact-venue__map">
        <?php  echo get_field('contact_us_map_shortcod') ?>

    </div>

    <div class="col-xl-8 col-lg-6 contact-venue__stage-photo">
    <img src="<?php echo esc_url(wp_get_attachment_image_src(get_field('contact_us_main_stage_photo'), 'full')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

    </div>
</div>



