<?php
if (!empty(get_field('homepage_hero__important_message'))) :?>
<div class="hero__important-message <?php echo get_field('homepage_hero__important_message_font_type') === 'normal' ? '' : "hero__important-message--christmas-font" ?> ">

    <?php echo get_field('homepage_hero__important_message') ?>

</div>

<?php    
endif;
