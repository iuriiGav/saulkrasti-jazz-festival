<div class="contacts-container row">

<div class="col-md-7" >
    <div class="contact-us-image" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src(get_field('contact_us_image_contact_info_section'), 'full')[0]) ?>); ">

    </div>
<!-- <img src="<?php echo esc_url(wp_get_attachment_image_src(get_field('contact_us_image_contact_info_section'), 'ig-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta(get_field('contact_us_image_contact_info_section'), '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>"> -->


</div>
<div class="col-md-5">
    <div class="content-card">
    <?php get_template_part('template-parts/contact-and-bank/section', 'address'); ?>
    <h5 class="email-contact"><a class="t-brand" href="mailto: <?php esc_html_e(get_field('options_festival_email', 'options'), 'saulkrasti-jazz-festival') ?>"><?php esc_html_e(get_field('options_festival_email', 'options'), 'saulkrasti-jazz-festival') ?></a> </h5>

    
<p><a href="tel:<?php echo  ig_gav_get_global_text('global_phone_number') ?>"><?php echo ig_gav_get_global_text('global_phone_number')?></a></p>
    <div class="contact-us-bank-details">

    <?php get_template_part('template-parts/contact-and-bank/section', 'bank'); ?>

</div>
  
    </div>

</div>



</div>