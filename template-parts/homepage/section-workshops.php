<div class="row homepage-workshops__wrapper">
    <div class="col-md-5 homepage-workshops__see-through"></div>
    <div class="col-md-7 homepage-workshops__content">
    <h2 class="section-header"><?php esc_html_e(get_field('homepage_header_workshops_header'), 'saulkrasti-jazz-festival') ?></h2>

        <div class="ig-card ig-card--text-content ig-card__inner-padding">
    <div class="ig-card__line-high">
    <?php echo wp_kses_post(wpautop(get_field('homepage_about_workshops_short_text'))) ?>



    </div>

        </div>
        <div class="btn-wrapper-80__right btn-wrapper-80__right--change-to-left my-5">
    
    <button class="btnc btnc-brand-square"><a href="<?php echo ig_saulkrasti_jazz_get_page_url('page-about')?>"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a> </button>

</div>
    </div>
</div>