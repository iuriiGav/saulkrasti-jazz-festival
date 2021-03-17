<div class="contacts-container row">

<div class="col-md-5"></div>
<div class="col-md-7">
    <div class="content-card">
    <?php get_template_part('template-parts/contact-and-bank/section', 'address'); ?>
    <h5 class="email-contact"><a class="t-brand" href="mailto: <?php esc_html_e(get_field('options_festival_email', 'options'), 'saulkrasti-jazz-festival') ?>"><?php esc_html_e(get_field('options_festival_email', 'options'), 'saulkrasti-jazz-festival') ?></a> </h5>
<div class="contact-us-bank-details">

    <?php get_template_part('template-parts/contact-and-bank/section', 'bank'); ?>

</div>
  
    </div>

</div>



</div>