


<div class="ig-card ig-card--text-content ig-card__inner-padding">
    <div class="ig-card__line-high">


        <h5 class="collaborations__heading"><?php esc_html_e($args['text_header'], 'saulkrasti-jazz-festival') ?></h5>
        <h6 class="collaborations__subheading"><?php esc_html_e($args['text_sub_header'], 'saulkrasti-jazz-festival') ?></h6>
        <div class="collaborations__text">
            <?php echo wp_kses_post(wpautop($args['text_content'])) ?>

        </div>

        <?php 
   if (!empty($args['website_links_arr']) && is_array($args['website_links_arr'])  ) :


  
    foreach ($args['website_links_arr'] as $link) :

        $website_homepage = explode("/", $link, 3); ?>
            <a class="btnc btnc-underlined" href="<?php echo esc_url($link) ?>" target="_blank"><?php esc_html_e($website_homepage[2], 'saulkrasti-jazz-festival')  ?></a>

       
       <?php

    endforeach;
endif;
?>
            

    </div>

</div>