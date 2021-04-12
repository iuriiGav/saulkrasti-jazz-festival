<div class="row">
    <h2 class="section-header section-header--less-padding"><?php esc_html_e(get_field('participation_fee_header'), 'saulkrasti-jazz-festival') ?></h2>
    <?php if(get_field('options_masterclasses_happening', 'options') === 'false') : ?>
<?php get_template_part('template-parts/workshops/warning') ?>
        <?php endif; ?>
    <div class="ig-card__line-high ig-card__just-content">
        <?php echo wp_kses_post(wpautop(get_field('participation_fee_text'))) ?>
    </div>

    <div class="row price-cards__wrapper">


        <?php

        if (have_rows('participation_fee_price_card')) :

            while (have_rows('participation_fee_price_card')) : the_row();

                $title = get_sub_field('title');
                $note = get_sub_field('note');
                $price = get_sub_field('price');
                $details = get_sub_field('details');

        ?>


                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="price-cards__card">
                        <div class="price-cards__header">
                            <h3><?php esc_html_e($title, 'saulkrasti-jazz-festival') ?></h3>
                        </div>
                        <hr class="price-cards__hr">
                        <div class="price-cards__note">
                            <h6 class="ig-h7"><?php esc_html_e($note, 'saulkrasti-jazz-festival') ?></h6>
                        </div>
                        <div class="price-cards__price">
                            <h2><?php esc_html_e($price, 'saulkrasti-jazz-festival') ?><span>€</span></h2>
                        </div>
                        <div class="price-cards__details">
                            <p><?php esc_html_e($details, 'saulkrasti-jazz-festival') ?></p>
                        </div>
                        <!-- <div class="price-cards__link"><h3><?php echo ig_gav_get_global_text('btn_text_apply') ?></h3></div> -->
                        
                        <!-- <div class="price-cards__link"><h3><a href="#application-section-target"><?php echo ig_gav_get_global_text('btn_text_apply') ?></a></h3></div> -->
                    </div>
                </div>

        <?php
            endwhile;


        endif;

        ?>


    </div>

    <div class="ig-card__line-high ig-card__just-content">
        <?php echo wp_kses_post(wpautop(get_field('participation_fee_text_extra'))) ?>
    </div>
</div>