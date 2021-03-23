<div class="row">

    <div class="col-xl-7 col-12 order-md-2   about-workshops__text-container">
        <div class="ig-card ig-card__100 ig-card__inner-padding ">

            <div class="workshop__camp-text ig-card__line-high">
                <?php echo wp_kses_post(wpautop(get_field('about_workshops_text'))) ?>

            </div>


        </div>
    </div>

    <div class="col-xl-5 col-12 order-md-1  about-workshops__image-container">

<!--  order-md-2 order-sm-2  order-xl-1 order-xs-2 -->




<div class="about-workshops__images">


<?php the_field('about_workshops_gallery_1_shortcode') ?>

    
    <!-- <?php if (have_rows('about_workshops_small_gallery')) : while (have_rows('about_workshops_small_gallery')) : the_row();
                        $image = get_sub_field('image');
                        $i++;
                        ?>


<img class="about-workshops__image-<?php echo $i;?>" src="<?php ig_gav_get_medium_image($image) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
<?php endwhile;
                endif; ?> -->


</div>





<!-- order-sm-1 order-md-1 order-xl-2 order-xs-1 -->

</div>
</div>