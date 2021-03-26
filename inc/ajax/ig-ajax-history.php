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
       



    );

$args_artists = array(
    'query_args' => $query_args,
    'in_ajax' => true
    
);


    get_template_part('template-parts/page-history/section', 'artists', $args_artists);


    $args = array('field' => 'history_concrete_years_statistic', 'in_ajax' => true, 'festival_query_year' => $festivalQueryYear, 'page_ID' => $page_Id );
     
    get_template_part('template-parts/page-history/section', 'sidelinks', $args);

die();
}
?>