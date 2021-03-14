<?php wp_footer(); ?>

<footer class="main-footer">

    <section class="footer-sponsors">


        <h2 class="section-header"><?php esc_html_e(get_field('homepage_header_our_partners_header', get_option('page_on_front')), 'saulkrasti-jazz-festival') ?></h2>

        <div class="sponsors-container">

            <?php

            // Check rows exists.
            if (have_rows('options_festival_sponsors', 'options')) :

                // Loop through rows.
                while (have_rows('options_festival_sponsors', 'options')) : the_row(); ?>
                    <div class="sponsor-logo-wrap <?php echo get_sub_field('main_partner') === 'true' ? 'main-partner' : null ?>">
                        <a href="<?php echo  esc_url(get_sub_field('link')) ?>" class="sponsor-logo__link">
                            <img src="<?php echo esc_url(wp_get_attachment_image_src(get_sub_field('logo'), 'full')[0]) ?>" alt="" class="sponsor-logo__img">

                        </a>
                    </div>


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

            <div class="col-md-3 col-xs-6 quick-links__logo-addresses">
                <div class="quick-links__logo">
                    <a class="navbar-brand d-flex flex-column text-font-secondary" href="<?php echo get_home_url() ?>">

                        <img src="<?php echo esc_url(wp_get_attachment_image_src(get_field('options_website_logo_secondary', 'options'), 'square')[0]) ?>" alt="" class="footer-nav-logo">
                    </a>
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


                        $page_buttons_ID = ig_saulkrasti_jazz_get_id_of_page_by_template('page-buttons');


                        if (have_rows('festival_official_address_and_bank', $page_buttons_ID[0])) :

                            while (have_rows('festival_official_address_and_bank', $page_buttons_ID[0])) : the_row(); ?>

                                <p class="quick-links__address-line"><?php esc_html_e(get_sub_field('line'), 'satiksanos-saulkrastos') ?></p>
                        <?php

                            endwhile;


                        endif;
                        ?>
                    <p class="quick-links__address-line "><a class="t-brand" href="mailto: <?php esc_html_e(get_field('options_festival_email', 'options'), 'satiksanos-saulkrastos') ?>"><?php esc_html_e(get_field('options_festival_email', 'options'), 'satiksanos-saulkrastos') ?></a> </p>
                    <br>
                    </div>

<div class="quick-links__bank">

<?php if (have_rows('bank_account_details', $page_buttons_ID[0])) :

while (have_rows('bank_account_details', $page_buttons_ID[0])) : the_row(); ?>

    <p class="quick-links__address-line"><?php esc_html_e(get_sub_field('line'), 'satiksanos-saulkrastos') ?></p>
<?php

endwhile;


endif; ?>
</div>
</div>

               

            </div>

        </div><!-- .row -->
    </section>

    <section class="footer-copyrights">

        <p class="copyright-text"><?php esc_html_e(get_field('options_copyright_text', 'options'), 'satiksanos-saulkrastos') ?> <?php echo date("Y"), ' ', '|', ' ', esc_html_e(get_field('options_website_developed_by_text', 'options'), 'satiksanos-saulkrastos') ?> <a href="<?php echo esc_url(get_field('options_developer_link', 'options')) ?>"><?php esc_html_e(get_field('options_developer_name', 'options'), 'satiksanos-saulkrastos') ?></a></p>
    </section>
</footer>


</div><!-- .container-fluid -->
</body>

</html>