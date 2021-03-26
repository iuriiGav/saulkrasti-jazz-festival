<?php
/* 
* Template Name: Contact Us
*/
get_header(); ?>


<section class="contact-us-form full-screen-cover " style="background: linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_contact_us_cover_image', 'options')
                                                                                                                                            ?>)">
    <h2 class="section-header section-header--less-pb mt-5rem"><?php esc_html_e(get_field('contact_us_page_header'), 'saulkrasti-jazz-festival') ?></h2>
    <?php get_template_part('template-parts/contact-us/section', 'contact-form'); ?>


</section>
<section class="contact-us-form full-screen-cover bgc-dark">

<?php get_template_part('template-parts/contact-us/section', 'team'); ?>

</section>


<section class="contact-us-form full-screen-cover" style="background: linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_contact_us_cover_image', 'options')
                                                                                                                                            ?>)">
    <h2 class="section-header section-header--less-padding"><?php esc_html_e(get_field('contact_us_venue_header'), 'saulkrasti-jazz-festival') ?></h2>
    <?php get_template_part('template-parts/contact-us/section', 'venues'); ?>


</section>

<?php get_footer(); ?>