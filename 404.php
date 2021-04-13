<?php get_header(); ?>

<section class="not-found-container full-screen-cover full-screen-cover__top-left full-screen-cover__static" style="background:  linear-gradient(180deg, rgba(18, 17, 19, 0.7) 0%, rgba(0, 0, 0, 0.62) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_404_cover', 'options')
                                                                                                                                                                                                                    ?>)">
    <div class="not-found-text">


        <h1><?php echo ig_gav_get_global_text('global_page_not_found_heading_1') ?></h1>
        <br><br>
        <h3><?php echo ig_gav_get_global_text('global_page_not_found_heading_2') ?></h3>
        <br>
        <h5><?php echo ig_gav_get_global_text('global_page_not_found_error_code') ?></h5>
        <br>
        <p><?php echo ig_gav_get_global_text('global_page_not_found_helpful_links_text') ?></p>


        <div class="not-found-helpful-links">

            <?php
            $global_texts_page_ID = ig_saulkrasti_jazz_get_id_of_page_by_template('page-buttons');

            if (have_rows('global_page_not_found_helpful_links', $global_texts_page_ID[0])) :



                while (have_rows('global_page_not_found_helpful_links', $global_texts_page_ID[0])) : the_row();

                    $link = get_sub_field('link');

            ?>

                    <h4><a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html_e($link['title'], 'saulkrasti-jazz-festival') ?></a></h4>


            <?php
                endwhile;


            endif;

            ?>

        </div>

    </div>




</section>


<?php get_footer(); ?>