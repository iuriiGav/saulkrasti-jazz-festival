<?php if(get_field('options_show_about_festival_section_in_homepage', 'options') === 'true') : ?>

<div class="row homepage-workshops__wrapper ">
    <div class="col-md-5 homepage-workshops__see-through about-us-small-gallery__workshop-sections d-flex md-none">

    <div class="swiper-container  swiper-container__mobile-horizonal swiper-container__workshop-section swiper-container--80">
            <div class="swiper-wrapper">


                <?php if (have_rows('homepage_about_workshops_short_gallery')) : while (have_rows('homepage_about_workshops_short_gallery')) : the_row();
                        $image = get_sub_field('image');
                ?>


                        <div class="swiper-slide swiper-slide--80">
                            <img src="<?php echo esc_url(wp_get_attachment_image_src($image, 'ig-featured-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
                        </div>
                <?php endwhile;
                endif; ?>

            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>

    </div>
    <div class="col-md-7 homepage-workshops__content">
    <h2 class="section-header section-header--less-padding"><?php esc_html_e(get_field('homepage_header_workshops_header'), 'saulkrasti-jazz-festival') ?></h2>

        <div class="ig-card ig-card--text-content ig-card__inner-padding">
    <div class="ig-card__line-high">
    <?php echo wp_kses_post(wpautop(get_field('homepage_about_workshops_short_text'))) ?>



    </div>

        </div>
        <div class="btn-wrapper-80__right btn-wrapper-80__right--change-to-left my-5">
    
    <button class="btnc btnc-brand-square"><a href="<?php echo ig_saulkrasti_jazz_get_page_url('page-templates/page-workshop-camp')?>"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a> </button>

</div>
    </div>
</div>

<?php endif;