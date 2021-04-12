<div  class="section-with-side-links section-with-side-links__reversed">

    <div class="side-links__wrapper side-links__wrapper--height">

        <ul class="side-links__list side-links__list--fixed-height side-links__list--col ig_transition-all">
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

    <h2 class="content-box__header section-header section-header--less-padding d-md-only"><?php esc_html_e(get_field('application_section_header'), 'saulkrasti-jazz-festival') ?></h2>

    <div  class="content-box">
        <h2 class="content-box__header section-header section-header--less-padding md-none"><?php esc_html_e(get_field('application_section_header'), 'saulkrasti-jazz-festival') ?></h2>
        <?php if(get_field('options_masterclasses_happening', 'options') === 'false') : ?>
<?php get_template_part('template-parts/workshops/warning') ?>
        <?php endif; ?>
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