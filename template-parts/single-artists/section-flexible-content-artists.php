<div class="single-artist__content">


    <?php
    $col_size = 'col-lg-6';
    $col_size2 = 'col-lg-6';

    // Check value exists.
    if (have_rows('post_artists_flexible_content')) :

        // Loop through rows.
        while (have_rows('post_artists_flexible_content')) : the_row();

            // Case: Paragraph layout.
            if (get_row_layout() == 'full_screen_text_block') :
                $text = get_sub_field('full_screen_text'); ?>
                <div class="single-artist__bio-container">

                    <div class="single-artist__bio">
                        <?php echo $text; ?>
                    </div>

                </div>

            <?php
            // Case: Download layout.
            elseif (get_row_layout() == 'full_screen_image') :
                $full_screen_image = get_sub_field('image');
                echo      '<img class="ig_w-100" src="' . esc_url(wp_get_attachment_image_src($full_screen_image, 'ig-medium')[0]) . '" alt="' . esc_html__(get_post_meta($full_screen_image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') . '">';

            elseif (get_row_layout() == 'full_screen_video') :
                $full_screen_video = get_sub_field('video_url'); ?>

                <div class="videoWrapper">
                    <?php echo $full_screen_video ?>
                </div>
            <?php
            elseif (get_row_layout() == 'text_left_image_right') :
                $text_left = get_sub_field('text_left', false, false);
                $image_right = get_sub_field('image_right');

            ?>

                <div class="row single-artist__bio">
                    <p> <?php echo ig_gav_get_image_depending_on_aspect_ratio_for_floats($image_right, 'flexible-content-floats--right', 'float-right'), $text_left ?>
                    </p>

                </div>

            <?php

            elseif (get_row_layout() == 'image_left_text_right') :
                $text_right = get_sub_field('text_right', false, false);
                $image_left = get_sub_field('image_left');

            ?>
 <div class="row single-artist__bio">
                    <p> <?php echo ig_gav_get_image_depending_on_aspect_ratio_for_floats($image_left, 'flexible-content-floats--left', 'float-left'), $text_right ?>
                    </p>

                </div>
<?php
      
            endif;

        // End loop.
        endwhile;

    // No value.
    else :
    // Do something...
    endif;
    ?>


</div>