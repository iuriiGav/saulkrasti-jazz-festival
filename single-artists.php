<?php get_header();
require 'inc/queries/upcoming_events_query.php';
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class=" full-screen-cover" style="background: linear-gradient(180deg, #070707 0%, rgba(53, 53, 53, 0) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_single_artist_cover', 'options')
                                                                                                                                    ?>)">
            <h2 class="section-header mt-5rem"><?php esc_html_e(get_field('post_artists_artist_name'), 'saulkrasti-jazz-festival') ?></h2>

            <div class="single-artist__wrapper">

                <div class="row">
                    <div class="col-lg-8">

                        <?php get_template_part('template-parts/single-artists/section', 'artistcontent'); ?>
                    </div>

                    <div class="main-sidebar col-lg-4">


                        <?php get_template_part('template-parts/main-sidebar/main', 'sidebar') ?>




                    </div>


                </div>


            </div>


        </section>


<?php endwhile;
endif; ?>

<?php get_footer(); ?>