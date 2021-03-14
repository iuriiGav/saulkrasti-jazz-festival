<div class="section-with-side-links section-with-side-links__reversed">

    <div class="side-links__wrapper">

        <ul class="side-links__list">
            <?php

            if (have_rows('application_content_sections')) :

                while (have_rows('application_content_sections')) : the_row();

                    $section_header = get_sub_field('section_header');
                  


            ?>


                    <li class="side-links__item "><a href=""><?php esc_html_e($section_header, 'saulkrasti-jazz-festival') ?></a> </li>
            <?php
                endwhile;


            endif;

            ?>

        </ul>
    </div>

    <h2 class="content-box__header section-header d-md-only"><?php esc_html_e(get_field('application_section_header'), 'saulkrasti-jazz-festival') ?></h2>

    <div class="content-box">
        <h2 class="content-box__header section-header md-none"><?php esc_html_e(get_field('application_section_header'), 'saulkrasti-jazz-festival') ?></h2>

        <?php

if (have_rows('application_content_sections')) :

    while (have_rows('application_content_sections')) : the_row();

        $section_content = get_sub_field('section_content');


?>
        <div class="content-card mb-5">







            <img class="img-fluid content-card__photo" src="<?php echo esc_url(wp_get_attachment_image_src($teacher_photo, 'ig-blog')[0]) ?>" alt="<?php esc_html_e(get_post_meta($teacher_photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
            <h4 class="uppercase content-card__name"><?php esc_html_e($teacher_name, 'saulkrasti-jazz-festival') ?></h4>
            <div class="content-card__text">
                <?php echo wp_kses_post(wpautop( $section_content)) ?>

            </div>

        
        
       
        </div>
        <?php
                endwhile;


            endif;

            ?>

    </div>



</div>