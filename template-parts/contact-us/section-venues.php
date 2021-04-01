
<?php 
$location = get_field('contact_us_main_stage_location'); 
include get_template_directory() . '/inc/queries/current_venues_query.php';
$main_venue =  ig_saulkrasti_jazz_current_venues(-1);
$other_venues_IDs = array()

?>


<?php if($main_venue->have_posts()) : while($main_venue->have_posts()): $main_venue->the_post(); 
if(get_field('post_venues_priority') === '1') :
$venue_title = get_field('post_venues_venue_title');
$venue_name = get_field('post_venues_venue_name');
$venue_address_1 = get_field('post_venues_address_line_1');
$venue_address_2 = get_field('post_venues_address_line_2');
$venue_postcode = get_field('post_venues_postcode');
?>


<div class="single-venue__address">
    <?php if ($venue_title && $venue_title !== $venue_name) : ?>
        <p><?php esc_html_e($venue_name, 'saulkrasti-jazz-festival'); echo ',' . '&nbsp'  ?></p>
    <?php endif; ?>
    <p><?php echo $venue_address_1 . ',' . '&nbsp' ?></p>
    <p><?php echo $venue_address_2 . '&nbsp' ?></p>
    <p><?php echo $venue_postcode ?></p>
</div>


<?php else : 

array_push($other_venues_IDs, get_the_ID());
endif; endwhile; wp_reset_postdata(); endif; 
 ?>


<div class="row contact-venue__wrapper">





    <div class="col-xl-4 col-lg-6 contact-venue__map">
        <?php  echo get_field('contact_us_map_shortcod') ?>

    </div>

    <div class="col-xl-8 col-lg-6 contact-venue__stage-photo">
    <img src="<?php echo esc_url(wp_get_attachment_image_src(get_field('contact_us_main_stage_photo'), 'full')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

    </div>
</div>


<?php if(!empty($other_venues_IDs)) : ?>

<div class="row d-flex justify-content-center">

<h4 class="section-header section-header--less-padding"><?php esc_html_e(get_field('contact_us_other_venues_header'), 'saulkrasti-jazz-festival') ?></h4>

<?php foreach($other_venues_IDs as $venueID) : 
    $venue_title = get_field('post_venues_venue_title', $venueID);
    $venue_name = get_field('post_venues_venue_name', $venueID)
    
    ?>

<button class="btnc btnc-dark btnc--30 ig_m-2em btnc-md"><a target="_blank" href="<?php echo get_the_permalink($venueID); ?>"> <?php echo $venue_title ? esc_html__($venue_title, 'saulkrasti-jazz-festival') : esc_html__($venue_name, 'saulkrasti-jazz-festival') ?> </a></button>
<?php endforeach; ?>
</div>

<?php endif; ?>

<!--  -->

