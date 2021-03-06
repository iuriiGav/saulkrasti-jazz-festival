<?php get_header();
require_once 'inc/helper-functions/html-helpers.php';
$show_current_events_section = get_field_object('options_show_upcoming_events_section', 'options')['value'];
?>
<?php while (have_posts()) : the_post();
    $headliner_hero = get_field('homepage_hero_headliners_images');
    $optional_padding_top = $show_current_events_section  === 'false' ? 'ig_pt-5rem' : null;
?>

    <main class="homepage">
    <!--OPTION 1: linear-gradient(180deg, rgba(96, 119, 205, 0.06) 0%, rgba(96, 119, 205, 0.48) 100%), -->
    <!--OPTION 2: linear-gradient(180deg, rgba(18, 17, 19, 0.2) 0%, rgba(0, 0, 0, 0.62) 100%), -->
        <section class="hero full-screen-cover" style="background:  linear-gradient(180deg, rgba(18, 17, 19, 0.2) 0%, rgba(0, 0, 0, 0.62) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_homepage_hero_image_cover', 'options')
                                                                                ?>)">
            <?php get_template_part('template-parts/homepage/section', 'hero-message'); ?>

            <?php get_template_part('template-parts/homepage/section', 'hero'); ?>

        </section>

<?php if($show_current_events_section === 'true') : ?>
        <section class="homepage-upcoming-concerts full-screen-cover" style="background-color: var(--color-dark)">
        <?php get_template_part('template-parts/homepage/section', 'upcoming-events'); ?>
        </section><!-- .homepage-upcoming-concerts  -->
<?php endif; ?>


<?php if($show_current_events_section === 'true') : ?>


<section class="homepage-workshops full-screen-cover <?php echo $optional_padding_top?>" style="background: <?php ig_saulkrasti_jazz_linear_gradient_dark() ?>  url(<?php ig_saulkrasti_jazz_image_from_field('options_homepage_second_cover', 'options')
                                                                                ?>)">>
                                                                                
<?php get_template_part('template-parts/homepage/section', 'about'); ?>
<?php get_template_part('template-parts/homepage/section', 'workshops'); ?>


</section>

<?php else: ?>



    <section class="homepage-workshops full-screen-cover <?php echo $optional_padding_top?>" style="background-color: var(--color-dark)">>

    <?php get_template_part('template-parts/homepage/section', 'about'); ?>

    </section>

    <section class="homepage-workshops full-screen-cover <?php echo $optional_padding_top?>" style="background: <?php ig_saulkrasti_jazz_linear_gradient_dark() ?>  url(<?php ig_saulkrasti_jazz_image_from_field('options_homepage_second_cover', 'options')
                                                                                ?>)">>
<?php get_template_part('template-parts/homepage/section', 'workshops'); ?>

</section>

<?php endif; ?>



    </main>
<?php endwhile; ?>
<?php get_footer(); ?>