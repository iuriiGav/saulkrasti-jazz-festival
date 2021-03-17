<div class="single-artist__content">


    <?php if (have_rows('post_artists_additional_images') || get_field('post_artists_artists_photo')) : ?>
        <div class="single-artist__photo">





            <?php if (have_rows('post_artists_additional_images')) : ?>

                <?php require 'subparts/conditional-gallery.php' ?>

            <?php else :

                $img_width_single = wp_get_attachment_metadata(get_field('post_artists_artists_photo'))['width'];
                $img_height_single = wp_get_attachment_metadata(get_field('post_artists_artists_photo'))['height'];
            ?>


                <?php
                if ($img_width_single >= $img_height_single) :
                ?>
                    <img class="" src="<?php echo esc_url(wp_get_attachment_image_src(get_field('post_artists_artists_photo'), 'ig-medium')[0]) ?>" alt="<?php esc_html_e(get_post_meta(get_field('post_artists_artists_photo'), '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

                <?php
                else :
                ?>

                    <img class="ig_w-60" src="<?php echo esc_url(wp_get_attachment_image_src(get_field('post_artists_artists_photo'), 'ig-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta(get_field('post_artists_artists_photo'), '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
            <?php endif;
            endif; ?>




        </div>

    <?php endif; ?>
    <div class="single-artist__bio-container">

        <div class="single-artist__bio">

            <div class="single-artist__line-up">

                <?php

                if (have_rows('post_artists_line-up')) :

                    while (have_rows('post_artists_line-up')) : the_row();

                        $artist = get_sub_field('name');
                        $instrument = get_sub_field('instrument');

                ?>
                        <div class="single-artist__line-up--artist">

                            <h5> <?php esc_html_e($artist, 'saulkrasti-jazz-festival');
                                    echo ', ', '&nbsp;'; ?> </h5>
                            <p> <?php esc_html_e($instrument, 'saulkrasti-jazz-festival') ?> </p>
                        </div>

                <?php
                    endwhile;


                endif;

                ?>
            </div>

            <?php echo wp_kses_post(wpautop(get_field('post_artists_bio'))) ?>


            <div class="single-artist__links-container">
            <?php

            if (have_rows('post_artists_link_to_ofiicial_website')) :

                while (have_rows('post_artists_link_to_ofiicial_website')) : the_row();

                    $url = get_sub_field('url');
                    $website_homepage = explode("/", $url, 3);

            ?>


                        <div class="single-artist__link">

                            <?php

                            ?>
                            <a class="btnc btnc-underlined" href="<?php echo esc_url($url) ?>" target="_blank"><?php esc_html_e($website_homepage[2], 'saulkrasti-jazz-festival')  ?></a>
                        </div>


            <?php
                endwhile;


            endif;

            ?>

</div>






        </div>


        <?php if (get_field('post_artists_video')) : ?>
            <div class="videoWrapper">
                <?php echo get_field('post_artists_video') ?>
            </div>

        <?php endif; ?>
    </div>
</div>