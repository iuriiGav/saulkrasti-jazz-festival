<?php 

add_action('wp_ajax_nopriv_getHistory', 'getHistory_ajax');
add_action('wp_ajax_getHistory', 'getHistory_ajax');

function getHistory_ajax(){
    $festivalQueryYear = $_POST['festivalQueryYear'];
    $page_template_url = ig_saulkrasti_jazz_get_page_url('page-templates/page-history');
$page_Id = url_to_postid($page_template_url);



  

    $query_args = array(

        'post_type' => 'artists',
        'posts_per_page' => -1,
        'tax_query' => array(
            array (
                'taxonomy' => 'year_of_participation',
                'field' => 'slug',
                'terms' => $festivalQueryYear
            )
        ),
       
        'meta_key'			=> 'post_artists_artist_name',
        'orderby'			=> 'meta_value',
        'order'				=> 'ASC'


    );

$args_artists = array(
    'query_args' => $query_args,
    'in_ajax' => true
    
);
?>
<div class="row history-wrapper">
    <?
    get_template_part('template-parts/page-history/section', 'artists', $args_artists);


    $args = array('field' => 'history_concrete_years_statistic', 'in_ajax' => true, 'festival_query_year' => $festivalQueryYear, 'page_ID' => $page_Id );
     
    get_template_part('template-parts/page-history/section', 'sidelinks', $args);
    
   ?>
</div>
   <?php
    $args = array(
        'post_type'      => 'gallery',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'post_gallery_gallery_year',
                'value' => $festivalQueryYear,
                'compare' => 'LIKE'
                )
            ),
        'meta_key'       => 'post_gallery_gallery_year',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
     
    );
    
    $gallery= new WP_Query($args); ?>
    
<div class="row see-gallery-wrapper-in-ajax-history">


 
<?php

if($gallery->have_posts()) : while($gallery->have_posts()): $gallery->the_post();

$gallery_name = get_bloginfo("language") === 'en-GB' ? get_field('gallery_name_in_english') : get_field('gallery_name');
$gallery_title = $gallery_name ? $gallery_name : ig_gav_get_global_text('global_gallery_heading') . ' ' . esc_html__(get_field('post_gallery_gallery_year'), 'saulkrasti-jazz-festival');


?>

<button class="btnc btnc-brand-square btnc--30 ig_m-1em btnc-xl ig_fs-2rem"><a target="_blank" href="<?php the_permalink(); ?>"><?php echo $gallery_title ?></a></button>

<?php

 endwhile; wp_reset_postdata(); endif; 
 
 ?>

</div>
<?php









die();
}
?>