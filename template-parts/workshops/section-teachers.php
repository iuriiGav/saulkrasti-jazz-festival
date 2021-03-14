<div class="section-with-side-links">

<div class="side-links__wrapper">
<ul class="side-links__list">
<?php

if( have_rows('teachers_available_masterclass_instrument_options') ):

    while( have_rows('teachers_available_masterclass_instrument_options') ) : the_row(); 

        $instrument = get_sub_field('instrument_name');

        ?>
<li class="side-links__item "><a href=""><?php esc_html_e($instrument, 'saulkrasti-jazz-festival') ?></a> </li>

<?php
    endwhile;


endif;

?>

</ul>
</div>

<h2 class="content-box__header section-header d-md-only"><?php esc_html_e(get_field('teachers_section_header'), 'saulkrasti-jazz-festival') ?></h2>

<div class="content-box">
    <h2 class="content-box__header section-header md-none"><?php esc_html_e(get_field('teachers_section_header'), 'saulkrasti-jazz-festival') ?></h2>

<div class="content-card">


<?php

if( have_rows('teachers_teachers_content') ):

    while( have_rows('teachers_teachers_content') ) : the_row(); 

        $teacher_photo = get_sub_field('teacher_photo');
        $teacher_name = get_sub_field('teacher_name');
        $teacher_instrument = get_sub_field('teacher_instrument');
        $teacher_bio = get_sub_field('teacher_bio');
        $teacher_link = get_sub_field('teacher_link');

        ?>

<?php
    endwhile;


endif;

?>


    <img class="img-fluid content-card__photo"  src="<?php echo esc_url(wp_get_attachment_image_src($teacher_photo, 'ig-blog')[0]) ?>" alt="<?php esc_html_e(get_post_meta($teacher_photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
    <h4 class="uppercase content-card__name"><?php esc_html_e($teacher_name, 'saulkrasti-jazz-festival') ?></h4>
  <div class="content-card__text">
      <?php echo wp_kses_post(wpautop($teacher_bio)) ?>

  </div>

  <div class="content-card__btn btnc btnc-brand"><a href="<?php echo esc_url($teacher_link)?>" target="_blank"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?> </a></div>
</div>


</div>
</div>