

  <?php

if (have_rows('baltic_drummers_league__drummers_league_first_round_participants_from_various_countries')) :

    while (have_rows('baltic_drummers_league__drummers_league_first_round_participants_from_various_countries')) : the_row();

        $section_heading = get_sub_field('heading');
        $text_about_this_round_and_country = get_sub_field('text_about_this_round_and_country');
        

?>
<h2 class="sub-section-header"><?php esc_html_e($section_heading, 'saulkrasti-jazz-festival') ?></h2>




<?php the_sub_field('participants_gallery'); ?>

<div class="row">

    <div class="col-12">


        <div class="content-card content-card__90">
            <?php echo wp_kses_post(wpautop($text_about_this_round_and_country)) ?>

        </div>

    </div>
</div>
<?php endwhile; endif;