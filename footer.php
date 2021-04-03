<?php wp_footer(); ?>

<footer class="main-footer position-relative">


    <section class="footer-sponsors">


        <!-- <h2 class="section-header"><?php esc_html_e(get_field('homepage_header_our_partners_header', get_option('page_on_front')), 'saulkrasti-jazz-festival') ?></h2> -->

        <div class="sponsors-container">

            <?php

            // Check rows exists.
            if (have_rows('options_festival_sponsors', 'options')) :

                // Loop through rows.
                while (have_rows('options_festival_sponsors', 'options')) : the_row(); ?>
                        <a target="_blank" href="<?php echo  esc_url(get_sub_field('link')) ?>" class="sponsor-logo__link">
                    <div class="sponsor-logo-wrap <?php echo get_sub_field('main_partner') === 'true' ? 'main-partner' : null ?>">
                            <img src="<?php echo esc_url(wp_get_attachment_image_src(get_sub_field('logo'), 'full')[0]) ?>" alt="" class="sponsor-logo__link--img">

                        </div>
                    </a>


            <?php

                endwhile;
            endif; ?>

        </div>

    </section>

    <div class="footer-hr">
        <hr>
    </div>
    <section class="quick-links">

        <div class="row">

            <div class="col-md-3 col-xs-6 quick-links__logo-addresses position-relative">
                <div class="quick-links__logo">
                    <a class="navbar-brand d-flex flex-column text-font-secondary"  href="<?php echo get_home_url() ?>">

                        <img src="<?php echo esc_url(wp_get_attachment_image_src(get_field('options_website_logo_secondary', 'options'), 'square')[0]) ?>" alt="" class="footer-nav-logo">
                    </a>
                </div>

                <div class="top-scrollerx--container">

    <div class="top-scrollerx js-top-scrollerx svg-icons">
        <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M6.101 261.899L25.9 281.698c4.686 4.686 12.284 4.686 16.971 0L198 126.568V468c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12V126.568l155.13 155.13c4.686 4.686 12.284 4.686 16.971 0l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L232.485 35.515c-4.686-4.686-12.284-4.686-16.971 0L6.101 244.929c-4.687 4.686-4.687 12.284 0 16.97z"></path></svg>
    </div>
    
</div>
            </div><!-- .quick-links__logo-addresses -->

            <div class="col-md-6 md-none quick-links__nav-menu">

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto flex-nowrap nav-fill ig-footer-navbar %2$s">%3$s</ul>',
                    'depth' => 2,
                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>




            </div>

            <div class="col-md-3 col-xs-6 quick-links__address-bank-details">
                <div class="quick-links__info">
                    <div class="quick-links__address">

    <?php 
    
    get_template_part('template-parts/contact-and-bank/section', 'address', array('in_footer' => 'true')); ?>
                      
                    <p class="quick-links__address-line "><a class="t-brand" href="mailto: <?php esc_html_e(get_field('options_festival_email', 'options'), 'saulkrasti-jazz-festival') ?>"><?php esc_html_e(get_field('options_festival_email', 'options'), 'saulkrasti-jazz-festival') ?></a> </p>
                    <p><a href="tel:<?php echo  ig_gav_get_global_text('global_phone_number') ?>"><?php echo ig_gav_get_global_text('global_phone_number')?></a></p>
                    <br>

                    </div>



<div class="footer-social-icons">
    <?php get_template_part('template-parts/social-links/social', 'facebook'); ?>
    <?php get_template_part('template-parts/social-links/social', 'youtube'); ?>

</div>
</div>

               

            </div>

        </div><!-- .row -->
    </section>

    <section class="footer-copyrights">

        <p class="copyright-text"><?php esc_html_e(get_field('options_copyright_text', 'options'), 'saulkrasti-jazz-festival') ?> <?php echo date("Y"), ' ', '|', ' ', esc_html_e(get_field('options_website_developed_by_text', 'options'), 'saulkrasti-jazz-festival') ?> <a href="<?php echo esc_url(get_field('options_developer_link', 'options')) ?>"><?php esc_html_e(get_field('options_developer_name', 'options'), 'saulkrasti-jazz-festival') ?></a></p>
    </section>


</footer>


</div><!-- .container-fluid -->


</body>

</html>