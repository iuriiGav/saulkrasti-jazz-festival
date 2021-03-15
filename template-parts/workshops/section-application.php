<div class="section-with-side-links section-with-side-links__reversed">

    <div class="side-links__wrapper">

        <ul class="side-links__list">
            <?php

            if (have_rows('application_content_sections')) :

                while (have_rows('application_content_sections')) : the_row();
                    $i++;
                    $section_header = get_sub_field('section_header');



            ?>


                    <li class="side-links__item "><a class="side-link--target" id="application-section-<?php echo $i ?>" href=""><?php esc_html_e($section_header, 'saulkrasti-jazz-festival') ?></a> </li>
            <?php
                endwhile;


            endif;

            ?>

        </ul>
    </div>

    <h2 class="content-box__header section-header d-md-only"><?php esc_html_e(get_field('application_section_header'), 'saulkrasti-jazz-festival') ?></h2>

    <div id="application-section-target" class="content-box">
        <h2 class="content-box__header section-header md-none"><?php esc_html_e(get_field('application_section_header'), 'saulkrasti-jazz-festival') ?></h2>

        <?php

        if (have_rows('application_content_sections')) :

            while (have_rows('application_content_sections')) : the_row();
                $j++;

                $section_content = get_sub_field('section_content');


        ?>

                <div class="content-card content-card__relative content-card__hidden application-section-<?php echo $j ?> mb-5 "  data-application="application-section-<?php echo $j ?>">








                    <div class="content-card__text">
                        <?php echo wp_kses_post(wpautop($section_content)) ?>

                    </div>
                   




                </div>

                
        <?php
            endwhile;


        endif;

        ?>

    </div>



</div>