<div class="current-festival-dates"><?php esc_html_e(get_field('homepage_current_festival_dates'), 'saulkrasti-jazz-festival') ?></div>

<img src="<?php ig_saulkrasti_jazz_image_from_field('options_website_logo_current_year', 'options') ?>" alt="" class="logo-with-year">
<button class="btnc btnc-xl btnc-smoke hero-button"><?php esc_html_e(get_field('options_btn_learn_more', 'options'), 'saulkrasti-jazz-festival') ?></button>



<!-- <?php while( have_rows('homepage_hero_headliners_images') ) : the_row(); ?>


<img src="<?php echo  esc_url(wp_get_attachment_image_src(get_sub_field('image'), 'full')[0]); ?>" alt="" class="headliner-image">

<?php endwhile; ?> -->