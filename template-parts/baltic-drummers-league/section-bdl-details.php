    <div class="row ">
        <div class="col-xxl-9 col-xl-8 col-lg-8 col-md-12  order-2 order-lg-1 bbl-text-container">


            <div class="content-card content-card__lg content-card__text-lg ">
                <?php echo wp_kses_post(wpautop(get_field('baltic_drammers_league_detailed_text'))) ?>

            </div>

        </div>

        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 order-1 order-lg-2 bbl-images">


        <h5 class="section-header ig_pl-0"><?php esc_html_e(get_field('this_previous_year_finalists_header'), 'saulkrasti-jazz-festival') ?></h5>

<div class="drum-league-finalists-container">

<?php

if (have_rows('baltic_drummers_league_finalists')) :

    while (have_rows('baltic_drummers_league_finalists')) : the_row();

        $i++;
        $name = get_sub_field('name');
        $biography = get_sub_field('biography');
        $photo = get_sub_field('photo');

?>
<a href="" class="card-artist card-artist--100 modal-trigger-js " id="modal-number-<?php echo $i ?>">

        <div class="card-artist__image">
            <img src="<?php echo esc_url(wp_get_attachment_image_src($photo, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

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
        <img src="<?php echo esc_url(wp_get_attachment_image_src($photo, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

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
   

        </div>


    </div>
