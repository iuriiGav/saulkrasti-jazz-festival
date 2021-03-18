<?php
require_once 'inc/helper-functions/html-helpers.php';
function ig_saulkrasti_jazz_scripts()
{

    wp_enqueue_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css', array(), '5.0.0');
    wp_enqueue_style('swipercss', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), '6.4.15');


    // Main Stylesheet
    wp_enqueue_style('saulkrasti-jazz-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('saulkrasti-jazz-style-dynamic', get_template_directory_uri() . '/public/css/dynamic-styles.php', array(), '1.0.0');

    wp_enqueue_script('jquery');

    wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), '6.4.15', true);
    wp_enqueue_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js', array(), '5.0.0', true);


    /** Load JS Files */
    wp_enqueue_script('saulkrasti-jazz-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'ig_saulkrasti_jazz_scripts');


function ig_saulkrasti_jazz_setup()
{


    add_image_size('ig-square', 350, 350, true);
    add_image_size('ig-blog', 350, 230, true);
    add_image_size('ig-medium', 620, 430, true);
    add_image_size('ig-mediumCover', 1250, 834, true);
    add_image_size('ig-portrait', 400, 533, true);

    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
}

add_action('after_setup_theme', 'ig_saulkrasti_jazz_setup');



function ig_saulkrasti_jazz_register_navwalker()
{ 
    require_once get_template_directory() . '/inc/walkers/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'ig_saulkrasti_jazz_register_navwalker');

register_nav_menu('main-menu', esc_html__('Main menu'));
register_nav_menu('footer-menu', esc_html__('Footer menu'));


require  get_template_directory() . '/inc/custom-post-types/custom-post-artists.php';
require  get_template_directory() . '/inc/custom-post-types/custom-post-events.php';
require  get_template_directory() . '/inc/custom-post-types/custom-post-venues.php';
require get_template_directory() . '/inc/acf_functions/add_acf_options_page.php';
require get_template_directory() . '/inc/custom-post-types/custom-taxonomies/custom-taxonomy-venues.php';
require get_template_directory() . '/inc/custom-post-types/custom-taxonomies/custom-taxonomy-artists.php';
require get_template_directory() . '/inc/api-options.php';


//Filter removes page template option from the dropdown menue on Page
// add_filter( 'theme_page_templates', 'rrwd_remove_page_template' );
//     function rrwd_remove_page_template( $pages_templates ) {
//     unset( $pages_templates['page-buttons.php'] );
//     return $pages_templates;
// }


function my_acf_google_map_api( $api ){
	
	$api['key'] = get_option('google_maps_api_key');
	
	return $api;

 
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');





function wpza_replace_repeater_field( $where ) {
    $where = str_replace( "meta_key = 'years_in_which_this_artist_participated_$", "meta_key LIKE 'years_in_which_this_artist_participated_%", $where );
    return $where;
}
add_filter( 'posts_where', 'wpza_replace_repeater_field' );

?>
