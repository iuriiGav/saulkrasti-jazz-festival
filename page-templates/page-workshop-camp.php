<?php
/* 
* Template Name: Workshop Camp
*/
get_header(); ?>

<section class="about-workshops mt-5rem full-screen-cover" style="background-color: var(--color-dark)">
    <h2 class="section-header"><?php esc_html_e(get_field('about_workshops_header'), 'saulkrasti-jazz-festival') ?></h2>
    <?php get_template_part('template-parts/workshops/section', 'about-workshops'); ?>

</section>


<section class="workshop__camp full-screen-cover" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_workshop_page_workshop_camp_cover', 'options')
                                                                                                                                            ?>)">
    <h2 class="section-header"><?php esc_html_e(get_field('workshop_workshop_camp_header'), 'saulkrasti-jazz-festival') ?></h2>
    <?php get_template_part('template-parts/workshops/section', 'workshop-camp'); ?>

</section>


<?php if(get_field_object('teachers_show_section')['value'] === 'true') : ?>
<!-- <section class="workshop__teachers full-screen-cover full-screen-cover__static" style="background-image: url(<?php ig_saulkrasti_jazz_image_from_field('options_workshop_page_teachers_cover', 'options')
                                                                                                                                            ?>)">
    <?php get_template_part('template-parts/workshops/section', 'teachers'); ?>
option with bg-image
</section> -->


<section class="workshop__teachers full-screen-cover full-screen-cover__static" style="background-color: var(--color-dark)">
    <?php get_template_part('template-parts/workshops/section', 'teachers'); ?>

</section>

<?php endif; ?>

<section  class="participation-fee full-screen-cover" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_workshop_page_participation_fee_cover', 'options')
                                                                                                                                            ?>)">>

<?php get_template_part('template-parts/workshops/section', 'participation-fee'); ?>

</section>

<section id="application-section-target" class="participation-fee full-screen-cover full-screen-cover" style="background-color: var(--color-dark)">>

<?php get_template_part('template-parts/workshops/section', 'application'); ?>

</section>

<?php get_footer(); ?>