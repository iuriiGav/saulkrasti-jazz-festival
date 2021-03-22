<?php get_header();
require_once 'inc/helper-functions/html-helpers.php';
$show_current_events_section = get_field_object('options_show_upcoming_events_section', 'options')['value'];
?>
<?php while (have_posts()) : the_post();
    $headliner_hero = get_field('homepage_hero_headliners_images')
?>

    <main class="homepage">
        <section class="hero full-screen-cover" style="background-image: url(<?php ig_saulkrasti_jazz_image_from_field('options_homepage_hero_image_cover', 'options')
                                                                                ?>)">

            <?php get_template_part('template-parts/homepage/section', 'hero'); ?>

        </section>

<?php if($show_current_events_section === 'true') : ?>
        <section class="homepage-upcoming-concerts full-screen-cover" style="background: <?php ig_saulkrasti_jazz_linear_gradient_dark() ?>  url(<?php ig_saulkrasti_jazz_image_from_field('options_homepage_upcoming_concerts_cover', 'options') ?>)">
        <?php get_template_part('template-parts/homepage/section', 'upcoming-events'); ?>
        </section><!-- .homepage-upcoming-concerts  -->
<?php endif; ?>



<section class="homepage-about-festival full-screen-cover full-screen-cover__static" style="background-color: var(--color-dark);">>
<?php get_template_part('template-parts/homepage/section', 'about'); ?>

</section>

<section id="test" class="homepage-workshops full-screen-cover" style="background-image: url(<?php ig_saulkrasti_jazz_image_from_field('options_homepage_workshops_cover', 'options')
                                                                                ?>)">>
<?php get_template_part('template-parts/homepage/section', 'workshops'); ?>

</section>
    </main>
<?php endwhile; ?>
<?php get_footer(); ?>