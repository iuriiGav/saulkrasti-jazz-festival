<?php
if (!empty(get_field('homepage_hero__important_message'))) :?>
<div class="hero__important-message">

    <?php echo get_field('homepage_hero__important_message') ?>

</div>

<?php    
endif;
