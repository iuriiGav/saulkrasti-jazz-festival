<?php get_header(); ?>

<section class="single-gallery">
<h2 class="section-header section-header--less-padding  pb-4 mt-5rem"><?php echo get_field('gallery_name') ? get_field('gallery_name') : ig_gav_get_global_text('global_gallery_heading') . ' ' . esc_html__(get_field('post_gallery_gallery_year'), 'saulkrasti-jazz-festival') ?></h2>

<?php the_field('gallery_shortcode') ?>


</section>

<?php get_footer(); ?>