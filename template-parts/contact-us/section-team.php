<div class="row contacts-team-container">
<h2 class="section-header section-header--less-padding"><?php esc_html_e(get_field('contact_us_team_header'), 'saulkrasti-jazz-festival') ?></h2>


<?php

if( have_rows('contact_us_team') ):

    while( have_rows('contact_us_team') ) : the_row(); 

        $name = get_sub_field('name');
        $role = get_sub_field('role');
        $photo = get_sub_field('photo');

        ?>


<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-5">

<div class="card-artist card-artist--100">

        <div class="card-artist__image">
            <img src="<?php echo esc_url(wp_get_attachment_image_src($photo, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

        </div>
        <div class="card-artist__text card-artist__text--flex ">
            <h4 class="text-center"><?php esc_html_e($name, 'saulkrasti-jazz-festival') ?></h4>
            <h6 class="text-center t-gray"><?php esc_html_e($role, 'saulkrasti-jazz-festival') ?></h6>

        </div>

</div>
</div>




<?php
    endwhile;


endif;

?>



</div>