<?php get_header(); ?>
<section class=" ig_w-80 ig_mt-8rem">
<?php
if (get_the_content()) : ?>
        <div class="ig-card ig-card__100 ig-card__inner-padding">
            <div class="workshop__camp-text ig-card__line-high">
                <?php echo wp_kses_post(wpautop(get_the_content())); ?>
            </div>
        </div>
        <?php endif;
?>
</section>
<?php get_footer(); ?>