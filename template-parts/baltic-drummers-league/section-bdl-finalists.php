
    <h4 class="section-header"><?php esc_html_e(get_field('this_previous_year_finalists_header'), 'saulkrasti-jazz-festival') ?></h4>

<div class="drum-league-finalists-container">

<?php

if (have_rows('baltic_drummers_league_finalists')) :

    while (have_rows('baltic_drummers_league_finalists')) : the_row();

        $i++;
        $name = get_sub_field('name');
        $biography = get_sub_field('biography');
        $photo = get_sub_field('photo');

?>
<a href="" class="card-artist modal-trigger-js " id="modal-number-<?php echo $i ?>">

        <div class="card-artist__image">
            <img src="<?php echo esc_url(wp_get_attachment_image_src($photo, 'ig-blog')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

        </div>
        <div class="card-artist__text">
            <h4 class="text-center"><?php esc_html_e($name, 'saulkrasti-jazz-festival') ?></h4>
        <!-- <?php echo wp_kses_post(wpautop($biography)) ?> -->

        </div>
</a>



<div class="modal modal__hidden  modal-drummers-league-js" data-modalnum="modal-number-<?php echo $i ?>">



<div class="modal__content modal__content--off-screen" data-modalcontent="modal-number-<?php echo $i ?>" >
    <div class="modal__close">&times;</div>
    <div class="">

    <div class="modal-content__image-center">
        <img src="<?php echo esc_url(wp_get_attachment_image_src($photo, 'ig-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

    </div>

            <div class="modal-content__text--pad">
            <h4 class="text-center popup__heading"><?php esc_html_e($name, 'saulkrasti-jazz-festival') ?></h4>
                <?php echo wp_kses_post(wpautop($biography)) ?>

            </div>

</div>

</div>



</div>

<?php
    endwhile;


endif;

?>



</div>
   