<div class="swiper-container swiper-container--full">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">




        <!-- Slides -->
        <div class="swiper-slide">
            <?php ig_gav_get_image_depending_on_aspect_ratio(get_field('post_artists_artists_photo')) ?>

        </div>



        <?php if (have_rows('post_artists_additional_images')) : while (have_rows('post_artists_additional_images')) : the_row();
                $image = get_sub_field('image');

        ?>


                <!-- Slides -->
                <div class="swiper-slide">
                    <?php ig_gav_get_image_depending_on_aspect_ratio($image) ?>


                </div>
        <?php endwhile;
        endif; ?>

    </div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
</div>