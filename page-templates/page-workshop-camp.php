<?php
/* 
* Template Name: Workshop Camp
*/
get_header(); 

$about_workshops_name = get_bloginfo("language") === 'en-GB' ? 'about-workshops' : 'meistarklases';
$about_camp_name = get_bloginfo("language") === 'en-GB' ? 'workshops-camp' : 'nometne';
$about_teachers_name = get_bloginfo("language") === 'en-GB' ? 'teachers' : 'pasniedzeji';
$about_payment_name = get_bloginfo("language") === 'en-GB' ? 'payment' : 'dalibas-maksa';
$about_application_name = get_bloginfo("language") === 'en-GB' ? 'application' : 'pieteiksanas';


?>
<main class="page-workshops-no-overflow">

<section id="<?php echo $about_workshops_name ?>" class="about-workshops mt-5rem full-screen-cover ig_scroll-margin-workshops" style="background-color: var(--color-dark)">
    <h2 class="section-header section-header--less-padding"><?php esc_html_e(get_field('about_workshops_header'), 'saulkrasti-jazz-festival') ?></h2>
    <?php get_template_part('template-parts/workshops/section', 'about-workshops'); ?>

</section>

<?php if(get_field('options_content_show_masterclasses_camp_section', 'options') === 'true') : ?>

<section id="<?php echo $about_camp_name?>" class="workshop__camp full-screen-cover ig_scroll-margin-workshops" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_workshop_page_workshop_camp_cover', 'options')
                                                                                                                                            ?>)">
    <h2 class="section-header section-header--less-padding"><?php esc_html_e(get_field('workshop_workshop_camp_header'), 'saulkrasti-jazz-festival') ?></h2>
    <?php get_template_part('template-parts/workshops/section', 'workshop-camp'); ?>

</section>

<?php else: ?>
    <?php the_field('workshop_camp_gallery_shortcode') ?>

<?php endif; ?>

<?php if(get_field_object('teachers_show_section')['value'] === 'true') : ?>
<!-- <section class="workshop__teachers full-screen-cover full-screen-cover__static" style="background-image: url(<?php ig_saulkrasti_jazz_image_from_field('options_workshop_page_teachers_cover', 'options')
                                                                                                                                            ?>)">
    <?php get_template_part('template-parts/workshops/section', 'teachers'); ?>
option with bg-image
</section> -->


<section id="<?php echo  $about_teachers_name?>" class="workshop__teachers full-screen-cover full-screen-cover__static ig_scroll-margin-workshops" style="background-color: var(--color-dark)">
    <?php get_template_part('template-parts/workshops/section', 'teachers'); ?>

</section>

<?php endif; ?>



<?php if(get_field('options_content_show_mastercalss_participation_fee', 'options') === 'true') : ?>

<section id="<?php echo $about_payment_name?>"  class="participation-fee full-screen-cover ig_scroll-margin-workshops" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_workshop_page_participation_fee_cover', 'options')
                                                                                                                                            ?>)">>

<?php get_template_part('template-parts/workshops/section', 'participation-fee'); ?>

</section>

<?php endif; ?>

<?php if(get_field('options_content_show_masterclasses_application_sections', 'options') === 'true') : ?>

<section id="<?php echo $about_application_name?>" class="participation-fee full-screen-cover full-screen-cover ig_scroll-margin-workshops" style="background-color: var(--color-dark)">>

<?php get_template_part('template-parts/workshops/section', 'application'); ?>

</section>

<?php endif; ?>

</main>


<?php get_footer(); ?>
