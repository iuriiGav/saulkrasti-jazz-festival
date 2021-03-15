<div class="row">
<div class="col-4 about-workshops__image-container">






<div class="about-workshops__images">

    
    <?php if (have_rows('about_workshops_small_gallery')) : while (have_rows('about_workshops_small_gallery')) : the_row();
                        $image = get_sub_field('image');
                        $i++;
                        ?>


<img class="about-workshops__image-<?php echo $i;?>" src="<?php ig_gav_get_medium_image($image) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
<?php endwhile;
                endif; ?>


</div>







</div>
    <div class="col-xl-8 col-lg-8">
        <div class="ig-card ig-card__80 ig-card__inner-padding ">

            <div class="workshop__camp-text ig-card__line-high">
                <?php echo wp_kses_post(wpautop(get_field('about_workshops_text'))) ?>

            </div>


        </div>
    </div>
</div>