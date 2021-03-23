
<?php 

 
if(count($args['image_arr']) === 1) : 
    ig_gav_get_image_depending_on_aspect_ratio($args['image_arr'][0]);
    ?>
<?php elseif(count($args['image_arr']) === 0 && $args['video_link_when_no_pictures']): ?>

<div class="videoWrapper">

<?php echo $args['video_link_when_no_pictures']; ?>

</div>


    <?php else : ?>
       

        <div class="swiper-container swiper-container__mobile-horizonal">
        <div class="swiper-wrapper">


     




       

       <?php
foreach($args['image_arr'] as $image) : ?>

    <!-- Slides -->
    <div class="swiper-slide">
            <img src="<?php echo esc_url(wp_get_attachment_image_src($image, 'ig-portrait')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
        </div>

<?php
    endforeach;

        ?>
</div>

<!-- If we need navigation buttons -->
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>

<!-- If we need scrollbar -->
</div>




<?php endif; ?>