<?php


$page_buttons_ID = ig_saulkrasti_jazz_get_id_of_page_by_template('page-buttons');


if (have_rows('festival_official_address_and_bank', $page_buttons_ID[0])) :
$i = 0;
    while (have_rows('festival_official_address_and_bank', $page_buttons_ID[0])) : the_row(); 
$i++
?>
<?php 


if($args['in_footer'] === 'true') :

?>

<?php if($i < 4) : ?>
        <p class="quick-links__address-line"><?php esc_html_e(get_sub_field('line'), 'saulkrasti-jazz-festival') ?></p>

        <?php 
    endif;
    else: ?>

            <p class="quick-links__address-line"><?php esc_html_e(get_sub_field('line'), 'saulkrasti-jazz-festival') ?></p>

            <?php endif ?>
<?php

    endwhile;


endif;
?>