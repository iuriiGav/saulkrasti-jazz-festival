<?php 
/* 
* Template Name: Upcoming Concerts
*/
get_header(); ?>
<section class="page-upcoming-concerts full-screen-cover " style="background: <?php ig_saulkrasti_jazz_linear_gradient_dark() ?> url(<?php ig_saulkrasti_jazz_image_from_field('options_concerts_page_cover', 'options') ?>)">
<?php if(get_field('options_show_upcoming_events_section', 'options') === 'true') : ?>
<?php get_template_part('template-parts/homepage/section', 'upcoming-events', array('page_concerts' => true)); ?>
<?php else : ?>
    <div class="full-subscribe-form">
    <?php
get_template_part('template-parts/social-links/mailchimp-contact-form-full');
?>
</div>
    <?php endif; ?>
</section>


<?php get_footer(); ?>