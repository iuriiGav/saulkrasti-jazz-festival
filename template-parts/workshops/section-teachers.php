<div class="section-with-side-links">

<div class="side-links__wrapper side-links__wrapper--height">
<ul class="side-links__list side-links__list--col">
<?php

if( have_rows('teachers_available_masterclass_instrument_options') ):

    while( have_rows('teachers_available_masterclass_instrument_options') ) : the_row(); 
        $i_g++;
        $instrument = get_sub_field('instrument_name');

        ?>
<li class="side-links__item "><a class="side-link--target-instrument" id="instrument-<?php echo $i_g?>" href=""><?php esc_html_e($instrument, 'saulkrasti-jazz-festival') ?></a> </li>

<?php
    endwhile;


endif;

?>

</ul>
</div>

<h2 class="content-box__header section-header section-header--less-padding d-md-only"><?php esc_html_e(get_field('teachers_section_header'), 'saulkrasti-jazz-festival') ?></h2>

<div class="content-box">
    <h2 class="content-box__header section-header section-header--less-padding md-none"><?php esc_html_e(get_field('teachers_section_header'), 'saulkrasti-jazz-festival') ?></h2>

    
    
<?php

if( have_rows('teachers_teachers_content') ):
    
    while( have_rows('teachers_teachers_content') ) : the_row(); 
    $j_g++;
    $teacher_photo = get_sub_field('teacher_photo');
    $teacher_name = get_sub_field('teacher_name');
    $teacher_instrument = get_sub_field('teacher_instrument');
    $teacher_bio = get_sub_field('teacher_bio');
    $teacher_link = get_sub_field('teacher_link');
    
    ?>



<div class="content-card content-card__hidden--reverse content-card__relative instrument-<?php echo $j_g?>" data-instrument="instrument-<?php echo $j_g?>">
<div class="content-card__photo-container">

<?php 
$img_width = wp_get_attachment_metadata($teacher_photo)['width'];
$img_height = wp_get_attachment_metadata($teacher_photo)['height'];

if($img_width >= $img_height) :
?>
    <img class="img-fluid content-card__photo"  src="<?php echo esc_url(wp_get_attachment_image_src($teacher_photo, 'ig-blog')[0]) ?>" alt="<?php esc_html_e(get_post_meta($teacher_photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

<?php 
else :
?>
<img class="img-fluid content-card__photo"  src="<?php echo esc_url(wp_get_attachment_image_src($teacher_photo, 'ig-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta($teacher_photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

<?php endif; ?>


</div>
    <h4 class="uppercase content-card__name"><?php esc_html_e($teacher_name, 'saulkrasti-jazz-festival') ?></h4>
  <div class="content-card__text ">
      <?php echo wp_kses_post(wpautop($teacher_bio)) ?>

  </div>

<?php if($teacher_link) : ?>
    <div class="content-card__btn btnc btnc-brand"><a href="<?php echo esc_url($teacher_link)?>" target="_blank"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?> </a></div>
    <?php endif; ?>
    
</div>
  <?php
    endwhile;


endif;

?>


</div>
</div>