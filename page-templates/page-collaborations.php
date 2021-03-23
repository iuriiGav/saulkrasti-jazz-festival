<?php

/*
* Template Name: Collaborations
*/
get_header(); ?>

<section class="collaborations-content full-screen-cover" style="background: linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.44) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_collaborations_cover_image', 'options')
                                                                                                                                                    ?>)">

    <h2 class="section-header mt-5rem"><?php esc_html_e(get_field('collaboration_page_header'), 'saulkrasti-jazz-festival') ?></h2>




    <?php

    if (have_rows('collaborations_flexible_content')) :

        while (have_rows('collaborations_flexible_content')) : the_row();
            $i++;
            if (get_row_layout() == 'image_left_text_right') :
                $text_header = get_sub_field('text_header');
                $images =  get_sub_field('images');
                $text_sub_header =  get_sub_field('text_sub_header');
                $text_content =  get_sub_field('text_content');
                $website_links_to_format = array();
                $formated_web_links = array();
                $video_embed_link = get_sub_field('video_embed_link');



                if (have_rows('url_links')) :

                    while (have_rows('url_links')) : the_row();

                        $url = get_sub_field('url');

                        $trimmed_url =  trim($url);



                        array_push($website_links_to_format, $trimmed_url);
                    endwhile;


                endif;






                $images_array = array();
                $text_card_args = array(
                    'text_header' => $text_header,
                    'text_sub_header' => $text_sub_header,
                    'text_content' => $text_content,
                    'website_links_arr' => $website_links_to_format,
                    
                    
                );

                if (have_rows('images')) :

                    while (have_rows('images')) : the_row();

                        $image = get_sub_field('image');
                        array_push($images_array, $image);

                    endwhile;


                endif;


                $image_part_args = array('image_arr' => $images_array, 'video_link_when_no_pictures' => $video_embed_link);

    ?>



                <div class="collaborations__wrapper">
                    <section class="row collaborations__single-collab-container <?php echo $i % 2 === 0 ? 'ig_flex-row-reverse' : null; ?>">

                        <div class="collaborations__text-container col-md-7 ">
                            <?php get_template_part('template-parts/page-collaborations/partials/part', 'text-card', $text_card_args);  ?>



                        </div>

                        <div class="collaborations__image col-md-5 about-us-small-gallery">

                            <?php get_template_part('template-parts/page-collaborations/partials/part', 'image', $image_part_args);  ?>

                            <div class="ig-card ig-card--empty-card-tail-after-text-content d-md-only"></div>


                        </div>













                    </section>
                </div>








    <?php

            // Case: Download layout.
            elseif (get_row_layout() == 'text_left_image_right') :
                $file = get_sub_field('file');
            // Do something...

            endif;

        // End loop.
        endwhile;

    // No value.
    else :
    // Do something...
    endif;
    ?>


</section>





<?php get_footer(); ?>