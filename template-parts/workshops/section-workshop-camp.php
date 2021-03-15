<div class="row">
    <div class="col-xl-8">
        <div class="ig-card  ig-card__full--m-left">

<div class="workshop__camp-text ig-card__line-high">
<?php echo wp_kses_post(wpautop(get_field('workshop_workshop_camp_text'))) ?>

</div>

  
        </div>
    </div>
    <div class="col-xl-4 p-relative">

    <div class="swiper-container swiper-container--full  workshop__camp-gallery">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">


                <?php if (have_rows('workshop_workshop_camp_small_gallery')) : while (have_rows('workshop_workshop_camp_small_gallery')) : the_row();
                        $image = get_sub_field('image');
                ?>


                        <!-- Slides -->
                        <div class="swiper-slide swiper-slide__shadow ">
                            <img src="<?php ig_gav_get_medium_image($image) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
                        </div>
                <?php endwhile;
                endif; ?>

            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
        </div>

    </div>
    <div class="ig-card ig-card--empty-card-tail-after-text-content--md d-xl-only">
    <button class="mt-3rem mb-5 btnc btnc-m btnc-brand workshop__weekly-schedule">
<?php echo ig_gav_get_global_text('btn_text_weekly_schedule') ?>
</button>

    </div>
</div>
