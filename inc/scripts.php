<?php 

function ig_gav_load_php_script() {
    wp_enqueue_script('ajax', get_template_directory_uri() . '/inc/scripts.php', array('jquery'), NULL, true);

    wp_localize_script('ajax', 'wp_ajax', array('ajax_rtl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'ig_gav_load_php_script');
?>