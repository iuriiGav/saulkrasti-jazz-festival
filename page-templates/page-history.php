<?php 

/*
* Template Name: Festival History
*/
get_header(); ?>



<section class="current-year-artists full-screen-cover" style="background:  linear-gradient(180deg, #141211 0%, rgba(49, 39, 35, 0.84) 100%), url(<?php ig_saulkrasti_jazz_image_from_field('options_page_artists_cover_image', 'options')
                                                                                                    ?>)">
<h2 class="section-header mt-5rem"><?php esc_html_e(get_field('page_artists_header'), 'saulkrasti-jazz-festival') ?></h2>



<?php


$args = array(

    'post_type' => 'artists',
    'posts_per_page' => 30,
    'meta_query'	=> array(
        'key'		=> 'years_in_which_this_artist_participated_$_year_of_participation',
        'compare'	=> '=',
        'value'		=> '2018',
    )



);

$current_festival_artists = new WP_Query($args); ?>

<?php
  echo '<pre>';
 var_dump($current_festival_artists);
  echo '</pre>';
?>

<div class="row">
<?php
while($current_festival_artists->have_posts()): $current_festival_artists->the_post(); 
$artist_name = get_field('post_artists_artist_name');
$artist_country = get_field('post_artists_country');
$artist_photo = get_field('post_artists_artists_photo');
?>

<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-5">

<div class="card-artist card-artist--wide">

        <div class="card-artist__image">
            <img src="<?php echo esc_url(wp_get_attachment_image_src($artist_photo, 'ig-square')[0]) ?>" alt="<?php esc_html_e(get_post_meta($photo, '_wp_attachment_image_alt', TRUE), 'saulkrasti-jazz-festival') ?>">

        </div>
        <div class="card-artist__text card-artist__text--flex ">
            <h4 class="text-center"><?php esc_html_e($artist_name, 'saulkrasti-jazz-festival') ?></h4>
            <h6 class="text-center t-gray"><?php esc_html_e($artist_country, 'saulkrasti-jazz-festival') ?></h6>
            <a href="<?php the_permalink() ?>" class="btnc btnc-underlined mb-2"><?php echo ig_gav_get_global_text('btn_text_learn_more') ?></a>


        </div>

</div>
</div>

<?php endwhile; wp_reset_postdata(); ?>

</div>
</section>



<h5 style='color: red; font-style: italic;'> <?php echo 'this is from ' . basename(__FILE__); ?></h5>
<?php get_footer(); ?>