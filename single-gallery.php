<?php get_header(); ?>

<div id="ig_gav-loader" class="ig_loading-spinner"></div>
<section class="single-gallery">
    <h2 class="section-header section-header--less-padding  pb-4 mt-5rem"><?php echo get_field('gallery_name') ? get_field('gallery_name') : ig_gav_get_global_text('global_gallery_heading') . ' ' . esc_html__(get_field('post_gallery_gallery_year'), 'saulkrasti-jazz-festival') ?></h2>

    <?php the_field('gallery_shortcode') ?>


</section>

<script>

    
    document.onreadystatechange = function() {



        if (document.readyState !== "complete") {
            document.querySelector(
                ".modula").style.visibility = "hidden";
            document.querySelector(
                "#ig_gav-loader").style.visibility = "visible";
        } else {
            document.querySelector(
                "#ig_gav-loader").style.display = "none";
            document.querySelector(
                ".modula").style.visibility = "visible";
        }


    };
</script>


<?php get_footer(); ?>