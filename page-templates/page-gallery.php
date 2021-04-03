<?php get_header(); 
/* 
* Template Name: Gallery
*/

    $args = array(
        'post_type'      => 'gallery',
        'posts_per_page' => -1,
        'meta_key'       => 'post_gallery_gallery_year',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
     
    );
    
    $galleries = new WP_Query($args); ?>
<main class="page-gallery ">
<h2 class="section-header section-header--less-padding  pb-4 mt-5rem"><?php echo get_field('gallery_name') ? get_field('gallery_name') : ig_gav_get_global_text('global_gallery_heading') . ' ' . esc_html__(get_field('post_gallery_gallery_year'), 'saulkrasti-jazz-festival') ?></h2>
<div class="row page-galleries__container">

<?php
if($galleries->have_posts()) : while($galleries->have_posts()): $galleries->the_post(); 
$image = get_field('gallery_featured_image');
$gallery_name = get_bloginfo("language") === 'en-GB' ? get_field('gallery_name_in_english') : get_field('gallery_name');
$gallery_title = $gallery_name ? $gallery_name : ig_gav_get_global_text('global_gallery_heading') . ' ' . esc_html__(get_field('post_gallery_gallery_year'), 'saulkrasti-jazz-festival');
?>

    
    
    <div class="col-md-4 gallery-card__container d-flex">
        <a class="gallery-card__wrapper-link d-flex"  href="<?php the_permalink(); ?>">
        <div class="gallery-card">
        <img class="gallery-card__image" src="<?php echo esc_url(wp_get_attachment_image_src($image, 'ig-medium')[0]) ?>" alt="<?php esc_html_e(get_post_meta($image, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">
<h4 class="gallery-card__heading"><?php echo $gallery_title ?></h4>
        </div>
    </a>
    </div>






<?php endwhile; wp_reset_postdata(); endif; ?>
</div>

</main>







<?php get_footer(); ?>