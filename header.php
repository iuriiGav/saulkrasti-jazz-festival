<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-194797845-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-194797845-1');
    </script>

    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>


    <div class="container-fluid">
        <nav class="navbar smart-scroll navbar-expand-lg bgc-dark">
            <div class="container-fluid navbar-wrapper">

                <a class="navbar-brand d-flex flex-column text-font-secondary" href="<?php echo get_home_url() ?>">

                    <img src="<?php echo esc_url(wp_get_attachment_image_src(get_field('options_website_logo_secondary', 'options'), 'square')[0]) ?>" alt="" class="main-nav-logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mobile-nav__icon-bar"></span>
                    <span class="mobile-nav__icon-bar"></span>
                    <span class="mobile-nav__icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse" id="main-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto flex-nowrap nav-fill ig-main-navbar %2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    ));
                    ?>
                    <div class="header-social-icons__in-collapse d-lg-only">
                        <?php get_template_part('template-parts/social-links/social', 'facebook'); ?>
                        <?php get_template_part('template-parts/social-links/social', 'youtube'); ?>

                    </div>
                </div>
                <div class="header-social-icons d-lg-none--flex">
                    <?php get_template_part('template-parts/social-links/social', 'facebook'); ?>
                    <?php get_template_part('template-parts/social-links/social', 'youtube'); ?>

                </div>
            </div>
        </nav>