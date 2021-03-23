<div class="row">
    <div class="col-xl-7 workshop__camp-text-container">
        <div class="ig-card  ig-card__100  ig-card__inner-padding">

<div class="workshop__camp-text ig-card__line-high">
<?php echo wp_kses_post(wpautop(get_field('workshop_workshop_camp_text'))) ?>

</div>

  
        </div>
    </div>
    <div class="col-xl-5 workshop__camp-image-container ">

  <?php the_field('workshop_camp_gallery_shortcode') ?>

    </div>
   
</div>
