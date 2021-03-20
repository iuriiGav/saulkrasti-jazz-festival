<?php 
/* 
* Template Name: Upcoming Concerts
*/
get_header(); ?>
<section class="page-upcoming-concerts full-screen-cover " style="background: <?php ig_saulkrasti_jazz_linear_gradient_dark() ?> url(<?php ig_saulkrasti_jazz_image_from_field('options_concerts_page_cover', 'options') ?>)">

<?php get_template_part('template-parts/homepage/section', 'upcoming-events'); ?>
</section>


<?php get_footer(); ?>