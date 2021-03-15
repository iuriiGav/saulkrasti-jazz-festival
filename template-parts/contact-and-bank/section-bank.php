<?php 
$page_buttons_ID = ig_saulkrasti_jazz_get_id_of_page_by_template('page-buttons');

if (have_rows('bank_account_details', $page_buttons_ID[0])) :

    while (have_rows('bank_account_details', $page_buttons_ID[0])) : the_row(); ?>

        <p class="quick-links__address-line"><?php esc_html_e(get_sub_field('line'), 'satiksanos-saulkrastos') ?></p>
<?php

    endwhile;


endif; ?>