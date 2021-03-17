<div class="swiper-container swiper-container--full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
            <?php
                
                $img_width_single = wp_get_attachment_metadata(get_field('post_artists_artists_photo'))['width'];
                $img_height_single = wp_get_attachment_metadata(get_field('post_artists_artists_photo'))['height'];
                ?>


                <!-- Slides -->
                <div class="swiper-slide">
                    <?php
                    if ($img_width_single >= $img_height_single) :
                    ?>
                        <img class="" src="<?php echo esc_url(wp_get_attachment_image_src(get_field('post_artists_artists_photo'), 'ig-medium')[0]) ?>" alt="<?php esc_html_e(get_post_meta(get_field('post_artists_artists_photo'), '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

                    <?php
                    else :
                    ?>

                        <img class="ig_w-60" src="<?php echo esc_url(wp_get_attachment_image_src(get_field('post_artists_artists_photo'), 'ig-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta(get_field('post_artists_artists_photo'), '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
                    <?php endif; ?>
                </div>

                <?php if (have_rows('post_artists_additional_images')) : while (have_rows('post_artists_additional_images')) : the_row();
                        $image = get_sub_field('image');
                        $img_width = wp_get_attachment_metadata($image)['width'];
                        $img_height = wp_get_attachment_metadata($image)['height'];
                ?>


                        <!-- Slides -->
                        <div class="swiper-slide">
                            <?php
                            if ($img_width >= $img_height) :
                            ?>
                                <img class="" src="<?php echo esc_url(wp_get_attachment_image_src($image, 'ig-medium')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

                            <?php
                            else :
                            ?>

                                <img class="ig_w-60" src="<?php echo esc_url(wp_get_attachment_image_src($image, 'ig-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
                            <?php endif; ?>

                        </div>
                <?php endwhile;
                endif; ?>

            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
        </div>