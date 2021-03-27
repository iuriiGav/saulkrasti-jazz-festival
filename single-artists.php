<?php get_header();
require 'inc/queries/upcoming_events_query.php';
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class=" full-screen-cover" style="background: linear-gradient(180deg, #070707 0%, rgba(53, 53, 53, 0) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_single_artist_cover', 'options')
                                                                                                                                    ?>)">
            <?php get_template_part('template-parts/single-artists/section', 'whole-page-single-artist'); ?>

        </section>


<?php endwhile;
endif; ?>

<?php get_footer(); ?>