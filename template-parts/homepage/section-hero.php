<div class="current-festival-dates"><?php esc_html_e(get_field('homepage_current_festival_dates'), 'saulkrasti-jazz-festival') ?></div>
<div class="back-light-for-logo"></div>

<img src="<?php ig_saulkrasti_jazz_image_from_field('options_website_logo_current_year', 'options') ?>" alt="" class="logo-with-year">

<!-- <button class="btnc btnc-xl btnc-smoke hero-button"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></button> -->
<button class="btnc btnc-xl btnc-smoke hero-button"><?php echo ig_gav_get_global_text('btn_text_get_ticket_for_a_week') ?></button>

<h5 style='color: red; font-style: italic;'> <?php echo 'this is from ' . basename(__FILE__); ?></h5>

<!-- <?php while (have_rows('homepage_hero_headliners_images')) : the_row(); ?>


<img src="<?php echo  esc_url(wp_get_attachment_image_src(get_sub_field('image'), 'full')[0]); ?>" alt="" class="headliner-image">

<?php endwhile; ?> -->