<?php get_header();
include 'inc/helper-functions/html-helpers.php';
?>


<main class="homepage">
<?php while (have_posts()) : the_post();
    $headliner_hero = get_field('homepage_hero_headliners_images')
?>


    <div class="row huge-logo-container ">
        <img src="<?php ig_saulkrasti_jazz_image_from_field('options_homepage_hero_image_cover', 'full', 'options') ?>" alt="" class="img-fluid hero-main-cover-image">



        <!-- <?php while (have_rows('homepage_hero_headliners_images')) : the_row(); ?>


<img src="<?php echo  esc_url(wp_get_attachment_image_src(get_sub_field('image'), 'full')[0]); ?>" alt="" class="headliner-image">

<?php endwhile; ?> -->




    </div>


    <section class="">
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">





                <!-- Slides -->
                <div class="swiper-slide">
                    <img src="<?php ig_saulkrasti_jazz_image_from_field('options_homepage_hero_image_cover', 'full', 'options') ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'satiksanos-saulkrastos') ?>">
                </div>


            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </section>


<?php endwhile; ?>


</main>

<?php get_footer(); ?>