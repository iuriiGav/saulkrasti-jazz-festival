<div class="row about-festival-wrapper">
    <div class="col-md-7">
        <h2 class="section-header"><?php esc_html_e(get_field('homepage_header_about_us_header'), 'saulkrasti-jazz-festival') ?></h2>
        <div class="ig-card ig-card--text-content ig-card__inner-padding ">
            <div class="ig-card__line-high">
                <?php echo wp_kses_post(wpautop(get_field('homepage_about_festival_short_text'))) ?>
            </div>
        </div>
        
        <div class="btn-wrapper-80__left md-none">
    
            <button class="btnc btnc-brand-square"><a href="<?php echo ig_saulkrasti_jazz_get_page_url('page-templates/page-about')?>"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a> </button>

        </div>
    </div>
    <div class="col-md-5 about-us-small-gallery">
        <!-- Slider main container -->
        <div class="swiper-container swiper-container__mobile-horizonal">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">


                <?php if (have_rows('homepage_about_festival_short_gallery_desktop')) : while (have_rows('homepage_about_festival_short_gallery_desktop')) : the_row();
                        $image = get_sub_field('image');
                ?>


                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url(wp_get_attachment_image_src($image, 'ig-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
                        </div>
                <?php endwhile;
                endif; ?>

            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
        </div>

        <div class="ig-card ig-card--empty-card-tail-after-text-content d-md-only"></div> 

        <div class="btn-wrapper-80__left d-md-only mb-5">
    
    <button class="btnc btnc-brand-square"><a href="<?php echo ig_saulkrasti_jazz_get_page_url('page-templates/page-about')?>"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a> </button>

</div>
    </div>
</div>