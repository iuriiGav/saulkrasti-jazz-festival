<div class="sidebar-card">


<?php if(get_field('post_events_concert_image')) : ?>
<div class="sidebar-card__image" style="background-image: url('<?php echo esc_url(wp_get_attachment_image_src(get_field('post_events_concert_image'), 'ig-square')[0]) ?>')">
</div>


<?php else : ?>
<div class="sidebar-card__image" style="background-image: url('<?php echo esc_url(wp_get_attachment_image_src(get_field('options_backup_events_image', 'options'), 'ig-square')[0]) ?>')">
</div>
<?php endif; ?>

<div class="sidebar-card__content">

<div class="sidebar-card__date-time">
    <h5><?php echo $date_arr[0], ' ', $date_arr[1] ?></h5>
    <h5><?php esc_html_e(get_field('post_events_concert_time'), 'saulkrasti-jazz-festival') ?></h5>
</div>
<div class="sidebar-card__venue">

<?php if(get_field('post_venues_venue_title',$concert_venue_ID)) : ?>

    <?php esc_html_e(get_field('post_venues_venue_title', $concert_venue_ID), 'saulkrasti-jazz-festival') ?>

    <?php else : ?>

    <?php esc_html_e(get_field('post_venues_venue_name', $concert_venue_ID), 'saulkrasti-jazz-festival') ?>

        <?php endif; ?>

</div>
<div class="sidebar-card__read-more">
<a href="<?php the_permalink() ?>" class="btnc btnc-underlined btnc-xs"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a>
</div>

<?php if(get_field('post_events_link_to_ticket_sale')) : ?>
<div class="sidebar-card__get-ticket">

<a href="<?php echo esc_url(get_field('post_events_link_to_ticket_sale')) ?>" class="btnc btnc-sm btnc-dark mb-2"><?php echo ig_gav_get_global_text('btn_text_get_ticket') ?></a>
</div>

<?php endif; ?>

</div>
</div><!-- .sidebar-card -->